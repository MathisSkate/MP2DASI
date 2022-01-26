<?php

//DESC : fichier qui sert à l'ajout d'utilisateur (inscription et panel admin) permettant de regarder si l'email est déjà dans la BDD

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$email = $_POST['inputEmail'];
$email = filter_var($email, FILTER_SANITIZE_STRING);

$stmt = $bdd->prepare("SELECT mail_utilisateur
                                 FROM commune.utilisateur
                                 WHERE mail_utilisateur = ?");
$stmt->bindParam(1, $email, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll();

//On compte le résultat de la requête

$result = count($result);

if ($result > 0){
    echo 1;
}
else{
    echo 0;
}

?>

