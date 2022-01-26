<?php

include_once 'includes/header.php';

$reqPubli = $bdd->query('SELECT id_publication, titre_publication, auteur_publication, annee_publication, type_publication FROM publication order by annee_publication desc');
$publications = $reqPubli->fetchAll();

//Requête préparé pour récupérer nom et prénom de l'admin qui a déposé la publication
$reqAuteur = $bdd->prepare('SELECT cu.nom_utilisateur, cu.prenom_utilisateur 
FROM commune.utilisateur AS cu 
  JOIN '.$nameprojetgeneral.'.utilisateur_detail AS npgud ON cu.id_utilisateur = npgud.id_utilisateur 
  JOIN '.$nameprojetgeneral.'.publication AS npgp ON npgud.id_utilisateur_detail = npgp.id_utilisateur_detail 
WHERE id_publication = :idPubli');


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
                echo "<a class=\"btn btn-success\" href=\"formPublication.php\">".$q[$_SESSION['lang']]['publications']['b']."</a>";
            } else {
                echo "";
            }
            ?>
        </div>
        <?php
        //Pour parcourir l'ensemble des publications disponibles
        for ($i = 0; $i < sizeof($publications); $i++) {

            //Récupère l'auteur de l'actu
            $reqAuteur->execute([':idPubli' => $publications[$i]['id_publication']]);
            $auteur =$reqAuteur->fetch();

            //Récupère médias de l'actualité
            $reqMedia->execute([':idPubli' => $publications[$i]['id_publication']]);
            $img = $reqMedia->fetch();

            echo "<section class=\"card\">";

            if (!empty($img)){
                echo "<img class=\"card-img-top img-fluid\" src=\"media/image/".$img['source_media']."\" />";
            }

            echo "
              <section class=\"card-body publication\">
                <h3 class=\"card-title text-center\">".$publications[$i]['titre_publication']."</h3>
                <p class=\"card-text font-italic\">".$publications[$i]['type_publication'].", ".$publications[$i]['annee_publication']."</p>
                <p class=\"card-text \">".$q[$_SESSION['lang']]['publications']['c']." <strong>".$publications[$i]['auteur_publication']."</strong></p>
                <a class=\"btn btn-primary\" href=\"publication.php?publication=".$publications[$i]['id_publication']."\">".$q[$_SESSION['lang']]['publications']['d']."</a>
              </section>
            </section>";
        }
        ?>
    </section>
</main>
<?php
include_once "includes/footer.php";
?>
