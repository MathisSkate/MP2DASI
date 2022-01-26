<?php
//DESC : fichier qui séléctionne tous les utilisateurs pour les afficher dans le tableau de la page "admin_utilisateur_active"

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$stmt = $bdd->prepare("SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.statut_utilisateur, tab1.etablissement_utilisateur, tab1.mail_utilisateur, tab1.mail_utilisateur 
                                 FROM commune.utilisateur AS tab1 
                                 ORDER BY `id_utilisateur` DESC");
$stmt->execute();

while ($donnees = $stmt->fetch()){
    echo "
        <tr>
                <td>".$donnees['nom_utilisateur']."</td>
                <td>".$donnees['prenom_utilisateur']."</td>                       
                <td>".$donnees['mail_utilisateur']."</td>
                <td>
                    <button style='margin: 0 auto;' class=\"edit-data btn btn-success\" data-toggle=\"modal\" id='".$donnees['id_utilisateur']."' data-target=\"#myModal\"contenteditable=\"false\">Editer</button>
                </td>
        </tr>
        ";
}