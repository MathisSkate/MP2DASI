<?php

include_once "includes/header.php";

//Requête pour récupérer informtions sur chaque actualités
$reqActu = $bdd->query('SELECT id_actualite, type_actualite, titre_actualite, date_actualite_debut, date_actualite_fin, description_actualite, resume_actualite, id_utilisateur_detail FROM '.$nameprojetgeneral.'.actualite order by date_actualite_debut desc');
$actualites= $reqActu->fetchAll();

//Requête préparé pour récupérer nom et prénom de l'auteur
//Jointure avec 2 base de donnée
$reqAuteur = $bdd->prepare('SELECT cu.nom_utilisateur, cu.prenom_utilisateur 
FROM commune.utilisateur AS cu 
  JOIN '.$nameprojetgeneral.'.utilisateur_detail AS npgud ON cu.id_utilisateur = npgud.id_utilisateur 
  JOIN '.$nameprojetgeneral.'.actualite AS npga ON npgud.id_utilisateur_detail = npga.id_utilisateur_detail 
WHERE id_actualite = :idActu');

//Requête préparer pour récuperer image/fichier liée à l'actualité
$reqMedia = $bdd->prepare("SELECT m.id_media, type_media, source_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_actualite = :idActu AND m.type_media = 'image'");
?>

<main class="col-lg-10">
    <?php include_once "includes/title.php"?>
    <section id="listActu" class="listCard content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2><?php echo $q[$_SESSION['lang']]['actualites']['a']?></h2>
        </div>
        <div class="col-lg-12">
            <?php
            if (isset($_SESSION['emailUser'])) {
                echo "<a class=\"btn btn-success\" href=\"formActualite.php\">".$q[$_SESSION['lang']]['actualites']['b']."</a>";
            } else {
                echo "";
            }
            ?>
        </div>
        <?php
        //Pour parcourir l'ensemble des actualités disponibles
        for ($i = 0; $i < sizeof($actualites); $i++) {

            //Récupère l'auteur de l'actu
            $reqAuteur->execute([':idActu' => $actualites[$i]['id_actualite']]);
            $auteur =$reqAuteur->fetch();

            //Récupère médias de l'actualité
            $reqMedia->execute([':idActu' => $actualites[$i]['id_actualite']]);
            $img = $reqMedia->fetch();

            echo "<section class=\"card\">";

            if (!empty($img)){
                echo "<img class=\"card-img-top img-fluid\" src=\"media/image/".$img['source_media']."\" />";
            }

            //En fonction du type --> changement de class --> changement de couleur et autre ajout possible
            if ($actualites[$i]['type_actualite'] == 'Événement'){
                echo "<section class=\"card-body actualite evenement\">";
            }
            else {
                echo "<section class=\"card-body actualite article\">";
            }

            // pour transformer la date de debut
            $dateDebut = date_create($actualites[$i]['date_actualite_debut']);
            $dateDebut = date_format($dateDebut, 'd/m/Y');

            if (strlen($actualites[$i]['date_actualite_fin']) == 0) {
                $dateFin = " ";
            } else {
                // pour transformer la date de fin
                $dateFin = date_create($actualites[$i]['date_actualite_fin']);
                $dateFin = date_format($dateFin, 'd/m/Y');
                $dateFin = "~ " . $dateFin;
            }

            echo "
                  <h2 class=\"card-title\">".$actualites[$i]['titre_actualite']."</h2>
                  <h4 class=\"card-title\">".$dateDebut." ".$dateFin."</h4>
                  <p class=\"card-text\">".$actualites[$i]['resume_actualite']."</p>
                  </section>
                  <section class=\"card-footer date\">
                  <a class=\"btn btn-primary\" href=\"actualite.php?actualite=".$actualites[$i]['id_actualite']."\">".$q[$_SESSION['lang']]['actualites']['e']."</a>
                  </section>
                  </section>";
        }
        ?>
    </section>
</main>
<?php
include_once "includes/footer.php";
?>


