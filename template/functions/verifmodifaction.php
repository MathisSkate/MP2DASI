<?php

include_once "config.php";

$action = $_POST['nbAction'];

$inputNomAction = $_POST['inputNomAction'];

$nbSousAction = $_POST['nbSousAction'];


//Permet de mettre dans un tableur tous les ids en commun
$req = $bdd->prepare('SELECT id_utilisateur_detail, id_action FROM ' . $nameprojetgeneral . '.participer where id_action = \'' . $action . '\'');
$req->execute();
$reqUAction = $req->fetchAll();

//Pour afficher les sous-actions
$req = $bdd->prepare('SELECT id_sous_action from ' . $nameprojetgeneral . '.sous_action order by id_sous_action desc');
$req->execute();
$reqSousAct = $req->fetchAll();

$derniereSousAction = ($reqSousAct[0]['id_sous_action'] + 1);

//initialise un tableau avec toutes les valeurs deja rentrees
$tabUtilExiste = array();
for ($i = 0; $i < sizeof($reqUAction); $i++) {
    $id_utilisateur_action = $reqUAction[$i]['id_utilisateur_detail'];
    array_push($tabUtilExiste, $id_utilisateur_action);
}

//permet d'ajouter/supprimer les utilisateurs
foreach ($_POST['util'] as $chkbxUtil) {

    //Pour retrouver l'id_utilisateur_detail de l'utilisateur
    $req = $bdd->query('SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab2.id_utilisateur_detail FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur where tab1.id_utilisateur = ' . $chkbxUtil . ' ');
    $reqUtil = $req->fetchAll();
    //var_dump($reqUtil);

    $detail = $reqUtil[0]['id_utilisateur_detail'];

    //Pour retrouver l'id_utilisateur_detail de l'utilisateur
    $req = $bdd->prepare('SELECT id_utilisateur_detail, id_action FROM ' . $nameprojetgeneral . '.participer where id_utilisateur_detail = \'' . $detail . '\' and  id_action = \'' . $action . '\'');
    $req->execute();
    $reqUExiste = $req->fetchAll();

    if (sizeof($reqUExiste) == 0) {
        //Permet d'ajouter les nouvelles personnes
        $stmt = $bdd->prepare("INSERT INTO participer(id_action, id_utilisateur_detail)
                                                  VALUES (?, ?)");
        $stmt->bindParam(1, $action);
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
    $req = $bdd->prepare('SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab2.id_utilisateur_detail FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur where tab2.id_utilisateur_detail = \'' . $utilExistePlus . '\' ');
    $req->execute();
    $reqUtilPlus = $req->fetchAll();
    $inputIdUtilDetail = $reqUtilPlus[0]['id_utilisateur_detail'];

    $delParticiper = $bdd->prepare("DELETE FROM participer WHERE id_utilisateur_detail = '$inputIdUtilDetail'");
    $delParticiper->execute();
}

if ($_POST['util'] == null) {
    echo 0;
} else {
    echo 1;
}

if(isset($inputNomAction)){

    $stmt = $bdd->prepare("UPDATE action SET id_action='$action', nom_action='$inputNomAction' where id_action = '$action' ");

    $stmt->execute();

    echo 1;
}
else{
    echo 0;
}

//Permet de modifier les sous-actions
if ($nbSousAction == 0) {
    echo 1;
} else {
    /*supprime les sous actions en lien avec l'action*/
    $delSousAction = $bdd->prepare("DELETE FROM sous_action WHERE sous_action.id_action = '$action'");
    $delSousAction->execute();

    for ($i = 0; $i < $nbSousAction; $i++) {

        $idSousAction = $derniereSousAction + $i;
        $numSousAction = $i + 1;

        $stmt = $bdd->prepare("INSERT INTO sous_action(id_sous_action, num_sous_action, nom_sous_action, id_action)
                                          VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $idSousAction);
        $stmt->bindParam(2, $numSousAction);
        $stmt->bindParam(3, $_POST['inputNomSousAction' . $numSousAction]);
        $stmt->bindParam(4, $action);
        $stmt->execute();
    }
    echo 1;
}
?>