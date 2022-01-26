<?php
/**
 * Ce script permet l'ajout d'une action en base avec ses sous actions
 * Il créé d'abord un objet ActionBDD, puis à partir de cet objet insère les données en base
 */
require "bdd/ActionBDD.php";
include_once "includes/header.php";
    // on récupère le nombre de sous action
    $nbSousActions = intval($_POST["nbSousAction"], 10);

    // On génère notre objet ActionBDD
    $action = new ActionBDD(null, $_POST["numaction"], $_POST['inputNomAction'], "");

    // Puis on insère ses éventuelles sous actions
    for ($i=0; $i<$nbSousActions; $i++)
    {
        $action->ajouterSousAction(new ActionBDD(null, ($i + 1), $_POST["inputNomSousAction" . ($i + 1)], null));
    }

    // On prépare une requête pour insérer l'action dans la table action
    $req = $bdd->prepare("insert into action (numero_action, nom_action, media_action) values (?,?,?) ");

    // Puis on l'insère à partir de la requête préparée et de l'objet ActionBDD
    $req->execute(array($action->getNumeroAction(),
        $action->getNom(),
        $action->getMediaAction()));

    // On affecte à notre objet ActionBDD son id auto incrémenté
    $action->setId($bdd->lastInsertId());

    // Pour terminer on s'occupe des sous action
    $req = $bdd->prepare("insert into sous_action (num_sous_action, nom_sous_action, id_action) values (?,?,?) ");

    for ($i=0; $i<$action->getNbSousActions(); $i++)
    {
        $req->execute(array(
            $action->getSousAction($i)->getNumeroAction(),
            $action->getSousAction($i)->getNom(),
            $action->getId()
        ));
    }
    ?>

<div class="card">
    <div class="card-body">
         <p  class="card-text">Action <?php echo $action->getNom()?> ajoutée !</p>
         <a class="btn btn-success" href="actions.php">Retour aux actions</a>
    </div>

</div>
