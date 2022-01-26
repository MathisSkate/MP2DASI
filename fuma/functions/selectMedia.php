<?php

//DESC : Création d'une fonction pour selectionner des médias

function selectMedia($bdd, $page, $id, $typeMedia)
{
    $idPage = 'id_' . $page;

    //Requête pour récupérer tous les id_media lié à la page
    $reqMedias = $bdd->query("SELECT m.id_media, m.source_media, m.nom_media FROM media AS m JOIN illustrer AS i ON m.id_media = i.id_media WHERE i." . $idPage . " = " . $id . " AND m.type_media= '" . $typeMedia . "' ");
    $reqMedias->execute();
    $medias = $reqMedias->fetchAll();

    return $medias;
}