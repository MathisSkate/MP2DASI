<?php
/**
 * Created by PhpStorm.
 * User: doria
 * Date: 25/02/2019
 * Time: 18:49
 */

include_once "config.php";
require_once "insertMedia.php";



//Récupère différents éléments du formulaire
$id = $_POST['idActu'];
$type = $_POST['typeActualite'];
$titre = $_POST['titreActualite'];
$description = $_POST['descriptionActualite'];
$resume = $_POST['resumeActualite'];

//Récupère date et ID utilisateur connecté
$date = $_POST['dateActualite'];
$utilisateur = $_SESSION['idUserDetail'];

$bdd->exec("UPDATE actualite
SET type_actualite = '".$type."', titre_actualite = '".$titre."', description_actualite = '".$description."', resume_actualite = '".$resume."', date_actualite = '".$date."', id_utilisateur_detail = ".$utilisateur." 
WHERE id_actualite = ".$id." ");


//Vérifie si il y a déjà des media existant dans l'actualité
$reqCountMedia = $bdd->query("SELECT id_media FROM illustrer WHERE id_actualite=".$id." ORDER BY id_media DESC LIMIT 1 ");
$nbMedia = $reqCountMedia->fetch();

//Si oui on insert en ajoutant l'id au nom POUR ne pas remplacer le fichier existant.
if ($nbMedia[0]>0){
    insertMedia($bdd, $titre.$nbMedia[0], 'actualite', $id);

}
else insertMedia($bdd, $titre, 'actualite', $id);

echo 1;






