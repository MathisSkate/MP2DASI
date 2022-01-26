<?php
/**
 * Created by PhpStorm.
 * User: doria
 * Date: 28/02/2019
 * Time: 21:41
 */
include_once "config.php";
require_once "deleteMedias.php";

$idPub = $_POST['idPub'];

deleteAllMedia($bdd, 'publication', $idPub);

$reqDeletePublier = $bdd->exec("DELETE FROM publier WHERE id_publication =".$idPub." ");

$reqDeletePublication = $bdd->exec("DELETE FROM publication WHERE id_publication =".$idPub." ");

echo 1;

