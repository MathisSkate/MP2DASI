<?php

include_once "config.php";
require_once "insertMedia.php";


//Récupère différents éléments du formulaire
$type = $_POST['typeActualite'];
$titre = $_POST['titreActualite'];
$description = $_POST['descriptionActualite'];
$resume = $_POST['resumeActualite'];
$lien = $_POST["lienActualite"];

//Récupère date et ID utilisateur connecté
$dateDebut = $_POST['dateActualiteDebut'];
$dateFin = $_POST['dateActualiteFin'];

//Insertion actualité
if (strlen($dateFin) == 0) {
    $reqInsertActualite = $bdd->prepare("
INSERT INTO actualite (type_actualite, lien_actualite, titre_actualite, description_actualite, resume_actualite, date_actualite_debut, date_actualite_fin) 
VALUES (:type, :lien, :titre, :description, :resume, :debut, null) ");
    $reqInsertActualite->bindParam(":type", $type);
    $reqInsertActualite->bindParam(":lien", $lien);
    $reqInsertActualite->bindParam(":titre", $titre);
    $reqInsertActualite->bindParam(":description", $description);
    $reqInsertActualite->bindParam(":resume", $resume);
    $reqInsertActualite->bindParam(":debut", $dateDebut);
    $reqInsertActualite->execute();
} else {
    $reqInsertActualite = $bdd->prepare("
INSERT INTO actualite (type_actualite, lien_actualite, titre_actualite, description_actualite, resume_actualite, date_actualite_debut, date_actualite_fin) 
VALUES (:type, :lien, :titre, :description, :resume, :debut, :fin) ");
    $reqInsertActualite->bindParam(":type", $type);
    $reqInsertActualite->bindParam(":lien", $lien);
    $reqInsertActualite->bindParam(":titre", $titre);
    $reqInsertActualite->bindParam(":description", $description);
    $reqInsertActualite->bindParam(":resume", $resume);
    $reqInsertActualite->bindParam(":debut", $dateDebut);
    $reqInsertActualite->bindParam(":fin", $dateFin);
    $reqInsertActualite->execute();
}

//Récupérer id new actu
$reqIdNewActu = $bdd->query("SELECT id_actualite FROM actualite ORDER BY id_actualite DESC LIMIT 1");
$idActu = $reqIdNewActu->fetch();

//Insertion média
insertMedia($bdd, $titre, 'actualite', $idActu['id_actualite']);

//Pour raffraichissement Ajax
echo 1;
?>
