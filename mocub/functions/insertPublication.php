<?php

include_once "config.php";
require_once "insertMedia.php";


//Récupère différents éléments du formulaire
$type = $_POST['typePublication'];
$titre = $_POST['titrePublication'];
$information = $_POST['informationPublication'];
$action = $_POST['actionPublication'];
$lien = $_POST['lienPublication'];


//Récupère date et ID utilisateur connecté
$date = $_POST['datePublication'];

//Insertion publication
$reqInsertPublication = $bdd->exec("
INSERT INTO publication (type_publication, titre_publication, information_publication, annee_publication, lien_publication, id_action) 
VALUES ('" . $type . "', '" . $titre . "', '" . $information . "','" . $date . "', '" . $lien . "', " . $action . ") ");

//Pour afficher les id_publications
$req = $bdd->prepare('SELECT id_publication from ' . $nameprojetgeneral . '.publication order by id_publication desc');
$req->execute();
$reqPubliD = $req->fetchAll();

foreach ($_POST['util'] as $chkbxUtil) {

    //Pour retrouver l'id_utilisateur_detail de l'utilisateur
    $req = $bdd->query('SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab2.id_utilisateur_detail FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur where tab1.id_utilisateur = ' . $chkbxUtil . ' ');
    $reqUtil = $req->fetchAll();
    //var_dump($reqUtil);

    $detail = $reqUtil[0]['id_utilisateur_detail'];

    $publiD = $reqPubliD[0]['id_publication'];

    //Permet d'ajouter les nouvelles personnes
    $stmt = $bdd->prepare("INSERT INTO publier(id_publication, id_utilisateur_detail)
                                                  VALUES (?, ?)");
    $stmt->bindParam(1, $publiD);
    $stmt->bindParam(2, $detail);
    $stmt->execute();
}

//Récupérer id new actu
$reqIdNewPublication = $bdd->query("SELECT id_publication FROM publication ORDER BY id_publication DESC LIMIT 1");
$idPub = $reqIdNewPublication->fetch();

//Nom page pour insertion média
$page = 'publication';

//Insertion média
insertMedia($bdd, $titre, $page, $idPub['id_publication']);

//Pour raffraichissement Ajax
echo 1;
?>
