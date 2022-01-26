<?php

//DESC : fonction qui gère l'ajout d'un laboratoire dans le panel admin des labo

//inclure le fichier qui possède la  variable de la BDD

include "config.php";

$inputLaboImg = $_FILES['inputLogoLaboadd'];
// On récupère le nom du fichier importé
$path = $inputLaboImg['name'];
// On récupère l'extension du fichier importé
$inputExtImg = pathinfo($path, PATHINFO_EXTENSION);

//On récupère les données du formulaire

$inputNom = $_POST['inputNom'];
$inputAbrevLabo = $_POST['inputAbrevLabo'];
$inputUrl = $_POST['inputUrl'];
$inputDescLabo = $_POST['inputDescLabo'];
//On enlève les balises HTML/PHP...
$inputDescLabo =  strip_tags($inputDescLabo);

$nameImgLabo = $inputNom."_labo.".$inputExtImg;

//On bouge le fichier importé vers le dossier indiqué
move_uploaded_file($inputLaboImg['tmp_name'],"../../media_commun/laboratoire/".$nameImgLabo);

if( isset($inputNom) && isset($inputAbrevLabo) && isset($inputUrl) && isset($inputDescLabo) && isset($nameImgLabo)){

    $stmt = $bdd->prepare("INSERT INTO commune.laboratoire(nom_laboratoire, abreviation_laboratoire, description_laboratoire, site_laboratoire, img_laboratoire)
                                     VALUES (:nom, :abrev, :desc, :site, :img)");
    $stmt->bindParam(":nom", $inputNom);
    $stmt->bindParam(":abrev", $inputAbrevLabo);
    $stmt->bindParam(":desc", $inputDescLabo);
    $stmt->bindParam(":site", $inputUrl);
    $stmt->bindParam(":img", $nameImgLabo);
    $stmt->execute();
    echo 1;
}
else{
    echo "invalid";
}
?>
