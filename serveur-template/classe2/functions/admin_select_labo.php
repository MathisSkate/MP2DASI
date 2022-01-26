<?php

//DESC : fichier qui séléctionne tous les laboratoire pour les afficher dans le tableau de la page "admin_laboratoire"

//inclure le fichier qui possède la  variable de la BDD

include "config.php";

$stmt2 = $bdd->prepare("SELECT tab1.id_laboratoire, tab1.nom_laboratoire, tab1.abreviation_laboratoire, tab1.img_laboratoire, tab1.site_laboratoire
                                  FROM commune.laboratoire AS tab1
                                  ORDER BY `id_laboratoire` DESC");
$stmt2->execute();

$stmt3 = $bdd->prepare("SELECT
    tab3.nom_projet
FROM
    commune.laboratoire AS tab1
    JOIN commune.appartenir AS tab2
    ON tab1.id_laboratoire = tab2.id_laboratoire
    JOIN commune.projet AS tab3
    ON tab2.id_projet = tab3.id_projet
    WHERE tab1.id_laboratoire = :donnees ");

while ($donnees = $stmt2->fetch()) {
    $idDonnees = $donnees['id_laboratoire'];
    $stmt3->bindParam(":donnees", $idDonnees);
    $stmt3->execute();
    $nom = $stmt3->fetchAll();
    echo "
        <tr>    
                <td><img style='width: 10rem;' src=\"../media_commun/laboratoire/" . $donnees['img_laboratoire'] . "\" alt=\"Logo " . $donnees['nom_laboratoire'] . "\"></td>
                <td>" . $donnees['nom_laboratoire'] . "</td>
                <td>" . $donnees['abreviation_laboratoire'] . "</td>
                <td><a class=\"btn btn-primary stretched-link\" target='_blank' href='" . $donnees['site_laboratoire'] . "'>Accéder au site</a></td>";
            echo "<td> ";
            for ($i = 0; $i < sizeof($nom); $i++) {
                if ($i == sizeof($nom) - 1) {
                    echo "<span>
                    ".$nom[$i]['nom_projet']."
                     </span>";
                } else {
                    echo "<span>
                    ".$nom[$i]['nom_projet'].",
                     </span>";
                }
            }
            echo " </td>";
            echo "<td><button class=\"edit-data btn btn-success\" data-toggle=\"modal\" id='" . $donnees['id_laboratoire'] . "' data-target=\"#myModal\"contenteditable=\"false\">Editer</button></td>
        </tr>
        ";
}