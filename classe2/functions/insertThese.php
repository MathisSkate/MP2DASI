<?php

include_once "config.php";
require_once "insertMedia.php";

//Récupère différents éléments du formulaire
$titre = $_POST['titreThese'];
$soutenant = $_POST['soutenantThese'];
$spe = $_POST['speThese'];
$jury = $_POST['juryThese'];
$resume = $_POST['resumeThese'];
$lien = $_POST['lienThese'];
$action = $_POST['actionThese'];

//Récupère date et ID utilisateur connecté
$date = $_POST['dateThese'];

$identiteUtil = explode(" ", $soutenant);

$inputNom = $identiteUtil[0];
$inputPrenom = $identiteUtil[1];

$req = $bdd->prepare(' select tab1.prenom_utilisateur, tab1.nom_utilisateur, tab2.id_utilisateur_detail 
                                from commune.utilisateur as tab1 
                                join classe2.utilisateur_detail as tab2
                                on tab1.id_utilisateur = tab2.id_utilisateur  
                                where tab1.prenom_utilisateur = :prenom and tab1.nom_utilisateur = :nom');
$req->bindParam(":prenom", $inputPrenom);
$req->bindParam(":nom", $inputNom);
$req->execute();
$reqUtiDet = $req->fetchAll();

$utilisateur = $reqUtiDet[0]['id_utilisateur_detail'];

$soutenant = $identiteUtil[1] ." ". $identiteUtil[0];

//Insertion publication
$reqInsertPublication = $bdd->exec("
INSERT INTO these (titre_these, annee_these, soutenant_these, specialite_these, jury_these, resume_these, lien_these, id_utilisateur_detail, id_action) 
VALUES ('".$titre."', '".$date."', '".$soutenant."', '".$spe."','".$jury."', '".$resume."', '".$lien."', '".$utilisateur."', '".$action."') ");

//Récupérer id new actu
$reqIdNewThese = $bdd->query("SELECT id_these FROM these ORDER BY id_these DESC LIMIT 1");
$idThese = $reqIdNewThese->fetch();

//Nom page pour insertion média
$page = 'these';

//Insertion média
insertMedia($bdd, $titre, $page, $idThese['id_these']);

//Pour raffraichissement Ajax

echo 1;
?>
