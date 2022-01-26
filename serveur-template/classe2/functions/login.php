<?php

//DESC : fichier qui permet de se connecter

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$email = $_POST['inputEmail'];
$email = filter_var($email, FILTER_SANITIZE_STRING);

$sth = $bdd->prepare("SELECT mail_utilisateur, mdp_utilisateur, nom_utilisateur FROM commune.utilisateur WHERE mail_utilisateur = ?");
$sth->bindParam(1, $email);
$sth->execute();
$result1 = $sth->fetch();

$passwordFromPost = $_POST['inputPassword'];

//On crypte le mot de passe en sha256

$hashedPassword = hash('sha256', $passwordFromPost);

//Si le mot de passe de la bdd est égal au mot de passe entré dans le formulaire on regarde ses infos

if($hashedPassword == $result1['mdp_utilisateur']) {
    $sth2 = $bdd->prepare("SELECT tab1.mail_utilisateur, tab1.super_admin, tab2.id_projet, tab3.nom_projet, tab2.admin, tab4.id_utilisateur_detail 
                                     FROM commune.utilisateur AS tab1
                                     JOIN commune.participer AS tab2 
                                     ON tab1.id_utilisateur = tab2.id_utilisateur 
                                     JOIN commune.projet AS tab3 
                                     ON tab2.id_projet = tab3.id_projet 
                                     JOIN ".$nameprojetgeneral.".utilisateur_detail AS tab4 
                                     ON tab1.id_utilisateur = tab4.id_utilisateur 
                                     WHERE tab1.mail_utilisateur = ? AND tab3.nom_projet = ?");
    $sth2->bindParam(1, $email);
    $sth2->bindParam(2, $nameprojetgeneral);
    $sth2->execute();
    $result2 = $sth2->fetch();

    $nameprojetuser = $result2['nom_projet'];
    $isAdmin = $result2['admin'];

    //On regarde si l'utilisateur est bien dans le projet qu'il essaye de se connecter

    if ($result2){
        if ($nameprojetuser == $nameprojetgeneral){
            //Si toutes ces conditions sont remplies on commence la session avec ses différentes variables
            session_start();

            $_SESSION["emailUser"] = $result2['mail_utilisateur'];
            $_SESSION["idUserDetail"] = $result2['id_utilisateur_detail'];
            $_SESSION["isAdmin"] = $result2['admin'];
            $_SESSION['isSuperAdmin'] = $result2['super_admin'];

            //On crée du HTML pour la redirection vers le profil

            echo "<input class='isAdmin' type=hidden value='".$result2['admin']."'/>";
            echo "<input class='mailUser' type=hidden value='".$result2['mail_utilisateur']."'/>";
        } else {
            echo 1;
        }
    } else {
        echo 2;
    }
} else {
  echo 0;

}

?>

