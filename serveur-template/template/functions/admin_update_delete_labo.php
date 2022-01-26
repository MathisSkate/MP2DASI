<?php
//DESC : fichier qui peut supprimer et modifier les données d'un laboratoire

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$inputId = $_POST['inputId'];
$inputNom = $_POST['inputNom'];
$inputAbrevLabo = $_POST['inputAbrevLabo'];
$inputUrl = $_POST['inputUrl'];
$inputDescLabo = $_POST['inputDescLabo'];
$inputDescLabo =  strip_tags($inputDescLabo);

$reqOldLabo = $bdd->prepare("SELECT nom_laboratoire, img_laboratoire FROM commune.laboratoire WHERE id_laboratoire = :idlabo");
$reqOldLabo->bindParam(':idlabo', $inputId, PDO::PARAM_STR);
$reqOldLabo->execute();
$donneesOldLabo = $reqOldLabo->fetchAll();
var_dump($donneesOldLabo);

$text = explode('_', '233718_This_is_a_string', 2)[1]; // Returns This_is_a_string
echo "extension : ".$text;

//On récupère le nom du fichier importé, l'extension

$inputLaboImg = $_FILES['inputLogoLaboupdate'];
$path = $inputLaboImg['name'];
$inputExtImg = pathinfo($path, PATHINFO_EXTENSION);
$nameImgLabo = $inputNom."_labo.".$inputExtImg;

//On regarde si le parametre GET est update ou delete

if ($_GET['action'] == "update"){
    if(isset($_POST["inputId"])) {

        if (sizeof($donneesOldLabo) > 0){
            if ($donneesOldLabo['nom_laboratoire'] !== $inputNom ){
                echo "tableau supérieur à 0 & nom de l'ancien labo différent du nouveau";

                //Si le nom de l'ancien logo du labo est égal au nom du nouveau logo alors on change le nom

                rename("../../media_commun/laboratoire/".$donneesOldLabo['img_laboratoire'], "../../media_commun/laboratoire/".$inputNom."_labo.".$ext);
            }
        }

        //On change de place le nouveau logo
        move_uploaded_file($inputLaboImg['tmp_name'],"../../media_commun/laboratoire/".$nameImgLabo);

        //On change les données dans la base de données
        $stmt = $bdd->prepare("
                                         UPDATE commune.laboratoire 
                                         SET nom_laboratoire = :nom, abreviation_laboratoire = :abrevlabo, site_laboratoire = :site, description_laboratoire = :desclabo, img_laboratoire=:img  
                                         WHERE id_laboratoire = :idlabo
                                         ");
        $stmt->bindParam(":nom", $inputNom);
        $stmt->bindParam(":abrevlabo", $inputAbrevLabo);
        $stmt->bindParam(":site", $inputUrl);
        $stmt->bindParam(":desclabo", $inputDescLabo);
        $stmt->bindParam(":img", $nameImgLabo);
        $stmt->bindParam(":idlabo", $inputId);
        $stmt->execute();

        echo 1;
    } else {
        echo 0;
    }
} else if ($_GET['action'] == "delete"){
    if(isset($_POST["inputId"])) {
        $stmt = $bdd->prepare("DELETE FROM commune.laboratoire WHERE id_laboratoire = :idlabo");
        $stmt->bindParam(':idlabo', $inputId, PDO::PARAM_STR);
        $stmt->execute();

        echo 2;
    } else {
        echo 0;
    }
} else{
    echo "pas entré dans isset update/delete";
}

?>