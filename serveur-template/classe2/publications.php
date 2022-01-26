<?php

include_once 'includes/header.php';

$reqPubli = $bdd->query('SELECT id_publication, titre_publication, annee_publication, type_publication FROM publication order by annee_publication desc');
$publications = $reqPubli->fetchAll();

//Requête préparé pour récupérer nom et prénom de l'admin qui a déposé la publication
$reqAuteur = $bdd->prepare('
SELECT
    tab1.nom_utilisateur,
    tab1.prenom_utilisateur
FROM
    commune.utilisateur AS tab1
JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2
ON
    tab1.id_utilisateur = tab2.id_utilisateur
JOIN ' . $nameprojetgeneral . '.publier AS tab3
ON
    tab2.id_utilisateur_detail = tab3.id_utilisateur_detail   
JOIN ' . $nameprojetgeneral . '.publication AS tab4
ON
    tab3.id_publication = tab4.id_publication
WHERE 
    tab3.id_publication = :idPubli
order by tab1.nom_utilisateur asc');


//Requête pour récupérer les fichiers pdf et les images
$reqMedia = $bdd->prepare("SELECT m.id_media, type_media, source_media, nom_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_publication = :idPubli AND type_media = 'image'");
?>
<main class="col-lg-10">
    <?php include_once "includes/title.php" ?>
    <section id="listPubli" class="listCard content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2><?php echo $q[$_SESSION['lang']]['publications']['a'] ?></h2>
        </div>
        <div class="col-lg-12">
            <?php
            if (isset($_SESSION['emailUser'])) {
                echo "<a class=\"btn btn-success\" href=\"formPublication.php\">" . $q[$_SESSION['lang']]['publications']['b'] . "</a>";
            } else {
                echo "";
            }
            ?>
        </div>
        <?php
        //Pour parcourir l'ensemble des publications disponibles
        for ($i = 0; $i < sizeof($publications); $i++) {

            //Récupère l'auteur de la publication
            $reqAuteur->execute([':idPubli' => $publications[$i]['id_publication']]);
            $auteur = $reqAuteur->fetchAll();

            //Récupère médias de la publication
            $reqMedia->execute([':idPubli' => $publications[$i]['id_publication']]);
            $img = $reqMedia->fetch();

                echo "<section class=\"card\">";

                if (!empty($img)) {
                    echo "<img class=\"card-img-top img-fluid\" src=\"media/image/" . $img['source_media'] . "\" />";
                }

                echo "
              <section class=\"card-body publication\">
                <h3 class=\"card-title text-center\">" . $publications[$i]['titre_publication'] . "</h3>
                <p class=\"card-text font-italic\">" . $publications[$i]['type_publication'] . ", " . $publications[$i]['annee_publication'] . "</p>
                </section>
                  <section class=\"card-footer date\">
                <p class=\"card-text \">" . $q[$_SESSION['lang']]['publications']['c'] . " ";
            if (sizeof($auteur) == 0)
            {
                echo "<strong> Personne </strong>&nbsp;";
            }
            else
            {
                for ($j = 0; $j < sizeof($auteur); $j++) {
                    if ($j == sizeof($auteur) - 1) {
                        echo " <strong>" . $auteur[$j]['prenom_utilisateur'] . " " . $auteur[$j]['nom_utilisateur'] . "</strong>&nbsp;";
                    } else {
                        echo " <strong>" . $auteur[$j]['prenom_utilisateur'] . " " . $auteur[$j]['nom_utilisateur'] . "</strong>,";
                    }
                }
            }

                echo "</p>
                <a class=\"btn btn-primary\" href=\"publication.php?publication=" . $publications[$i]['id_publication'] . "\">" . $q[$_SESSION['lang']]['publications']['d'] . "</a>
              </section>
            </section>";

        }
        ?>
    </section>
</main>
<?php
include_once "includes/footer.php";
?>
