<?php

include_once 'index_pack/includes/header.php';

$req = $bdd->prepare("SELECT tab1.logo_projet, tab1.nom_projet, tab1.abreviation_projet, tab1.resume_projet, tab1.date_debut_projet, tab1.date_fin_projet, tab1.media_projet FROM commune.projet AS tab1 ORDER BY `nom_projet` asc ");
$req->execute();
$reqProjet = $req->fetchAll();
?>
<main class="col-lg-12 pageIndex">
    <section class="content-container col-lg-12 row">
        <div class="col-lg-12 titreProjet">
        </div>
        <?php
        //Pour parcourir l'ensemble des projets disponibles
        for ($i = 0; $i < sizeof($reqProjet); $i++) {
            echo "
            <div class=\"card col-lg-12\">
              <div class=\"card-header row\">
                <div class=\"card-title col-lg-3\">";
            if (strlen($reqProjet[$i]['logo_projet']) == 0) {
                echo "<img style='width: 10rem;' src=\"media_commun/projet/default-thumb.png\" alt=\"Logo " . $reqProjet[$i]['nom_projet'] . "\">";

            } else {
                echo "<img style='width: 10rem;' src=\"media_commun/projet/" . $reqProjet[$i]['logo_projet'] . "\" alt=\"Logo " . $reqProjet[$i]['nom_projet'] . "\">";

            }
            echo "</div>
                <div class=\"col-lg-9\">
                    <h4>" . $reqProjet[$i]['abreviation_projet'] . "</h4>
                </div>
                
              </div>
              <div class=\"card-body row\">
                <div class=\"card-title col-lg-3\">";
            if (strlen($reqProjet[$i]['media_projet']) == 0) {
                echo "<img style='width: 10rem;' src=\"index_pack/media/default-thumb.png\" alt=\"Logo " . $reqProjet[$i]['nom_projet'] . "\">";

            } else {
                echo "<img style='width: 10rem;' src=\"index_pack/media/" . $reqProjet[$i]['media_projet'] . "\" alt=\"Logo " . $reqProjet[$i]['nom_projet'] . "\">";

            }
            echo "</div>
                <div class=\"card-title col-lg-9\">
                    <p class=\"resumeProjet\">";
            if (strlen($reqProjet[$i]['resume_projet']) == 0) {
                echo "Aucun résume";
            } else {

                $resumeBDD = $reqProjet[$i]['resume_projet'];

                $choix = explode(";", $resumeBDD, -1);

                if ($_SESSION['lang'] == "fr"){
                    list($langue, $resumeSplit) = explode("§", $choix[0]);
                }
                else {
                    list($langue, $resumeSplit) = explode("§", $choix[1]);
                }

                echo "" . $resumeSplit . "";
            }

            echo "</p>
                </div>                 
              </div>
              <div class=\"card-footer text-center row\">"; ?>
            <?php

            $dateDebut = dateFormat($reqProjet[$i]['date_debut_projet'], $_SESSION['lang'] == 'fr');

            if (strlen($reqProjet[$i]['date_fin_projet']) == 0) {
                $dateFin = " ";
            } else {
                $dateFin = dateFormat($reqProjet[$i]['date_fin_projet'], $_SESSION['lang'] == 'fr');
                $dateFin = $q[$_SESSION['lang']]['index']['c'] . $dateFin;
            }

            ?>
            <?php
            echo "<p class=\"card-text col-lg-6\">
                    ". $q[$_SESSION['lang']]['index']['b']. "" . $dateDebut . " 
                        <br/> 
                     " . $dateFin . "</p>
                <a class=\"btn btn-primary col-lg-6\" href=\"" . $reqProjet[$i]['nom_projet'] . "/index.php\">".$q[$_SESSION['lang']]['index']['a']."</a>
              </div>
            </div>
            ";
        }
        ?>
    </section>
</main>
<?php

include_once 'index_pack/includes/footer.php';

?>
