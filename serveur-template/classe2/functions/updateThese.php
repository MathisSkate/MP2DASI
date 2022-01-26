<?php

include_once "config.php";
require_once "insertMedia.php";

//Récupère différents éléments du formulaire
$id = $_POST['idThese'];
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

$bdd->exec("UPDATE these
SET titre_these = '".$titre."', annee_these = '".$date."', soutenant_these = '".$soutenant."', specialite_these = '".$spe."', jury_these = '".$jury."', resume_these = '".$resume."', lien_these = '".$lien."', id_action = '".$action."', id_utilisateur_detail = ".$utilisateur." 
WHERE id_these = ".$id." ");


//Vérifie si il y a déjà des media existant dans la these
$reqCountMedia = $bdd->query("SELECT id_media FROM illustrer WHERE id_these=".$id." ORDER BY id_media DESC LIMIT 1 ");
$nbMedia = $reqCountMedia->fetch();

//Si oui on insert en ajoutant l'id au nom POUR ne pas remplacer le fichier existant.
if ($nbMedia[0]>0){
    insertMedia($bdd, $titre.$nbMedia[0], 'these', $id);

}
else insertMedia($bdd, $titre, 'these', $id);

echo 1;