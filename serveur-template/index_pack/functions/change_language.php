<?php
//DESC : fichier qui permet la traduction

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

//Si la valeur post est renseigné alors on met à jour la valeur session lang

if(isset($_POST['langVal'])){
    $_SESSION['lang'] = $_POST['langVal'];
}

echo $_SESSION['lang'];