<?php
/**
 * Created by PhpStorm.
 * User: doria
 * Date: 24/02/2019
 * Time: 12:49
 */

include_once 'includes/header.php';

$reqThese = $bdd->query('SELECT id_these, titre_these, annee_these, soutenant_these, id_action FROM these order by annee_these desc');
$theses = $reqThese->fetchAll();

//Requête préparé pour récupérer nom et prénom de l'admin qui a déposé la thèse
$reqAuteur = $bdd->prepare('SELECT cu.nom_utilisateur, cu.prenom_utilisateur 
FROM commune.utilisateur AS cu 
  JOIN '.$nameprojetgeneral.'.utilisateur_detail AS npgud ON cu.id_utilisateur = npgud.id_utilisateur 
  JOIN '.$nameprojetgeneral.'.these AS npgt ON npgud.id_utilisateur_detail = npgt.id_utilisateur_detail 
WHERE id_these = :idThese');


//Requête pour récupérer les fichiers pdf et les images
$reqMedia = $bdd->prepare("SELECT m.id_media, type_media, source_media, nom_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_these = :idThese AND type_media = 'image'");
?>
    <main class="col-lg-10">
        <?php include_once 'includes/title.php' ?>
        <section id="listPubli" class="listCard content-container col-lg-12 row">
            <div class="col-lg-12">
                <h2><?php echo $q[$_SESSION['lang']]['theses']['a']?></h2>
            </div>
            <div class="col-lg-12">
                <?php
                if (isset($_SESSION['emailUser'])) {
                    echo "<a class=\"btn btn-success\" href=\"formThese.php\">".$q[$_SESSION['lang']]['theses']['b']."</a>";
                } else {
                    echo "";
                }
                ?>
            </div>
            <?php
            //Pour parcourir l'ensemble des thèses disponibles
            for ($i = 0; $i < sizeof($theses); $i++) {

                //Récupère l'auteur de l'actu
                $reqAuteur->execute([':idThese' => $theses[$i]['id_these']]);
                $auteur =$reqAuteur->fetch();

                //Récupère médias de l'actualité
                $reqMedia->execute([':idThese' => $theses[$i]['id_these']]);
                $img = $reqMedia->fetch();

                echo "<section class=\"card\">";

                if (!empty($img)){
                    echo "<img class=\"card-img-top img-fluid\" src=\"media/image/".$img['source_media']."\" />";
                }

                echo "
              <section class=\"card-body publication\">
                <h2 class=\"card-title text-center\">".$theses[$i]['titre_these']."</h2>
                <p class=\"card-text \">".$q[$_SESSION['lang']]['theses']['c']." <strong>".$theses[$i]['soutenant_these']."</strong> ".$q[$_SESSION['lang']]['theses']['e']."<span class=\"font-italic\">".$theses[$i]['annee_these']."</span></p>
                <a class=\"btn btn-primary\" href=\"these.php?these=".$theses[$i]['id_these']."\">".$q[$_SESSION['lang']]['theses']['d']."</a>
              </section>
            </section>";
            }
            ?>
        </section>
    </main>
<?php
include_once "includes/footer.php";
?>
