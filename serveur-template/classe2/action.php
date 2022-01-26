<?php
include_once "includes/header.php";

/*Pour afficher les actions*/
$action = $_GET['action'];
$req = $bdd->prepare('SELECT tab1.id_action, tab1.nom_action, tab1.media_action, tab2.nom_sous_action FROM ' . $nameprojetgeneral . '.action AS tab1 JOIN ' . $nameprojetgeneral . '.sous_action AS tab2 ON tab1.id_action = tab2.id_action WHERE tab1.id_action = :action');
$req->bindParam(':action', $action, PDO::PARAM_INT);
$req->execute();
$reqAct = $req->fetchAll();

/*Pour afficher les personnes en lien avec l'action*/
$req = $bdd->prepare('SELECT tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.mail_utilisateur, tab3.id_action FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur JOIN ' . $nameprojetgeneral . '.participer AS tab3 ON tab2.id_utilisateur_detail = tab3.id_utilisateur_detail JOIN ' . $nameprojetgeneral . '.action AS tab4 ON tab3.id_action = tab4.id_action WHERE tab3.id_action = :action ORDER by tab1.nom_utilisateur');
$req->bindParam(':action', $action, PDO::PARAM_INT);
$req->execute();
$reqUtil = $req->fetchAll();

/*Pour afficher la liste des publications*/
$req = $bdd->prepare('SELECT tab3.id_publication,tab3.titre_publication FROM ' . $nameprojetgeneral . '.publication AS tab3 WHERE tab3.id_action = :action');
$req->bindParam(':action', $action, PDO::PARAM_INT);
$req->execute();
$reqPub = $req->fetchAll();

/*Pour afficher la liste des thèses*/
$req = $bdd->prepare('SELECT tab3.id_these, tab3.titre_these FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur JOIN ' . $nameprojetgeneral . '.these AS tab3 ON tab2.id_utilisateur_detail = tab3.id_utilisateur_detail WHERE tab3.id_action = :action');
$req->bindParam(':action', $action, PDO::PARAM_INT);
$req->execute();
$reqThe = $req->fetchAll();

//Requête pour récupérer les fichiers pdf/images/videos
$reqMedia = $bdd->prepare('SELECT m.id_media, type_media, source_media, nom_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_action = :idActi order by nom_media');
$reqMedia->execute([':idActi' => $action]);
$media = $reqMedia->fetchAll();
?>
<main class="col-lg-10">
    <?php include_once 'includes/title.php' ?>
    <section class="content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2><?php echo $q['fr']['action']['a'] . " " . ($reqAct[0]['id_action']); ?>&nbsp;</h2>
        </div>
        <div class="col-lg-12">
            <h3> <?php echo($reqAct[0]['nom_action']); ?> </h3>
        </div>
        <section class="content-container <?php if (strlen($reqAct[0]['media_action']) == 0) {
            echo "col-lg-12";
        } else {
            echo "col-lg-7";
        } ?> row">
            <div class="col-lg-12">
                <?php
                for ($i = 0; $i < sizeof($reqAct); $i++) {
                    if (isset($reqAct[0]['nom_sous_action'])) {
                        $num_saction = $i + 1;
                        echo "<p class=\"presSousAction\">
                  " . $reqAct[$i]['id_action'] . " " . $num_saction . " " . $reqAct[$i]['nom_sous_action'] . "
                     </p>";
                    } else {
                        echo "<p>" . $q[$_SESSION['lang']]['action']['b'] . " </p>";
                    }
                }
                ?>
            </div>
            <div class="col-lg-12">
                <p class="presParticipant">
                    <?php echo $q['fr']['action']['l'] ?>
                    <?php
                    if (sizeof($reqUtil) == 0) {
                        echo $q[$_SESSION['lang']]['action']['m'];
                    } else {

                        for ($i = 0; $i < sizeof($reqUtil); $i++) {

                            if ($i == sizeof($reqUtil) - 1) {
                                echo "<span class=\"presSousAction\">
                    <a href=\"profil.php?mail=" . $reqUtil[$i]['mail_utilisateur'] . "\">" . $reqUtil[$i]['prenom_utilisateur'] . " " . $reqUtil[$i]['nom_utilisateur'] . "</a>
                     </span>";
                            } else {
                                echo "<span class=\"presSousAction\">
                    <a href=\"profil.php?mail=" . $reqUtil[$i]['mail_utilisateur'] . "\">" . $reqUtil[$i]['prenom_utilisateur'] . " " . $reqUtil[$i]['nom_utilisateur'] . "</a>,
                     </span>";
                            }
                        }
                    }

                    ?>
                </p>
            </div>
        </section>

        <?php

        if (strlen($reqAct[0]['media_action']) == 0) {
            echo "";
        } else {
            echo "<section style=\"margin-bottom: 4%;\" class=\"caroussel-container content-container col-lg-5 row\">";

            $lien = $reqAct[0]['media_action'];

            $media = explode(";", $lien, -1);

            echo "<section class=\"col-lg-12\">
                <div class=\"container\">
                    <div class=\"row blog\">
                        <div class=\"col-md-12\">
                            <div id=\"blogCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
                                <ol class=\"carousel-indicators\">";

            for ($i = 0; $i < sizeof($media); $i++) {
                echo "<li data-target=\"#blogCarousel\" data-slide-to=\"$i\" class=\"test\"";
                if ($i == 0) {
                    echo " class=\"active\" ";
                }

                echo "></li>";
            }
            echo "</ol>
                                <div class=\"carousel-inner\">";

            for ($i = 0; $i < sizeof($media); $i++) {
                echo "<div class=\"carousel-item";
                if ($i == 0) {
                    echo " active ";
                }
                echo "\">";
                echo "<div id=\"myCarousel\" class=\"row\">";
                echo "<section class=\"content-container col-lg-12 row\">
                                                <object width=\"425\" height=\"355\">
                                                    <param name=\"movie\" value=\"" . $media[$i] . " \"></param>
                                                    <param name=\"wmode\" value=\"transparent\"></param>
                                                    <embed src=\"" . $media[$i] . "\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"425\" height=\"355\"></embed>
                                                </object>
                                            </section>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>";

        }
        ?>

        <section class="container-fluid col-lg-12">
            <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo1">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                           aria-expanded="false" aria-controls="collapseTwo1">
                            <h5 class="mb-0">
                                <?php echo $q[$_SESSION['lang']]['action']['c'] . " " . ($reqAct[0]['id_action']); ?> <i
                                        class="fas fa-angle-down rotate-icon"></i>
                            </h5>
                        </a>
                    </div>
                    <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
                         data-parent="#accordionEx1">
                        <div class="card-body">
                            <?php
                            if (sizeof($reqPub) == 0) {
                                echo $q[$_SESSION['lang']]['action']['n'] . " " . $reqAct[0]['id_action'] . "";
                            } else {
                                if (sizeof($reqPub) == 1) {
                                    echo "<p>" . $q[$_SESSION['lang']]['action']['d'] . " " . $reqAct[0]['id_action'] . " " . $q[$_SESSION['lang']]['action']['e'] . " " . sizeof($reqPub) . " " . $q[$_SESSION['lang']]['action']['f'] . "</p>";
                                } else {
                                    echo "<p>" . $q[$_SESSION['lang']]['action']['d'] . " " . $reqAct[0]['id_action'] . " " . $q[$_SESSION['lang']]['action']['e'] . " " . sizeof($reqPub) . " " . $q[$_SESSION['lang']]['action']['g'] . "</p>";
                                }
                                for ($i = 0; $i < sizeof($reqPub); $i++) {
                                    echo "<p><a href=\"publication.php?publication=" . $reqPub[$i]['id_publication'] . "\">" . $reqPub[$i]['titre_publication'] . "</a></p>";
                                }
                            }

                            ?>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo2">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
                           aria-expanded="false" aria-controls="collapseTwo21">
                            <h5 class="mb-0">
                                <?php echo $q[$_SESSION['lang']]['action']['h'] . " " . ($reqAct[0]['id_action']); ?> <i
                                        class="fas fa-angle-down rotate-icon"></i>
                            </h5>
                        </a>
                    </div>
                    <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21"
                         data-parent="#accordionEx1">
                        <div class="card-body">
                            <?php
                            if (sizeof($reqThe) == 0) {
                                echo $q[$_SESSION['lang']]['action']['o'] . " " . $reqAct[0]['id_action'] . "";
                            } else {
                                if (sizeof($reqThe) == 1) {
                                    echo "<p>" . $q[$_SESSION['lang']]['action']['d'] . " " . $reqAct[0]['id_action'] . " " . $q[$_SESSION['lang']]['action']['e'] . " " . sizeof($reqThe) . " " . $q[$_SESSION['lang']]['action']['i'] . "</p>";
                                } else {
                                    echo "<p>" . $q[$_SESSION['lang']]['action']['d'] . " " . $reqAct[0]['id_action'] . " " . $q[$_SESSION['lang']]['action']['e'] . " " . sizeof($reqThe) . " " . $q[$_SESSION['lang']]['action']['j'] . "</p>";
                                }
                                for ($i = 0; $i < sizeof($reqThe); $i++) {
                                    echo "<p><a href=\"these.php?these=" . $reqThe[$i]['id_these'] . "\">" . $reqThe[$i]['titre_these'] . "</a></p>";
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo2">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo31"
                           aria-expanded="false" aria-controls="collapseTwo31">
                            <h5 class="mb-0">
                                <?php echo $q[$_SESSION['lang']]['action']['p'] . " " . ($reqAct[0]['id_action']); ?> <i class="fas fa-angle-down rotate-icon"></i>
                            </h5>
                        </a>
                    </div>
                    <div id="collapseTwo31" class="collapse" aria-labelledby="collapseTwo31" data-parent="#accordionEx1">
                        <div class="card-body cardMedia">
                            <?php
                            //Idem pour les fichiers PDF
                            $cpt = 0;
                            foreach ($media as $value){
                                if ($value['type_media'] == 'pdf'){
                                    echo "
                                        <figure id='icon-pdf' class='figure'>
                                            <a class='' href=\"media/pdf/".$value['source_media']."\" target='_blank'>
						<i style=\"font-size:100px;\" class=\"fas fa-file-pdf\"></i>
                                            </a>
                                            <figcaption class='figure-caption text-center'>".$value['nom_media']."</figcaption>
                                        </figure>";
                                    $cpt += 1;
                                }
                            }
                            if ($cpt == 0){
                                echo $q[$_SESSION['lang']]['action']['q'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        if (isset($_SESSION['emailUser']) && $_SESSION['isAdmin'] == 1) {
            echo "<a class=\"btn btn-success\" href=\"modifaction.php?action=" . $reqAct[0]['id_action'] . "\">" . $q[$_SESSION['lang']]['action']['k'] . "</a>";
        } else {
            echo "";
        }
        ?>

    </section>
</main>
<?php
include_once "includes/footer.php";
?>
