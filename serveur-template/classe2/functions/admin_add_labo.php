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
$inputDescLabo = strip_tags($inputDescLabo);

$nameImgLabo = $inputNom . "_labo." . $inputExtImg;

//On bouge le fichier importé vers le dossier indiqué
move_uploaded_file($inputLaboImg['tmp_name'], "../../media_commun/laboratoire/" . $nameImgLabo);

if (isset($inputNom) && isset($inputAbrevLabo) && isset($inputUrl) && isset($inputDescLabo) && isset($nameImgLabo)) {

    if (isset($_POST['projet'])) {

        $stmt = $bdd->prepare("INSERT INTO commune.laboratoire(nom_laboratoire, abreviation_laboratoire, description_laboratoire, site_laboratoire, img_laboratoire)
                                     VALUES (:nom, :abrev, :desc, :site, :img)");
        $stmt->bindParam(":nom", $inputNom);
        $stmt->bindParam(":abrev", $inputAbrevLabo);
        $stmt->bindParam(":desc", $inputDescLabo);
        $stmt->bindParam(":site", $inputUrl);
        $stmt->bindParam(":img", $nameImgLabo);
        $stmt->execute();

        //Pour afficher les id_publications
        $req = $bdd->prepare('SELECT id_laboratoire from commune.laboratoire order by id_laboratoire desc');
        $req->execute();
        $reqLabo = $req->fetchAll();

        foreach ($_POST['projet'] as $chkbxProjet) {

            //Pour retrouver l'id_utilisateur_detail de l'utilisateur
            $req = $bdd->query('SELECT tab1.id_projet, tab1.nom_projet FROM commune.projet AS tab1 where tab1.id_projet = ' . $chkbxProjet . ' ');
            $reqPro = $req->fetchAll();

            $labo = $reqLabo[0]['id_laboratoire'];
            $projet = $reqPro[0]['id_projet'];

            //Permet d'ajouter les nouvelles personnes
            $stmt2 = $bdd->prepare("INSERT INTO commune.appartenir(id_laboratoire, id_projet)
                                                  VALUES (?, ?)");
            $stmt2->bindParam(1, $labo);
            $stmt2->bindParam(2, $projet);
            $stmt2->execute();

        }
        echo 1;
    } else {
        echo "invalid";
    }


} else {
    echo "invalid";
}
?>
