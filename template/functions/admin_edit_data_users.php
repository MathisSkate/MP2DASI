<?php

//DESC : fonction qui met les données dans le modal quand on clique sur "éditer"  dans le panel admin des utilisateurs

//inclure le fichier qui possède la  variable de la BDD

include "config.php";

//On récupère les données du formulaire

$iduser = $_POST['id_user'];
$iduser = filter_var($iduser, FILTER_SANITIZE_STRING);

if(isset($_POST["id_user"]))
{
    $stmt = $bdd->prepare("SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.mission_utilisateur, tab1.prenom_utilisateur, tab1.statut_utilisateur, tab1.etablissement_utilisateur, tab1.site_utilisateur, tab1.mail_utilisateur, tab1.super_admin, tab4.id_laboratoire, tab4.nom_laboratoire 
                                     FROM commune.utilisateur AS tab1 
                                     JOIN commune.laboratoire AS tab4 
                                     ON tab1.id_laboratoire = tab4.id_laboratoire 
                                     WHERE tab1.id_utilisateur = ?");
    $stmt->bindParam(1, $iduser, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch();

    //On encode en JSON le résultat de la requête

    $result = json_encode($result);

    echo $result;
}
?>