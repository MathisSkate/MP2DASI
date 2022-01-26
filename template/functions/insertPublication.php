<?php

include_once "config.php";
require_once "insertMedia.php";


//Récupère différents éléments du formulaire
$type = $_POST['typePublication'];
$titre = $_POST['titrePublication'];
$auteur = $_POST['auteurPublication'];
$information = $_POST['informationPublication'];
$action = $_POST['actionPublication'];
$lien = $_POST['lienPublication'];


//Récupère date et ID utilisateur connecté
$date = $_POST['datePublication'];
$utilisateur = $_SESSION['idUserDetail'];

//Insertion publication
$reqInsertPublication = $bdd->exec("
INSERT INTO publication (type_publication, titre_publication, auteur_publication, information_publication, annee_publication, lien_publication, id_utilisateur_detail, id_action) 
VALUES ('".$type."', '".$titre."', '".$auteur."', '".$information."','".$date."', '".$lien."', ".$utilisateur.", ".$action.") ");

//Récupérer id new actu
$reqIdNewPublication = $bdd->query("SELECT id_publication FROM publication ORDER BY id_publication DESC LIMIT 1");
$idPub= $reqIdNewPublication->fetch();

//Nom page pour insertion média
$page = 'publication';

//Insertion média
insertMedia($bdd, $titre, $page, $idPub['id_publication']);

//Pour raffraichissement Ajax
echo 1;
?>
