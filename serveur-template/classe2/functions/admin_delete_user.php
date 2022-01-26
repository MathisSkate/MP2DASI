<?php

//DESC : fonction qui gère la suppression d'un utilisateur dans le panel admin des utilisateurs

//inclure le fichier qui possède la  variable de la BDD

include "config.php";

//On récupère les données du formulaire

$iduser = $_POST['inputId'];
$iduser = filter_var($iduser, FILTER_SANITIZE_STRING);

if(isset($_POST["inputId"]))
{
    /*Supprime le laboratoire*/
    $stmtLabUtil = $bdd->prepare("DELETE FROM commune.etudier WHERE commune.etudier.id_utilisateur = :iduser");
    $stmtLabUtil->bindParam(':iduser', $iduser, PDO::PARAM_STR);
    $stmtLabUtil->execute();

    $stmt = $bdd->prepare("DELETE FROM commune.participer WHERE id_utilisateur = :iduser;
                                     DELETE FROM commune.utilisateur WHERE id_utilisateur = :iduser");
    $stmt->bindParam(':iduser', $iduser, PDO::PARAM_STR);
    $stmt->execute();

    echo 1;
} else {
    echo 0;
}
?>