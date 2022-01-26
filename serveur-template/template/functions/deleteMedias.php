<?php

//DESC : fichier qui sert à supprimer les médias

include_once "config.php";

//inclure le fichier qui possède la  variable de la BDD

function deleteAllMedia($bdd, $page, $id){
    $idPage = 'id_'.$page;

    //Requête pour récupérer tous les id_media lié à la page
    $reqMedias = $bdd->query("SELECT m.id_media FROM media AS m
JOIN illustrer AS i ON m.id_media = i.id_media
JOIN ".$page." AS p ON i.".$idPage." = p.".$idPage."
WHERE p.".$idPage." = ".$id." ");

    $medias = $reqMedias->fetchAll();


    //Supprimer media dans illustrer
    $bdd->exec("DELETE FROM illustrer WHERE ".$idPage." = ".$id." ");

    foreach ($medias as $idMedia) {

        $bdd->exec("DELETE FROM media WHERE id_media = ".$idMedia['id_media']." ");
    }
}
