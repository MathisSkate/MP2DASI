<?php

//DESC : fonction qui met les données dans le modal quand on clique sur "éditer"  dans le panel admin des projet

//inclure le fichier qui possède la  variable de la BDD

include "config.php";

//On récupère les données du formulaire

$idprojet = $_POST['id_projets'];
$idprojet = filter_var($idprojet, FILTER_SANITIZE_STRING);

if(isset($_POST["id_projets"]))
{
    $stmt = $bdd->prepare("SELECT tab1.id_projet, tab1.logo_projet, tab1.nom_projet, tab1.abreviation_projet, tab1.resume_projet, tab1.date_debut_projet, tab1.date_fin_projet, tab1.media_projet FROM commune.projet AS tab1 
                                     WHERE tab1.id_projet = :idprojet");
    $stmt->bindParam(':idprojet', $idprojet, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch();

    //On encode en JSON le résultat de la requête

    $result = json_encode($result);

    echo $result;
}
?>