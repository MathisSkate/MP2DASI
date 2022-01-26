<?php

//DESC : fonction qui gère l'ajout d'un projet dans le panel admin des projets

//inclure le fichier qui possède la  variable de la BDD

include "config.php";

//On récupère les données du formulaire - Logo
$inputLogoProjet = $_FILES['inputLogoProjetadd'];
// On récupère le nom du fichier importé
$pathLogo = $inputLogoProjet['name'];
// On récupère l'extension du fichier importé
$inputExtImgLogo = pathinfo($pathLogo, PATHINFO_EXTENSION);

$inputNom = $_POST['inputNomadd'];
$inputAbreviation = $_POST['inputAbreviationadd'];
$inputResume = $_POST['inputResumeadd'];
$inputDateDebut = $_POST['dateDebutadd'];
$inputDateFin = $_POST['dateFinadd'];

//On récupère les données du formulaire - Media
$inputMediaProjet = $_FILES['inputMediaProjetadd'];
// On récupère le nom du fichier importé
$pathMedia = $inputMediaProjet['name'];
// On récupère l'extension du fichier importé
$inputExtImgMedia = pathinfo($pathMedia, PATHINFO_EXTENSION);

if(strlen($inputResume) == 0){
    $inputResume = NULL;
}

if(strlen($inputDateFin) == 0){
    $inputDateFin = NULL;
}

$nameImgProjet = $inputNom."_projet.".$inputExtImgLogo;
$nameImgMedia = $inputNom."_media.".$inputExtImgMedia;

//On bouge le fichier importé vers le dossier indiqué
move_uploaded_file($inputLogoProjet['tmp_name'],"../../media_commun/projet/".$nameImgProjet);

//On bouge le fichier importé vers le dossier indiqué
move_uploaded_file($inputMediaProjet['tmp_name'],"../../index_pack/media/".$nameImgMedia);

if( isset($inputNom) && isset($inputAbreviation) && isset($inputDateDebut)){

    $stmt = $bdd->prepare("INSERT INTO commune.projet(logo_projet, nom_projet, resume_projet, abreviation_projet, date_debut_projet, date_fin_projet, media_projet)
                                     VALUES (:logo, :nom, :resume, :abreviation, :dateDebut, :dateFin, :media)");
    $stmt->bindParam(":logo", $nameImgProjet);
    $stmt->bindParam(":nom", $inputNom);
    $stmt->bindParam(":resume", $inputResume);
    $stmt->bindParam(":abreviation", $inputAbreviation);
    $stmt->bindParam(":dateDebut", $inputDateDebut);
    $stmt->bindParam(":dateFin", $inputDateFin);
    $stmt->bindParam(":media", $nameImgMedia);
    $stmt->execute();
    echo 1;
}
else{
    echo "invalid";
}
?>
