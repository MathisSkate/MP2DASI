<?php

//DESC : fichier qui séléctionne tous les laboratoire pour les afficher dans le tableau de la page "admin_laboratoire"

//inclure le fichier qui possède la  variable de la BDD

include "config.php";

$stmt2 = $bdd->prepare("SELECT tab1.id_laboratoire, tab1.nom_laboratoire, tab1.abreviation_laboratoire, tab1.img_laboratoire, tab1.site_laboratoire
                                  FROM commune.laboratoire AS tab1
                                  ORDER BY `id_laboratoire` DESC");
$stmt2->execute();

while ($donnees = $stmt2->fetch()){
    echo "
        <tr>    
                <td><img style='width: 10rem;' src=\"../media_commun/laboratoire/".$donnees['img_laboratoire']."\" alt=\"Logo ".$donnees['nom_laboratoire']."\"></td>
                <td>".$donnees['nom_laboratoire']."</td>
                <td>".$donnees['abreviation_laboratoire']."</td>
                <td><a class=\"btn btn-primary stretched-link\" target='_blank' href='".$donnees['site_laboratoire']."'>Accéder au site</a></td>
                <td><button class=\"edit-data btn btn-success\" data-toggle=\"modal\" id='".$donnees['id_laboratoire']."' data-target=\"#myModal\"contenteditable=\"false\">Editer</button></td>
        </tr>
        ";
}