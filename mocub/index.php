<?php
include_once "includes/header.php";

/*Pour afficher les actualites*/
$req = $bdd->prepare('SELECT tab1.titre_actualite, tab1.resume_actualite, tab1.date_actualite_debut, tab1.id_actualite, tab3.prenom_utilisateur, tab3.nom_utilisateur, tab3.mail_utilisateur
                                FROM ' . $nameprojetgeneral . '.actualite AS tab1 
                                JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 
                                ON  tab1.id_utilisateur_detail = tab2.id_utilisateur_detail 
                                JOIN commune.utilisateur AS tab3 
                                ON tab2.id_utilisateur = tab3.id_utilisateur 
                                ORDER BY tab1.date_actualite_debut DESC');
$req->execute();
$reqActu = $req->fetchAll();

//Requête préparer pour récuperer image/fichier liée à l'actualité
$reqMediaA = $bdd->prepare("SELECT m.id_media, type_media, source_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_actualite = :idActu AND m.type_media = 'image'");

/*Pour afficher les publications*/
$req = $bdd->prepare('SELECT tab1.titre_publication, tab1.information_publication, tab1.annee_publication, tab1.id_publication
                                FROM ' . $nameprojetgeneral . '.publication AS tab1 
                                ORDER BY tab1.annee_publication DESC');
$req->execute();
$reqPub = $req->fetchAll();


//Requête préparer pour récuperer image/fichier liée à l'actualité
$reqMediaP = $bdd->prepare("SELECT m.id_media, type_media, source_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_publication = :idPub AND m.type_media = 'image'");

/*Pour afficher les actualites*/
$req = $bdd->prepare('SELECT tab1.titre_these, tab1.resume_these, tab1.soutenant_these, tab1.annee_these, tab1.id_these, tab3.prenom_utilisateur, tab3.nom_utilisateur, tab3.mail_utilisateur
                                FROM ' . $nameprojetgeneral . '.these AS tab1 
                                JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 
                                ON tab1.id_utilisateur_detail = tab2.id_utilisateur_detail 
                                JOIN commune.utilisateur AS tab3 
                                ON tab2.id_utilisateur = tab3.id_utilisateur
                                ORDER BY tab1.annee_these DESC ');
$req->execute();
$reqThe = $req->fetchAll();

//Requête préparer pour récuperer image/fichier liée à l'actualité
$reqMediaT = $bdd->prepare("SELECT m.id_media, type_media, source_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_these = :idThese AND m.type_media = 'image'");

?>

<main class="pageAccueil col-lg-10">
    <?php include_once 'includes/title.php' ?>
    <section style="display: flex" class="content-container col-lg-12 row">
        <div class="col-lg-12">
            <h1><?php echo $q[$_SESSION['lang']]['index']['a'] ?></h1>
        </div>
        <div class="col-lg-12">
            <p>
                <?php echo $q[$_SESSION['lang']]['index']['b'] ?>
            </p>

            <p>
                <?php echo $q[$_SESSION['lang']]['index']['c'] ?>
            </p>
            <div class="flex-container-home">
                <ul>
                    <li>
                        <?php echo $q[$_SESSION['lang']]['index']['d'] ?>
                    </li>

                    <li>
                        <?php echo $q[$_SESSION['lang']]['index']['e'] ?>
                    </li>

                    <!--<li>
                        <?php echo $q[$_SESSION['lang']]['index']['f'] ?>
                    </li>-->
                </ul>
                <img class="img-home" src="media/image/MOCUB.png">
            </div>
            <p>
                <?php echo $q[$_SESSION['lang']]['index']['g'] ?>
            </p>
        </div>
    </section>
    <section class="content-container col-lg-12 row link-to-project">
        <div class="col-lg-8">
            <p class="text-center"> <?php echo $q[$_SESSION['lang']]['index']['h'] ?></p>
        </div>
        <div class="col-lg-4">
            <a href="actions.php"
               class="btn btn-primary btn-lg btn-block"> <?php echo $q[$_SESSION['lang']]['index']['i'] ?></a>
        </div>
    </section>
    <section class="caroussel-container content-container col-lg-12 row">
        <section class="col-lg-12">
            <div class="container">
                <div class="row blog">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php
                                if (sizeof($reqActu) == 0) {
                                    echo "<li hidden data-target=\"#blogCarousel\" data-slide-to=\"0\" class=\"active\"></li>";
                                } else {
                                    echo "<li data-target=\"#blogCarousel\" data-slide-to=\"0\" class=\"active\"></li>";
                                }

                                if (sizeof($reqPub) == 0) {
                                    echo "<li hidden data-target=\"#blogCarousel\" data-slide-to=\"1\"></li>";
                                } else {
                                    echo "<li data-target=\"#blogCarousel\" data-slide-to=\"1\"></li>";
                                }

                                if (sizeof($reqThe) == 0) {
                                    echo "<li hidden data-target=\"#blogCarousel\" data-slide-to=\"2\"></li>";
                                } else {
                                    echo "<li data-target=\"#blogCarousel\" data-slide-to=\"2\"></li>";
                                }
                                ?>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row card-deck justify-content-center row">
                                        <!--actualite-->
                                        <?php
                                        if (sizeof($reqActu) == 0) {
                                            echo " ";
                                        } else if (sizeof($reqActu) == 1) {
                                            //Récupère médias de l'actualité
                                            $reqMediaA->execute([':idActu' => $reqActu[0]['id_actualite']]);
                                            $img = $reqMediaA->fetch();

                                            echo " <div class=\"card col-lg-6\">";
                                            echo "<div class=\"card-header apt\">
                                                            " . $q[$_SESSION['lang']]['index']['n'] . "
                                                          </div> ";
                                            if (!empty($img)) {
                                                echo "<img class=\"card-img-top img-fluid\" src=\"media/image/" . $img['source_media'] . "\" />";
                                            } else {
                                                echo "<img class=\"card-img-top img-fluid\" src=\"media/image/default-thumb.png\" />";
                                            }

                                            echo " <div class=\"card-body\">
                                                            <h5 class=\"card-title\">" . $reqActu[0]['titre_actualite'] . "</h5>
                                                            <p class=\"card-text\">" . $reqActu[0]['resume_actualite'] . "</p>
                                                            <a href=\"actualite.php?actualite=" . $reqActu[0]['id_actualite'] . "\" class=\"btn btn-primary\">" . $q[$_SESSION['lang']]['index']['k'] . "</a>
                                                        </div>
                                                        <div class=\"card-footer\">
                                                        </div>
                                                    </div>";
                                        } else {
                                            for ($i = 0; $i < 2; $i++) {
                                                //Récupère médias de l'actualité
                                                $reqMediaA->execute([':idActu' => $reqActu[$i]['id_actualite']]);
                                                $img = $reqMediaA->fetch();

                                                echo " <div class=\"card col-lg-6\">";
                                                echo "<div class=\"card-header apt\">
                                                            " . $q[$_SESSION['lang']]['index']['n'] . "
                                                          </div> ";
                                                if (!empty($img)) {
                                                    echo "<img class=\"card-img-top img-fluid\" src=\"media/image/" . $img['source_media'] . "\" />";
                                                } else {
                                                    echo "<img class=\"card-img-top img-fluid\" src=\"media/image/default-thumb.png\" />";
                                                }

                                                echo " <div class=\"card-body\">
                                                            <h5 class=\"card-title\">" . $reqActu[$i]['titre_actualite'] . "</h5>
                                                            <p class=\"card-text\">" . $reqActu[$i]['resume_actualite'] . "</p>
                                                            <a href=\"actualite.php?actualite=" . $reqActu[$i]['id_actualite'] . "\" class=\"btn btn-primary\">" . $q[$_SESSION['lang']]['index']['k'] . "</a>
                                                        </div>
                                                        <div class=\"card-footer\">
                                                        </div>
                                                    </div>";
                                            }
                                        }

                                        ?>

                                    </div>

                                </div>
                                <div class="carousel-item">
                                    <div class="row card-deck justify-content-center row">
                                        <!--publication-->
                                        <?php

                                        if (sizeof($reqPub) == 0) {
                                            echo " ";
                                        } else if (sizeof($reqPub) == 1) {
                                            //Récupère médias de la publication
                                            $reqMediaP->execute([':idPub' => $reqPub[0]['id_publication']]);
                                            $img = $reqMediaP->fetch();
                                            echo " <div class=\"card col-lg-6\">";
                                            echo "<div class=\"card-header apt\">
                                                            " . $q[$_SESSION['lang']]['index']['o'] . "
                                                          </div> ";
                                            if (!empty($img)) {
                                                echo "<img class=\"card-img-top img-fluid\" src=\"media/image/" . $img['source_media'] . "\" />";
                                            } else {
                                                echo "<img class=\"card-img-top img-fluid\" src=\"media/image/default-thumb.png\" />";
                                            }

                                            echo " <div class=\"card-body\">
                                                            <h5 class=\"card-title\">" . $reqPub[0]['titre_publication'] . "</h5>
                                                            <p class=\"card-text\">" . $reqPub[0]['information_publication'] . "</p>
                                                            <a href=\"publication.php?publication=" . $reqPub[0]['id_publication'] . "\" class=\"btn btn-primary\">" . $q[$_SESSION['lang']]['index']['k'] . "</a>
                                                        </div>
                                                        <div class=\"card-footer\">
                                                        </div>
                                                    </div>";
                                        } else {
                                            for ($i = 0; $i < 2; $i++) {
                                                //Récupère médias de la publication
                                                $reqMediaP->execute([':idPub' => $reqPub[$i]['id_publication']]);
                                                $img = $reqMediaP->fetch();

                                                echo " <div class=\"card col-lg-6\">";

                                                echo "<div class=\"card-header apt\">
                                                            " . $q[$_SESSION['lang']]['index']['o'] . "
                                                          </div> ";
                                                if (!empty($img)) {
                                                    echo "<img class=\"card-img-top img-fluid\" src=\"media/image/" . $img['source_media'] . "\" />";
                                                } else {
                                                    echo "<img class=\"card-img-top img-fluid\" src=\"media/image/default-thumb.png\" />";
                                                }

                                                echo " <div class=\"card-body\">
                                                            <h5 class=\"card-title\">" . $reqPub[$i]['titre_publication'] . "</h5>
                                                            <p class=\"card-text\">" . $reqPub[$i]['information_publication'] . "</p>
                                                            <a href=\"publication.php?publication=" . $reqPub[$i]['id_publication'] . "\" class=\"btn btn-primary\">" . $q[$_SESSION['lang']]['index']['k'] . "</a>
                                                        </div>
                                                        <div class=\"card-footer\">
                                                        </div>
                                                    </div>";
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row card-deck justify-content-center row">
                                        <!--these-->
                                        <?php

                                        if (sizeof($reqThe) == 0) {
                                            echo " ";
                                        } else if (sizeof($reqThe) == 1) {
                                            //Récupère médias de la these
                                            $reqMediaT->execute([':idThese' => $reqThe[0]['id_these']]);
                                            $img = $reqMediaT->fetch();

                                            echo " <div class=\"card col-lg-6\">";
                                            echo "<div class=\"card-header apt\">
                                                          " . $q[$_SESSION['lang']]['index']['p'] . "
                                                          </div> ";
                                            if (!empty($img)) {
                                                echo "<img class=\"card-img-top img-fluid\" src=\"media/image/" . $img['source_media'] . "\" />";
                                            } else {
                                                echo "<img class=\"card-img-top img-fluid\" src=\"media/image/default-thumb.png\" />";
                                            }

                                            echo " <div class=\"card-body\">
                                                            <h5 class=\"card-title\">" . $reqThe[0]['titre_these'] . "</h5>
                                                            <p class=\"card-text\">" . $reqThe[0]['resume_these'] . "</p>
                                                            <a href=\"these.php?these=" . $reqThe[0]['id_these'] . "\" class=\"btn btn-primary\">" . $q[$_SESSION['lang']]['index']['k'] . "</a>
                                                        </div>
                                                        <div class=\"card-footer\">
                                                           " . $q[$_SESSION['lang']]['index']['q'] . "".$reqThe[$i]['soutenant_utilisateur']."
                                                        </div>
                                                    </div>";
                                        } else {
                                            for ($i = 0; $i < 2; $i++) {
                                                //Récupère médias de la these
                                                $reqMediaT->execute([':idThese' => $reqThe[$i]['id_these']]);
                                                $img = $reqMediaT->fetch();

                                                echo " <div class=\"card col-lg-6\">";
                                                echo "<div class=\"card-header apt\">
                                                            " . $q[$_SESSION['lang']]['index']['p'] . "
                                                          </div> ";
                                                if (!empty($img)) {
                                                    echo "<img class=\"card-img-top img-fluid\" src=\"media/image/" . $img['source_media'] . "\" />";
                                                } else {
                                                    echo "<img class=\"card-img-top img-fluid\" src=\"media/image/default-thumb.png\" />";
                                                }

                                                echo " <div class=\"card-body\">
                                                            <h5 class=\"card-title\">" . $reqThe[$i]['titre_these'] . "</h5>
                                                            <p class=\"card-text\">" . $reqThe[$i]['resume_these'] . "</p>
                                                            <a href=\"these.php?these=" . $reqThe[$i]['id_these'] . "\" class=\"btn btn-primary\">" . $q[$_SESSION['lang']]['index']['k'] . "</a>
                                                        </div>
                                                        <div class=\"card-footer\">
                                                            " . $q[$_SESSION['lang']]['index']['q'] . "".$reqThe[$i]['soutenant_these']."
                                                        </div>
                                                    </div>";
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>

<?php
include_once "includes/footer.php";
?>
