<?php

include_once "config.php";
require_once "insertMedia.php";


//Récupère différents éléments du formulaire
$id = $_POST['idPubli'];
$titre = $_POST['titrePublication'];
$type = $_POST['typePublication'];
$action = $_POST['actionPublication'];
$auteur = $_POST['auteurPublication'];
$information = $_POST['informationPublication'];
$lien = $_POST['lienPublication'];

//Récupère date et ID utilisateur connecté
$date = $_POST['datePublication'];
$utilisateur = $_SESSION['idUserDetail'];

$bdd->exec("UPDATE publication
SET titre_publication = '".$titre."', auteur_publication = '".$auteur."', annee_publication = '".$date."', type_publication = '".$type."', information_publication = '".$information."', lien_publication = '".$lien."', id_action = '".$action."', id_utilisateur_detail = ".$utilisateur." 
WHERE id_publication = ".$id." ");


//Vérifie si il y a déjà des media existant dans la publication
$reqCountMedia = $bdd->query("SELECT id_media FROM illustrer WHERE id_publication=".$id." ORDER BY id_media DESC LIMIT 1 ");
$nbMedia = $reqCountMedia->fetch();

//Si oui on insert en ajoutant l'id au nom POUR ne pas remplacer le fichier existant.
if ($nbMedia[0]>0){
    insertMedia($bdd, $titre.$nbMedia[0], 'publication', $id);

}
else insertMedia($bdd, $titre, 'publication', $id);

echo 1;