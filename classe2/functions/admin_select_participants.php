<?php

//DESC : fichier qui séléctionne tous les utilisateur pour les afficher dans le tableau de la page "admin_utilisateur"

include "config.php";

if (strlen($_POST['nbPage']) != 0) {
    $page = $_POST['nbPage'];
} else {
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
                                ORDER BY `nom_utilisateur` asc limit " . $page . ",10");
$stmt2->bindParam(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);
$stmt2->execute();

$query = $bdd->prepare("SELECT tab1.photo_utilisateur, tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.statut_utilisateur, tab1.etablissement_utilisateur, tab1.mail_utilisateur 
                                FROM commune.utilisateur as tab1
                                JOIN commune.participer AS tab2
                                ON tab1.id_utilisateur = tab2.id_utilisateur
                                JOIN commune.projet AS tab3 
                                ON tab2.id_projet = tab3.id_projet
                                WHERE tab3.nom_projet = :projetgeneral
                                ");
$query->bindParam(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);
$query->execute();

$all = $query->fetchAll();
$stmtall = $stmt2->fetchAll();

//create a hidden table
foreach ($all as $d) {

    $a = 0;
    foreach ($stmtall as $don) {
        if ($d['mail_utilisateur'] == $don['mail_utilisateur']) {
            $a = 1;
        } //end if
    } //end foreach

    if ($a == 0) {
        $nom = $d['nom_utilisateur'];
    $prenom = $d['prenom_utilisateur'];
    $status = $d['statut_utilisateur'];
    if ($d['photo_utilisateur']) {
        echo "<tr class='hidden' style='display:none;'> <td ><img style='width: 3rem;' src=\"../media_commun/avatar/" . $d['photo_utilisateur'] . "\" alt=\"Logo " . $d['nom_utilisateur'] . "\"></td>";
    } else {
        echo "<tr class='hidden' style='display:none;'><td ><img style='width: 3rem;' src=\"../media_commun/avatar/classe2_avatar.png\" alt=\"Logo " . $d['nom_utilisateur'] . "\"></td>";
    }
    echo "
        <td >$nom</td>
        <td >$prenom</td>
        <td > $status </td>
        <td >" . $d['etablissement_utilisateur'] . "</td>                            
        <td >" . $d['mail_utilisateur'] . "</td>
        <td >
                <a class=\"btn btn-primary\" href=\"./profil.php?mail=" . $d['mail_utilisateur'] . "\">Lien</a>
        </td>
    </tr>";
    }//end if


} //end while

foreach ($stmtall as $donnees) {


    echo "
        <tr>";
    if ($donnees['photo_utilisateur']) {
        echo "<td><img style='width: 3rem;' src=\"../media_commun/avatar/" . $donnees['photo_utilisateur'] . "\" alt=\"Logo " . $donnees['nom_utilisateur'] . "\"></td>";
    } else {
        echo "<td><img style='width: 3rem;' src=\"../media_commun/avatar/classe2_avatar.png\" alt=\"Logo " . $donnees['nom_utilisateur'] . "\"></td>";
    }
    echo "<td>" . $donnees['nom_utilisateur'] . "</td>
                <td>" . $donnees['prenom_utilisateur'] . "</td>
                <td >" . $donnees['statut_utilisateur'] . "</td>
                <td>" . $donnees['etablissement_utilisateur'] . "</td>                            
                <td>" . $donnees['mail_utilisateur'] . "</td>
                <td>
                    <a class=\"btn btn-primary\" href=\"./profil.php?mail=" . $donnees['mail_utilisateur'] . "\">Lien</a>
                </td>
        </tr>
        ";
}
