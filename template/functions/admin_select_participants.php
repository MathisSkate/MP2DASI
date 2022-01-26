<?php

//DESC : fichier qui séléctionne tous les utilisateur pour les afficher dans le tableau de la page "admin_utilisateur"

include "config.php";

if (strlen($_POST['nbPage']) != 0)
{
    $page = $_POST['nbPage'];
}
else
{
    $page = 1;
}

//inclure le fichier qui possède la  variable de la BDD

$stmt2 = $bdd->prepare("SELECT tab1.photo_utilisateur, tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.statut_utilisateur, tab1.etablissement_utilisateur, tab1.mail_utilisateur 
                                FROM commune.utilisateur as tab1
                                JOIN commune.participer AS tab2
                                ON tab1.id_utilisateur = tab2.id_utilisateur
                                JOIN commune.projet AS tab3 
                                ON tab2.id_projet = tab3.id_projet
                                WHERE tab3.nom_projet = :projetgeneral
                                ORDER BY `nom_utilisateur` asc limit ".$page.",10");
$stmt2->bindParam(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);
$stmt2->execute();

while ($donnees = $stmt2->fetch()){
    echo "
        <tr>";
                if ($donnees['photo_utilisateur']){
                    echo "<td><img style='width: 10rem;' src=\"../media_commun/avatar/".$donnees['photo_utilisateur']."\" alt=\"Logo ".$donnees['nom_utilisateur']."\"></td>";
                }
                else
                {
                    echo "<td><img style='width: 10rem;' src=\"../media_commun/avatar/classe2_avatar.png\" alt=\"Logo ".$donnees['nom_utilisateur']."\"></td>";
                }
                echo "<td>".$donnees['nom_utilisateur']."</td>
                <td>".$donnees['prenom_utilisateur']."</td>
                <td>".$donnees['statut_utilisateur']."</td>
                <td>".$donnees['etablissement_utilisateur']."</td>                            
                <td>".$donnees['mail_utilisateur']."</td>
                <td>
                    <a class=\"btn btn-primary\" href=\"./profil.php?mail=".$donnees['mail_utilisateur']."\">Lien</a>
                </td>
        </tr>
        ";
}