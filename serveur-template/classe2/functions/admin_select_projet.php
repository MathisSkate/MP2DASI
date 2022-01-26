<?php

//DESC : fichier qui séléctionne tous les projet pour les afficher dans le tableau de la page "admin_projet"

//inclure le fichier qui possède la  variable de la BDD

include "config.php";
$stmt2 = $bdd->prepare("SELECT tab1.id_projet, tab1.logo_projet, tab1.nom_projet, tab1.abreviation_projet, tab1.resume_projet, tab1.date_debut_projet, tab1.date_fin_projet, tab1.media_projet FROM commune.projet AS tab1 ORDER BY `nom_projet` DESC");
$stmt2->execute();

while ($donnees = $stmt2->fetch()){
    echo "
        <tr>
                <td>".$donnees['id_projet']."</td>
                <td><img style='width: 10rem;' src=\"../media_commun/projet/".$donnees['logo_projet']."\" alt=\"Logo ".$donnees['nom_projet']."\"></td>
                <td>".$donnees['nom_projet']."</td>                           
                <td>".$donnees['abreviation_projet']."</td>  
                <td>
                    <button style='display: block;margin: 0 auto;' class=\"resume-data btn btn-info\" data-toggle=\"modal\" id='".$donnees['id_projet']."' data-target=\"#myModal\"contenteditable=\"false\">Lire resume</button>
                </td>                         
                <!--<td><div style=\"height:100px; overflow:auto;\">".$donnees['resume_projet']."</div></td> -->                          
                <td>".$donnees['date_debut_projet']."</td>                           
                <td>".$donnees['date_fin_projet']."</td>  
                <td><img style='width: 10rem;' src=\"../index_pack/media/".$donnees['media_projet']."\" alt=\"Media ".$donnees['nom_projet']."\"></td>                         
                <td>
                    <button style='display: block;margin: 0 auto;' class=\"edit-data btn btn-success\" data-toggle=\"modal\" id='".$donnees['id_projet']."' data-target=\"#myModal\"contenteditable=\"false\">Editer</button>
                </td>
        </tr>
        ";
}