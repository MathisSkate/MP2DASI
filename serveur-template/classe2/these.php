<?php

include_once 'includes/header.php';

//Requête pour récupérer différents champs de la thèse séléctionnée
$idThese = $_GET['these'];
$reqThese = $bdd->prepare('SELECT titre_these, annee_these, soutenant_these, specialite_these, jury_these, resume_these, lien_these, id_action 
FROM these 
WHERE id_these = :these' );
$reqThese->bindParam('these', $idThese, PDO::PARAM_INT);
$reqThese->execute();
$these = $reqThese->fetch();

//Requête préparé pour récupérer nom et prénom de l'auteur
$reqAuteur = $bdd->prepare('SELECT cu.nom_utilisateur, cu.prenom_utilisateur 
FROM commune.utilisateur AS cu 
  JOIN '.$nameprojetgeneral.'.utilisateur_detail AS npgud ON cu.id_utilisateur = npgud.id_utilisateur 
  JOIN '.$nameprojetgeneral.'.these AS npgt ON npgud.id_utilisateur_detail = npgt.id_utilisateur_detail 
WHERE id_these = :idThese');
$reqAuteur->execute([':idThese' => $idThese]);
$auteur =$reqAuteur->fetch();

//Requête pour récupérer les fichiers pdf/images/vidéos
$reqMedia = $bdd->prepare('SELECT m.id_media, type_media, source_media, nom_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_these = :idThese');
$reqMedia->execute([':idThese' => $idThese]);
$media = $reqMedia->fetchAll();
?>

    <main class="col-lg-10 deleteThese-btn">
        <?php include_once 'includes/title.php' ?>
        <section class="main_content content-container col-lg-12 row">
            <h2><?php echo $these['titre_these']?></h2>
            <?php
            $aPrenom= $auteur['prenom_utilisateur'];
            $aNom= $auteur['nom_utilisateur'];
            $req = $bdd->prepare('SELECT mail_utilisateur FROM commune.utilisateur WHERE nom_utilisateur=\''.$aNom.'\' AND prenom_utilisateur=\''.$aPrenom.'\' ');
            $req->execute();
            $util = $req->fetch();

            if (((isset($_SESSION['emailUser'])) && ($_SESSION['emailUser'] == $util['mail_utilisateur'])) || ($_SESSION['isAdmin'] == 1) || ($_SESSION['isSuperAdmin'] == 1)) {
                echo "<a class=\"btn btn-primary\" href=\"formThese.php?these=$idThese\">".$q[$_SESSION['lang']]['these']['m']."</a>
                        <form class=\"deleteThese\" enctype=\"multipart/form-data\" method=\"post\">
                            <input name=\"idThese\" type=\"hidden\" value=\"$idThese\">
                            <button type=\"submit\" class=\"btn btn-danger col-lg-12\">".$q[$_SESSION['lang']]['these']['n']."</button>
                        </form>";
            } else {
                echo "";
            }
            ?>
            <?php

            $date = dateFormat($these['annee_these'], $_SESSION['lang'] == 'fr');

            echo "
                  <p> <strong>".$these['soutenant_these']."</strong> ".$q[$_SESSION['lang']]['these']['a']." <span class=\"font-italic\">".$date."</span></p>
                  <h4>".$q[$_SESSION['lang']]['these']['b']."</h4>
                  <p>".$these['specialite_these']."</p>
                  <h4>".$q[$_SESSION['lang']]['these']['c']."</h4>
                  <p> ".$these['jury_these']."</p>"?>
            <h4><?php echo $q[$_SESSION['lang']]['these']['o']?></h4>
            <p><?php echo $these['resume_these'] ?></p>

            <section id="accordion" class="medias">
                <?php
                if (!empty($these['lien_these'])){

                    echo "
                        <div class=\"card\">
                            <div class=\"card-header\">
                                <h5 class=\"mb-0\">
                                    <button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
                                        ".$q[$_SESSION['lang']]['these']['d']."
                                    </button>
                                </h5>
                            </div>
                            <div id=\"collapseOne\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#accordion\">
                            <div class=\"card-body cardMedia\">
                                <p class=\"text-center\">".$q[$_SESSION['lang']]['these']['e']." </p>
                                <a href=\"".$these['lien_these']."\">
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
                                <?php echo $q[$_SESSION['lang']]['these']['f'] ?>
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
                                echo $q[$_SESSION['lang']]['these']['g'];
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <?php echo $q[$_SESSION['lang']]['these']['h'] ?>
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
                                echo $q[$_SESSION['lang']]['these']['i'];
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <?php echo $q[$_SESSION['lang']]['these']['j'] ?>
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
                                echo $q[$_SESSION['lang']]['these']['k'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
<?php
include_once 'includes/footer.php'
?>
