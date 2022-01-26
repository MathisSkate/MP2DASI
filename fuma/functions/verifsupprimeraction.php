<?php

include_once "config.php";

foreach ($_POST['supAct'] as $chkbxSupAct) {

    /*supprime les illustrations en lien avec l'action*/
    $delThese = $bdd->prepare("delete from illustrer where id_these = (SELECT id_these from these where id_action='$chkbxSupAct') or id_publication = (SELECT id_publication from publication where id_action='$chkbxSupAct') ");
    $delThese->execute();

    /*supprime les theses en lien avec l'action*/
    $delThese = $bdd->prepare("DELETE FROM these WHERE these.id_action = '$chkbxSupAct'");
    $delThese->execute();

    /*supprime les publications en lien avec l'action*/
    $delPublication = $bdd->prepare("DELETE FROM publication WHERE publication.id_action = '$chkbxSupAct'");
    $delPublication->execute();

    /*supprime les sous actions en lien avec l'action*/
    $delSousAction = $bdd->prepare("DELETE FROM sous_action WHERE sous_action.id_action = '$chkbxSupAct'");
    $delSousAction->execute();

    /*supprime les personnes en lien avec l'action*/
    $delParticiper = $bdd->prepare("DELETE FROM participer WHERE participer.id_action = '$chkbxSupAct'");
    $delParticiper->execute();

    /*supprime l'action en elle-meme*/
    $delAction = $bdd->prepare("DELETE FROM action WHERE action.id_action = '$chkbxSupAct'");
    $delAction->execute();

}

if ($_POST['supAct'] == null) {
    echo 0;
} else {
    echo 1;
}

?>
