<?php
//DESC : fichier qui peut modifier ou supprimer un projet

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$inputLogoProjet = $_FILES['inputLogoProjetupdate'];
// On récupère le nom du fichier importé
$path = $inputLogoProjet['name'];
// On récupère l'extension du fichier importé
$inputExtImg = pathinfo($path, PATHINFO_EXTENSION);

$inputId = $_POST['inputId'];
$inputNom = $_POST['inputNomupdate'];
$inputAbreviation = $_POST['inputAbreviationupdate'];
$inputResume = $_POST['inputResumeupdate'];
$inputDateDebut = $_POST['inputDateDebutupdate'];
$inputDateFin = $_POST['inputDateFinupdate'];

if (strlen($inputDateFin) == 0)
{
    $inputDateFin = null;
}

//On récupère les données du formulaire - Media
$inputMediaProjet = $_FILES['inputMediaProjetupdate'];
// On récupère le nom du fichier importé
$pathMedia = $inputMediaProjet['name'];
// On récupère l'extension du fichier importé
$inputExtImgMedia = pathinfo($pathMedia, PATHINFO_EXTENSION);

$nameImgProjet = $inputNom."_projet.".$inputExtImg;
$nameImgMedia = $inputNom."_media.".$inputExtImgMedia;

$req = $bdd->prepare("SELECT logo_projet, media_projet from commune.projet where commune.projet.id_projet = '$inputId' ");
$req->execute();
$reqPhoto = $req->fetchAll();

if ($_GET['action'] == "update"){
    if(isset($_POST["inputId"])) {

        $extLogo = explode(".", $nameImgProjet);

        if (($extLogo[1] == "png") || ($extLogo[1] == "jpg") || ($extLogo[1] == "jpeg"))
        {
            move_uploaded_file($inputLogoProjet['tmp_name'],"../../media_commun/projet/".$nameImgProjet);
        }
        else
        {
            $nameImgProjet = $reqPhoto[0]['logo_projet'];
            move_uploaded_file($inputLogoProjet['tmp_name'],"../../media_commun/projet/".$nameImgProjet);
        }

        $extMedia = explode(".", $nameImgMedia);

        if (($extMedia[1] == "png") || ($extMedia[1] == "jpg") || ($extMedia[1] == "jpeg") || ($extMedia[1] == "mp4"))
        {
            move_uploaded_file($inputMediaProjet['tmp_name'],"../../index_pack/media/".$nameImgMedia);
        }
        else
        {
            $nameImgMedia = $reqPhoto[0]['media_projet'];
            move_uploaded_file($inputMediaProjet['tmp_name'],"../../index_pack/media/".$nameImgMedia);
        }

        $stmt = $bdd->prepare("
                                         UPDATE commune.projet 
                                         SET nom_projet = :nom, abreviation_projet = :abreviation, resume_projet = :resume, date_debut_projet = :dateDebut, date_fin_projet = :dateFin, logo_projet = :logo, media_projet = :media
                                         WHERE id_projet = '$inputId'
                                         ");
        //$stmt->bindParam(":logo", $nameImgProjet);
        $stmt->bindParam(":nom", $inputNom);
        $stmt->bindParam(":resume", $inputResume);
        $stmt->bindParam(":abreviation", $inputAbreviation);
        $stmt->bindParam(":dateDebut", $inputDateDebut);
        $stmt->bindParam(":dateFin", $inputDateFin);
        $stmt->bindParam(":logo", $nameImgProjet);
        $stmt->bindParam(":media", $nameImgMedia);
        $stmt->execute();

        echo 1;
    } else {
        echo 0;
    }
} else if ($_GET['action'] == "delete"){
    if(isset($_POST["inputId"])) {

        /*Supprimer les projets*/
        $stmtPat = $bdd->prepare("DELETE FROM commune.participer WHERE id_projet = :idprojet");
        $stmtPat->bindParam(':idprojet', $inputId, PDO::PARAM_STR);
        $stmtPat->execute();

        /*Supprimer les projets*/
        $stmtApp = $bdd->prepare("DELETE FROM commune.appartenir WHERE id_projet = :idprojet");
        $stmtApp->bindParam(':idprojet', $inputId, PDO::PARAM_STR);
        $stmtApp->execute();

        /*Supprimer les projets*/
        $stmtPro = $bdd->prepare("DELETE FROM commune.projet WHERE id_projet = :idprojet");
        $stmtPro->bindParam(':idprojet', $inputId, PDO::PARAM_STR);
        $stmtPro->execute();

        echo 2;
    } else {
        echo 0;
    }
} else{
    echo "pas entré dans isset update/delete";
}

?>