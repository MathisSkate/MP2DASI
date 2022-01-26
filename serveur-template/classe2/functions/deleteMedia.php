<?php

//DESC : fichier qui sert à la suppresion d'un media

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$idMedia=$_POST['id_media'];

if ($_POST['id_media']){
    $bdd->exec("DELETE FROM illustrer WHERE id_media = ".$idMedia." ");
    $bdd->exec("DELETE FROM media WHERE id_media = ".$idMedia." ");
    echo 1;
}else{
    echo 0;
}

