<?php
//DESC : fichier qui peut supprimer et modifier les données d'un laboratoire

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$inputId = $_POST['inputId'];
$inputNom = $_POST['inputNom'];
$inputAbrevLabo = $_POST['inputAbrevLabo'];
$inputUrl = $_POST['inputUrl'];
$inputDescLabo = $_POST['inputDescLabo'];
$inputDescLabo = strip_tags($inputDescLabo);

$reqOldLabo = $bdd->prepare("SELECT nom_laboratoire, img_laboratoire FROM commune.laboratoire WHERE id_laboratoire = :idlabo");
$reqOldLabo->bindParam(':idlabo', $inputId, PDO::PARAM_STR);
$reqOldLabo->execute();
$donneesOldLabo = $reqOldLabo->fetchAll();
//var_dump($donneesOldLabo);

//$text = explode('_', '233718_This_is_a_string', 2)[1]; // Returns This_is_a_string

//On récupère le nom du fichier importé, l'extension

$inputLaboImg = $_FILES['inputLogoLaboupdate'];
$path = $inputLaboImg['name'];
$inputExtImg = pathinfo($path, PATHINFO_EXTENSION);
$nameImgLabo = $inputNom . "_labo." . $inputExtImg;

$req = $bdd->prepare("SELECT img_laboratoire from commune.laboratoire where commune.laboratoire.id_laboratoire = '$inputId' ");
$req->execute();
$reqPhoto = $req->fetchAll();

/*Pour afficher les personnes en lien avec l'action*/
/*Pour afficher les projets en lien avec l'action*/
$reqLaboProjet = $bdd->prepare("
    SELECT
        id_projet
    FROM
        commune.appartenir 
    WHERE 
        id_laboratoire = :idlabo");
$reqLaboProjet->bindParam(':idlabo', $inputId, PDO::PARAM_STR);
$reqLaboProjet = $req->fetchAll();

//On regarde si le parametre GET est update ou delete

if ($_GET['action'] == "update") {
    if (isset($_POST["inputId"])) {


        $extMedia = explode(".", $nameImgLabo);

        if (($extMedia[1] == "png") || ($extMedia[1] == "jpg") || ($extMedia[1] == "jpeg") || ($extMedia[1] == "mp4")) {
            //On change de place le nouveau logo
            move_uploaded_file($inputLaboImg['tmp_name'], "../../media_commun/laboratoire/" . $nameImgLabo);
        } else {
            $nameImgLabo = $reqPhoto[0]['img_laboratoire'];
            //On change de place le nouveau logo
            move_uploaded_file($inputLaboImg['tmp_name'], "../../media_commun/laboratoire/" . $nameImgLabo);
        }

        //On change les données dans la base de données
        $stmt = $bdd->prepare("
                                         UPDATE commune.laboratoire 
                                         SET nom_laboratoire = :nom, abreviation_laboratoire = :abrevlabo, site_laboratoire = :site, description_laboratoire = :desclabo, img_laboratoire=:img  
                                         WHERE id_laboratoire = :idlabo
                                         ");
        $stmt->bindParam(":nom", $inputNom);
        $stmt->bindParam(":abrevlabo", $inputAbrevLabo);
        $stmt->bindParam(":site", $inputUrl);
        $stmt->bindParam(":desclabo", $inputDescLabo);
        $stmt->bindParam(":img", $nameImgLabo);
        $stmt->bindParam(":idlabo", $inputId);
        $stmt->execute();

        //if (isset($_POST['projet'])) {
        if (1 == 1) {

            //permet d'ajouter/supprimer les projets/labos

            //voir si le labo contient deja des projets
            $req = $bdd->prepare("
                SELECT
                    id_projet, id_laboratoire
                FROM
                    commune.appartenir 
                WHERE 
                    id_laboratoire = :idlabo ");
            $req->bindParam(":idlabo", $inputId);
            $req->execute();
            $reqLPExiste = $req->fetchAll();

            //si le labo contient des projets on supprime tout

            $delAppartenir = $bdd->prepare("DELETE FROM commune.appartenir WHERE id_laboratoire = :idlabo ");
            $delAppartenir->bindParam(":idlabo", $inputId);
            $delAppartenir->execute();

            if (isset($_POST['projet'])) {
            foreach ($_POST['projet'] as $chkbxProjet) {

               
                    //Permet d'ajouter des nouveaux projets
                    $stmt2 = $bdd->prepare("INSERT INTO commune.appartenir(id_laboratoire, id_projet)
                                                    VALUES (?, ?)");
                    $stmt2->bindParam(1, $inputId);
                    $stmt2->bindParam(2, $chkbxProjet);
                    $stmt2->execute();
                
            }//end foreach
        }
        } else {
            echo 0;
        }
        echo 1;
    } else {
        echo 0;
    }
} else if ($_GET['action'] == "delete") {
    if (isset($_POST["inputId"])) {

        /*Supprime le laboratoire*/
        $stmtLabProjet = $bdd->prepare("DELETE FROM commune.appartenir WHERE commune.appartenir.id_laboratoire = :idlabo");
        $stmtLabProjet->bindParam(':idlabo', $inputId, PDO::PARAM_STR);
        $stmtLabProjet->execute();

        /*Supprime le laboratoire*/
        $stmtLabUtil = $bdd->prepare("DELETE FROM commune.etudier WHERE commune.etudier.id_laboratoire = :idlabo");
        $stmtLabUtil->bindParam(':idlabo', $inputId, PDO::PARAM_STR);
        $stmtLabUtil->execute();

        /*Supprime le laboratoire*/
        $stmtLab = $bdd->prepare("DELETE FROM commune.laboratoire WHERE commune.laboratoire.id_laboratoire = :idlabo");
        $stmtLab->bindParam(':idlabo', $inputId, PDO::PARAM_STR);
        $stmtLab->execute();

        echo 2;
    } else {
        echo 0;
    }
} else {
    echo "pas entré dans isset update/delete";
}
