<?php
/**
 * Created by PhpStorm.
 * User: doria
 * Date: 26/02/2019
 * Time: 16:00
 */

include_once "config.php";

function insertMedia($bdd, $titre, $page, $id){
//Répertoire pour les fichiers uploader
$uploadDirImage = '../media/image/';
$uploadDirVideo = '../media/video/';
$uploadDirPDF = '../media/pdf/';

//Requête préparé pour insérer un média
$reqInsertMedia = $bdd->prepare("INSERT INTO media(type_media, source_media, nom_media) 
VALUES (:type, :source, :nom)");

//Requpete pour récupérer id_media
$reqIdNewMedia = $bdd->prepare("SELECT id_media FROM media ORDER BY id_media DESC LIMIT 1");

//Requête préparé pour insérer dans table illustrer (liaison entre le média et son/ses Actu/Publi/Thèse)
$reqInsertIllustrer = $bdd->prepare("INSERT INTO illustrer(id_media, id_actualite, id_publication, id_these, id_action)
VALUES ( :media, :actualite, :publication, :these, :action)");

//IMAGES
insertFile($_FILES['images'], 'image', $titre, $uploadDirImage, $reqInsertMedia, $reqIdNewMedia, $reqInsertIllustrer, $page, $id);

//VIDEOS
insertFile($_FILES['videos'], 'video', $titre, $uploadDirVideo, $reqInsertMedia, $reqIdNewMedia, $reqInsertIllustrer, $page, $id);

//PDF
insertFile($_FILES['fichiers'], 'pdf', $titre, $uploadDirPDF, $reqInsertMedia, $reqIdNewMedia, $reqInsertIllustrer, $page, $id);
}

function insertMediaAction($bdd, $titre, $page, $id){
//Répertoire pour les fichiers uploader
    $uploadDirPDF = '../media/pdf/';

//Requête préparé pour insérer un média
    $reqInsertMedia = $bdd->prepare("INSERT INTO media(type_media, source_media, nom_media) 
VALUES (:type, :source, :nom)");

//Requpete pour récupérer id_media
    $reqIdNewMedia = $bdd->prepare("SELECT id_media FROM media ORDER BY id_media DESC LIMIT 1");

//Requête préparé pour insérer dans table illustrer (liaison entre le média et son/ses Actu/Publi/Thèse)
    $reqInsertIllustrer = $bdd->prepare("INSERT INTO illustrer(id_media, id_actualite, id_publication, id_these, id_action)
VALUES ( :media, :actualite, :publication, :these, :action)");

//PDF
    insertFile($_FILES['fichiers'], 'pdf', $titre, $uploadDirPDF, $reqInsertMedia, $reqIdNewMedia, $reqInsertIllustrer, $page, $id);
}

function insertFile($files, $typeMedia, $titreActualite, $uploadDir, $reqInsertMedia, $reqIdNewMedia, $reqInsertIllustrer, $page, $id){
    for ($i = 0; $i<sizeof($files['name']); $i++){
        if (!empty($files['name'][$i])){
            //Récupère extension fichier
            //basename --> pour enlever avant "/"
            $extension = ".".basename($files['type'][$i]);

            //ucfirst --> première lettre en majuscule
            //strtlower --> toute la chaine en minuscume
            if ($page == "action")
            {
                $name = ucfirst(strtolower($files['name'][$i]));
            }
            else
            {
                $name = ucfirst(strtolower($titreActualite." ".$i));
            }


            if ($page == "action")
            {
                //remplace tous les espaces par un "_"
                $nameWithExtension = str_replace(' ', '_', strtolower($name));

            }
            else
            {
                //remplace tous les espaces par un "_"
                $nameWithExtension = str_replace(' ', '_', strtolower($name).$extension);

            }

            //Ajout dans les dossiers du fichiers
            move_uploaded_file($files['tmp_name'][$i], $uploadDir.$nameWithExtension);

            //Paramètre pour l'insertion dans la table Media
            $reqInsertMedia->bindParam(':type', $typeMedia);
            $reqInsertMedia->bindParam(':source', $nameWithExtension);
            $reqInsertMedia->bindParam(':nom', $name);
            $reqInsertMedia->execute();

            //Récupère id_media
            $reqIdNewMedia->execute();
            $idMedia = $reqIdNewMedia->fetch();

            //Paramètre pour insertion dans table illustrer
            $reqInsertIllustrer->bindParam(':media', $idMedia['id_media']);
            switch ($page){

                case 'actualite':
                    $reqInsertIllustrer->bindParam(':actualite', $id);
                    $reqInsertIllustrer->bindValue(':publication', NULL);
                    $reqInsertIllustrer->bindValue(':these', NULL);
                    $reqInsertIllustrer->bindValue(':action', NULL);
                    break;
                case 'publication':
                    $reqInsertIllustrer->bindValue(':actualite', NULL);
                    $reqInsertIllustrer->bindParam(':publication', $id);
                    $reqInsertIllustrer->bindValue(':these', NULL);
                    $reqInsertIllustrer->bindValue(':action', NULL);
                    break;
                case 'these':
                    $reqInsertIllustrer->bindValue(':actualite', NULL);
                    $reqInsertIllustrer->bindValue(':publication', NULL);
                    $reqInsertIllustrer->bindParam(':these', $id);
                    $reqInsertIllustrer->bindValue(':action', NULL);
                    break;
                case 'action':
                    $reqInsertIllustrer->bindValue(':actualite', NULL);
                    $reqInsertIllustrer->bindValue(':publication', NULL);
                    $reqInsertIllustrer->bindValue(':these', NULL);
                    $reqInsertIllustrer->bindParam(':action', $id);
                    break;
            }
            $reqInsertIllustrer->execute();
        }
    }
}
?>

