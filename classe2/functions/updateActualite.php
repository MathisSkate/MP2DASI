<?php

include_once "config.php";
require_once "insertMedia.php";

//Récupère différents éléments du formulaire
$id = $_POST['idActu'];
$type = $_POST['typeActualite'];
$titre = $_POST['titreActualite'];
$description = $_POST['descriptionActualite'];
$resume = $_POST['resumeActualite'];
$lien = $_POST["lienActualite"];

//Récupère date et ID utilisateur connecté
$dateDebut = $_POST['dateActualiteDebut'];
$dateFin = $_POST['dateActualiteFin'];

if (strlen($dateFin) == 0) {
    $dateFin = NULL;
}

$utilisateur = $_SESSION['idUserDetail'];

$stmt = $bdd->prepare("UPDATE actualite SET 
type_actualite = :type, 
lien_actualite = :lien, 
titre_actualite = :titre, 
description_actualite = :description, 
resume_actualite = :resume, 
date_actualite_debut = :debut, 
date_actualite_fin = :fin, 
id_utilisateur_detail = :detail 
WHERE id_actualite = " . $id . " ");
$stmt->bindParam(":type", $type);
$stmt->bindParam(":lien", $lien);
$stmt->bindParam(":titre", $titre);
$stmt->bindParam(":description", $description);
$stmt->bindParam(":resume", $resume);
$stmt->bindParam(":debut", $dateDebut);
$stmt->bindParam(":fin", $dateFin);
$stmt->bindParam(":detail", $utilisateur);
$stmt->execute();

//Vérifie si il y a déjà des media existant dans l'actualité
$reqCountMedia = $bdd->query("SELECT id_media FROM illustrer WHERE id_actualite=".$id." ORDER BY id_media DESC LIMIT 1 ");
$nbMedia = $reqCountMedia->fetch();

//Si oui on insert en ajoutant l'id au nom POUR ne pas remplacer le fichier existant.
if ($nbMedia[0]>0){
    insertMedia($bdd, $titre.$nbMedia[0], 'actualite', $id);

}
else insertMedia($bdd, $titre, 'actualite', $id);

echo 1;






