<?php

include_once "config.php";
require_once "insertMedia.php";

//Récupère différents éléments du formulaire
$id = $_POST['idPubli'];
$titre = $_POST['titrePublication'];
$type = $_POST['typePublication'];
$action = $_POST['actionPublication'];
$information = $_POST['informationPublication'];
$lien = $_POST['lienPublication'];

//Récupère date et ID utilisateur connecté
$date = $_POST['datePublication'];

$bdd->exec("UPDATE publication
SET titre_publication = '" . $titre . "', annee_publication = '" . $date . "', type_publication = '" . $type . "', information_publication = '" . $information . "', lien_publication = '" . $lien . "', id_action = '" . $action . "'
WHERE id_publication = " . $id . " ");


/*Pour afficher les personnes en lien avec l'action*/
$req = $bdd->prepare('
    SELECT
        id_utilisateur_detail
    FROM
        ' . $nameprojetgeneral . '.publier 
    WHERE 
        id_publication = :idPubli');
$req->execute([':idPubli' => $id]);
$reqUtil = $req->fetchAll();

//initialise un tableau avec toutes les valeurs deja rentrees
$tabUtilExiste = array();
for ($i = 0; $i < sizeof($reqUtil); $i++) {
    $id_utilisateur_action = $reqUtil[$i]['id_utilisateur_detail'];
    array_push($tabUtilExiste, $id_utilisateur_action);
}

//permet d'ajouter/supprimer les utilisateurs
foreach ($_POST['util'] as $chkbxUtil) {

    //Pour retrouver l'id_utilisateur_detail de l'utilisateur
    $req = $bdd->query('SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab2.id_utilisateur_detail FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur where tab1.id_utilisateur = ' . $chkbxUtil . ' ');
    $reqUtil = $req->fetchAll();

    $detail = $reqUtil[0]['id_utilisateur_detail'];

    //Pour retrouver l'id_utilisateur_detail et id_publication de l'utilisateur deja mis
    $req = $bdd->prepare('SELECT id_utilisateur_detail, id_publication FROM ' . $nameprojetgeneral . '.publier where id_utilisateur_detail = \'' . $detail . '\' and  id_publication = \'' . $id . '\'');
    $req->execute();
    $reqUExiste = $req->fetchAll();

    if (sizeof($reqUExiste) == 0) {
        //Permet d'ajouter les nouvelles personnes
        $stmt = $bdd->prepare("INSERT INTO publier(id_publication, id_utilisateur_detail)
                                                  VALUES (?, ?)");
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $detail);
        $stmt->execute();
    } else {
        //Si elle existe deja
        if (in_array(($detail), $tabUtilExiste)) {
            $indexTab = array_search($detail, $tabUtilExiste);
            //permet de supprimer un element
            unset($tabUtilExiste[$indexTab]);
            //permet de reindexer un element
            $tabUtilExiste = array_values(array_filter($tabUtilExiste));
        }
    }
}

//Permet de supprimer tout ce qui etait avant mais qui ne sont plus coche
foreach ($tabUtilExiste as $utilExistePlus) {
    //Pour retrouver l'id_utilisateur_detail et le nom de l'utilisateur que l'on va supprimer
    $req = $bdd->prepare('SELECT id_utilisateur_detail FROM ' . $nameprojetgeneral . '.utilisateur_detail where id_utilisateur_detail = \'' . $utilExistePlus . '\' ');
    $req->execute();
    $reqUtilPlus = $req->fetchAll();
    $inputIdUtilDetail = $reqUtilPlus[0]['id_utilisateur_detail'];

    $delParticiper = $bdd->prepare("DELETE FROM publier WHERE id_utilisateur_detail = '$inputIdUtilDetail' and id_publication = '$id'");
    $delParticiper->execute();
}


//Vérifie si il y a déjà des media existant dans la publication
$reqCountMedia = $bdd->query("SELECT id_media FROM illustrer WHERE id_publication=" . $id . " ORDER BY id_media DESC LIMIT 1 ");
$nbMedia = $reqCountMedia->fetch();

//Si oui on insert en ajoutant l'id au nom POUR ne pas remplacer le fichier existant.
if ($nbMedia[0] > 0) {
    insertMedia($bdd, $titre . $nbMedia[0], 'publication', $id);

} else insertMedia($bdd, $titre, 'publication', $id);

echo 1;