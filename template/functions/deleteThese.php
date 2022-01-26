<?php

//DESC : fichier qui sert à l'ajout d'utilisateur (inscription et panel admin) permettant de regarder si l'email est déjà dans la BDD

include_once "config.php";

//inclure le fichier qui possède la  variable de la BDDrequire_once "deleteMedias.php";

require_once "deleteMedias.php";

$idThese = $_POST['idThese'];

//On utilise la fonction delete media

deleteAllMedia($bdd, 'these', $idThese);

$reqDeletePub = $bdd->exec("DELETE FROM these WHERE id_these =".$idThese." ");

echo 1;

