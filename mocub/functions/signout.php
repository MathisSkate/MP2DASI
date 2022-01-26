<?php
//DESC : Fichier qui détruit la session actuelle pour se déconnecter

session_start();
session_destroy();
echo "logout";
?>