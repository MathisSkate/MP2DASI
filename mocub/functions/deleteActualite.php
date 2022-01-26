<?php
//DESC : fichier qui sert à supprimer une actualite

include_once "config.php";

//inclure le fichier qui possède la  variable de la BDD

require_once "deleteMedias.php";

$idActu = $_POST['idActu'];

deleteAllMedia($bdd, 'actualite', $idActu);

$reqDeleteActu = $bdd->exec("DELETE FROM actualite WHERE id_actualite =".$idActu." ");

echo 1;

