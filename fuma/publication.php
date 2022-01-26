<?php

include_once 'includes/header.php';

//Requête pour récupérer différents champs de la publication séléctionnée
$idPublication = $_GET['publication'];
$reqPubli = $bdd->prepare('SELECT titre_publication, auteur_publication, annee_publication, type_publication, information_publication, lien_publication, id_action 
FROM publication 
WHERE id_publication = :publication' );
$reqPubli->bindParam('publication', $idPublication, PDO::PARAM_INT);
$reqPubli->execute();
$publication = $reqPubli->fetch();

//Requête préparé pour récupérer nom et prénom de l'auteur
$reqAuteur = $bdd->prepare('SELECT cu.nom_utilisateur, cu.prenom_utilisateur 
FROM commune.utilisateur AS cu 
  JOIN '.$nameprojetgeneral.'.utilisateur_detail AS npgud ON cu.id_utilisateur = npgud.id_utilisateur 
  JOIN '.$nameprojetgeneral.'.publication AS npgp ON npgud.id_utilisateur_detail = npgp.id_utilisateur_detail 
WHERE id_publication = :idPubli');
$reqAuteur->execute([':idPubli' => $idPublication]);
$auteur =$reqAuteur->fetch();

//Requête pour récupérer les fichiers pdf/images/vidéos
$reqMedia = $bdd->prepare('SELECT m.id_media, type_media, source_media, nom_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_publication = :idPubli');
$reqMedia->execute([':idPubli' => $idPublication]);
$media = $reqMedia->fetchAll();
?>

<main class="col-lg-10 deletePub-btn">
    <?php include_once 'includes/title.php' ?>
    <section class="main_content content-container col-lg-12 row">
        <h2><?php echo $publication['titre_publication']?></h2>
        <?php
        $aPrenom= $auteur['prenom_utilisateur'];
        $aNom= $auteur['nom_utilisateur'];
        $req = $bdd->prepare('SELECT mail_utilisateur FROM commune.utilisateur WHERE nom_utilisateur=\''.$aNom.'\' AND prenom_utilisateur=\''.$aPrenom.'\' ');
        $req->execute();
        $util = $req->fetch();

        if (((isset($_SESSION['emailUser'])) && ($_SESSION['emailUser'] == $util['mail_utilisateur'])) || ($_SESSION['isAdmin'] == 1) || ($_SESSION['isSuperAdmin'] == 1)) {
            echo "<a class=\"btn btn-primary\" href=\"formPublication.php?publication=$idPublication\">".$q[$_SESSION['lang']]['publication']['i']."</a>
                        <form class=\"deletePub\" enctype=\"multipart/form-data\" method=\"post\">
                            <input name=\"idPub\" type=\"hidden\" value=\"$idPublication\">
                            <button type=\"submit\" class=\"btn btn-danger\">".$q[$_SESSION['lang']]['publication']['j']."</button>
                        </form>";
        } else {
            echo "";
        }
        ?>
        <?php echo "<p class=\"font-italic\">".$publication['type_publication'].", ".$publication['annee_publication']."</p>";
        echo "<p>".$q[$_SESSION['lang']]['publication']['a']." <strong>".$publication['auteur_publication']."</strong></p>"?>
        <h2><?php echo $q[$_SESSION['lang']]['publication']['h'] ?></h2>
        <p><?php echo $publication['information_publication']?></p>
        <section id="accordion" class="medias">
            <?php
            if (!empty($publication['lien_publication'])){

                echo "
                <div class=\"card\">
                    <div class=\"card-header\" id=\"headingOne\">
                        <h5 class=\"mb-0\">
                            <button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
                                ".$q[$_SESSION['lang']]['publication']['b']."
                            </button>
                        </h5>
                    </div>
                    <div id=\"collapseOne\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#accordion\">
                        <div class=\"card-body cardMedia\">
                            <p class=\"text-center\">".$q[$_SESSION['lang']]['publication']['c']." </p>
                            <a href=\"".$publication['lien_publication']."\">
                            <i class=\"fas fa-info-circle\"></i></a>
                        </div>
                    </div>
                </div>";
            }
            ?>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <?php echo $q[$_SESSION['lang']]['publication']['d'] ?>
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body cardMedia">
                        <?php

                        //Compteur temporaire. Si aucun média n'est lié à l'actu on retourne un message.
                        $cpt = 0;

                        //Pour chaque media lié à cette publication
                        foreach ($media as $value){

                            //Si son type correspond à X --> affichage l'objet
                            if ($value['type_media'] == 'image'){
                                echo "
                                    <figure class='figure'>
                                        <img class=\"figure-img rounded\" src=\"media/image/".$value['source_media']."\"/>
                                        <figcaption class='figure-caption text-center'></figcaption>
                                    </figure>";
                                $cpt += 1;
                            }
                        }

                        if ($cpt == 0){
                            echo $q[$_SESSION['lang']]['publication']['d-1'];
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <?php echo $q[$_SESSION['lang']]['publication']['e']?>
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body cardMedia">
                        <?php
                        //Idem pour les vidéos
                        $cpt = 0;
                        foreach ($media as $value){
                            if ($value['type_media'] == 'video'){
                                echo "
                                    <figure class='figure'>
                                        <video class='rounded' controls src=\"media/video/".$value['source_media']."\"></video>
                                        <figcaption class='figure-caption text-center'>Test</figcaption>
                                    </figure>";
                                $cpt += 1;
                            }
                        }

                        if ($cpt == 0){
                            echo $q[$_SESSION['lang']]['publication']['e-1'];
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <?php echo $q[$_SESSION['lang']]['publication']['f'] ?>
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
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
                            echo $q[$_SESSION['lang']]['publication']['f-1'];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <p class="date"><?php echo $q[$_SESSION['lang']]['publication']['g']." ".$auteur['prenom_utilisateur']." ".$auteur['nom_utilisateur'] ?> </p>
    </section>
</main>
<?php
include_once 'includes/footer.php'
?>
