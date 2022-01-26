<?php

include_once "config.php";

$inputNomAction = $_POST['inputNomAction'];
$inputLienAction=$_POST['inputLienAction'];
/*Pour afficher les actions*/
$req = $bdd->prepare('SELECT id_action from ' . $nameprojetgeneral . '.action');
$req->execute();
$reqAct = $req->fetchAll();

/*Pour afficher les sous-actions*/
$req = $bdd->prepare('SELECT id_sous_action from ' . $nameprojetgeneral . '.sous_action order by id_sous_action desc');
$req->execute();
$reqSousAct = $req->fetchAll();

/*Permet de creer la derniere action par rapport a la BDD*/
// $derniereAction = sizeof($reqAct);

$derniereSousAction = ($reqSousAct[0]['id_sous_action'] + 1);

$nbSousAction = $_POST['nbSousAction'];

if (isset($inputNomAction)) {

    // $stmt = $bdd->prepare("INSERT INTO action(id_action, nom_action)
    //                                       VALUES (?, ?)");
    // $stmt->bindParam(1, $derniereAction);
    // $stmt->bindParam(2, $inputNomAction);
    // $stmt->execute();

    //affecter le numero
    $query=$bdd->prepare('SELECT * from ' .$nameprojetgeneral  . '.action;');
    $query->execute();
   


    $stmt = $bdd->prepare("INSERT INTO action(numero_action, nom_action,media_action)VALUES (?,?,?)");
    //$stmt->bindParam(1, $derniereAction);
    $numero=count($query->fetchAll());// affecter le numero de l'action
    $stmt->bindParam(1,$numero );
    $stmt->bindParam(2, $inputNomAction);
    $stmt->bindParam(3, $inputLienAction);
    $stmt->execute();

    //recuperer le dernier id de action
    $derniereAction = $bdd->lastInsertId();
   

    if ($nbSousAction == 0) {
        $idSousAction = $derniereSousAction;

        $stmt = $bdd->prepare("INSERT INTO sous_action(num_sous_action, nom_sous_action, id_action)
                                          VALUES ( null, null, ?)");
       // $stmt->bindParam(1, $idSousAction);
        $stmt->bindParam(1, $derniereAction);
        $stmt->execute();
    } else {
        for ($i = 0; $i < $nbSousAction; $i++) {

            $idSousAction = $derniereSousAction + $i;
            $numSousAction = $i + 1;

            
            $stmt = $bdd->prepare("INSERT INTO sous_action(num_sous_action, nom_sous_action, id_action)
            VALUES (?, ?, ?)");
            //$stmt->bindParam(1, $idSousAction);
            $stmt->bindParam(1, $numSousAction);
            $stmt->bindParam(2, $_POST['inputNomSousAction' . $numSousAction]);
            $stmt->bindParam(3, $derniereAction);
            $stmt->execute();

        }

    }
    echo 1;

} else {
    echo 0;
}
