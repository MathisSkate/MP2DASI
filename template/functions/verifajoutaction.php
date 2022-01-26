<?php

include_once "config.php";

$inputNomAction = $_POST['inputNomAction'];

/*Pour afficher les actions*/
$req = $bdd->prepare('SELECT id_action from ' . $nameprojetgeneral . '.action');
$req->execute();
$reqAct = $req->fetchAll();

/*Pour afficher les sous-actions*/
$req = $bdd->prepare('SELECT id_sous_action from ' . $nameprojetgeneral . '.sous_action order by id_sous_action desc');
$req->execute();
$reqSousAct = $req->fetchAll();

/*Permet de creer la derniere action par rapport a la BDD*/
$derniereAction = sizeof($reqAct);

$derniereSousAction = ($reqSousAct[0]['id_sous_action'] + 1);

$nbSousAction = $_POST['nbSousAction'];

if (isset($inputNomAction)) {

    $stmt = $bdd->prepare("INSERT INTO action(id_action, nom_action)
                                          VALUES (?, ?)");
    $stmt->bindParam(1, $derniereAction);
    $stmt->bindParam(2, $inputNomAction);
    $stmt->execute();


    if ($nbSousAction == 0) {
        $idSousAction = $derniereSousAction;

        $stmt = $bdd->prepare("INSERT INTO sous_action(id_sous_action, num_sous_action, nom_sous_action, id_action)
                                          VALUES (?, null, null, ?)");
        $stmt->bindParam(1, $idSousAction);
        $stmt->bindParam(2, $derniereAction);
        $stmt->execute();
    } else {
        for ($i = 0; $i < $nbSousAction; $i++) {

            $idSousAction = $derniereSousAction + $i;
            $numSousAction = $i + 1;

            $stmt = $bdd->prepare("INSERT INTO sous_action(id_sous_action, num_sous_action, nom_sous_action, id_action)
                                          VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $idSousAction);
            $stmt->bindParam(2, $numSousAction);
            $stmt->bindParam(3, $_POST['inputNomSousAction' . $numSousAction]);
            $stmt->bindParam(4, $derniereAction);
            $stmt->execute();
        }

    }
    echo 1;

} else {
    echo 0;
} ?>
