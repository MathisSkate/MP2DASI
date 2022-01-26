<?php
/**
 * Created by PhpStorm.
 * User: doria
 * Date: 11/02/2019
 * Time: 14:15
 */

include_once 'includes/header.php';

//Requête pour récupérer différents champs de l'actualité séléctionné
$idActualite = $_GET['actualite'];
$reqActu = $bdd->prepare('SELECT titre_actualite, description_actualite, date_actualite FROM actualite WHERE id_actualite = :actualite' );
$reqActu->bindParam('actualite', $idActualite, PDO::PARAM_INT);
$reqActu->execute();
$actualite = $reqActu->fetch();

//Requête préparé pour récupérer nom et prénom de l'auteur
$reqAuteur = $bdd->prepare('SELECT cu.nom_utilisateur, cu.prenom_utilisateur 
FROM commune.utilisateur AS cu 
  JOIN '.$nameprojetgeneral.'.utilisateur_detail AS npgud ON cu.id_utilisateur = npgud.id_utilisateur 
  JOIN '.$nameprojetgeneral.'.actualite AS npga ON npgud.id_utilisateur_detail = npga.id_utilisateur_detail 
WHERE id_actualite = :idActu');
$reqAuteur->execute([':idActu' => $idActualite]);
$auteur =$reqAuteur->fetch();

//Requête pour récupérer les fichiers pdf/images/videos
$reqMedia = $bdd->prepare('SELECT m.id_media, type_media, source_media, nom_media FROM media AS m 
JOIN illustrer AS i ON m.id_media = i.id_media
WHERE i.id_actualite = :idActu');
$reqMedia->execute([':idActu' => $idActualite]);
$media = $reqMedia->fetchAll();


?>
    <main class="main-content col-lg-10 deleteActu-btn">
        <?php include_once 'includes/title.php' ?>
        <section id="" class="main_content content-container col-lg-12 row">
            <h2><?php echo $actualite['titre_actualite']?></h2>
            <?php
            $aPrenom= $auteur['prenom_utilisateur'];
            $aNom= $auteur['nom_utilisateur'];
            $req = $bdd->prepare('SELECT mail_utilisateur FROM commune.utilisateur WHERE nom_utilisateur=\''.$aNom.'\' AND prenom_utilisateur=\''.$aPrenom.'\' ');
            $req->execute();
            $util = $req->fetch();
            if (((isset($_SESSION['emailUser'])) && ($_SESSION['emailUser'] == $util['mail_utilisateur'])) || (isset($_SESSION['emailUser']) && ($_SESSION['isAdmin']))) {
                echo "<a class=\"btn btn-primary\" href=\"formActualite.php?actualite=$idActualite\">".$q[$_SESSION['lang']]['actualite']['a']."</a>
                        <form class=\"deleteActu\" enctype=\"multipart/form-data\" method=\"post\">
                            <input name=\"idActu\" type=\"hidden\" value=\"$idActualite\">
                            <button type=\"submit\" class=\"btn btn-danger\">".$q[$_SESSION['lang']]['actualite']['b']."</button>
                        </form>";
            } else {
                echo "";
            }
            ?>

            <section class="description"><?php echo $actualite['description_actualite']?></section>
            <section id="accordion" class="medias">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <?php echo $q[$_SESSION['lang']]['actualite']['c']?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body cardMedia">
                            <?php

                            //Compteur temporaire. Si aucun média n'est lié à l'actu on retourne un message.
                            $cpt = 0;$cpt = 0;

                            //Pour chaque media lié à cette actualité
                            foreach ($media as $value){

                                //Si son type correspond à X --> affichage l'objet
                                if ($value['type_media'] == 'image'){
                                    echo "
                                    <figure class='figure'>
                                        <img class=\"figure-img rounded\" src=\"media/image/".$value['source_media']."\"/>
                                        <figcaption class='figure-caption text-center'>".$value['nom_media']."</figcaption>
                                    </figure>";
                                    $cpt += 1;
                                }
                            }

                            if ($cpt == 0){
                                echo $q[$_SESSION['lang']]['actualite']['d'];
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <?php echo $q[$_SESSION['lang']]['actualite']['e'] ?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body cardMedia">
                            <?php
                            //Idem pour les vidéos
                            $cpt = 0;
                            foreach ($media as $value){
                                if ($value['type_media'] == 'video'){
                                    echo "
                                    <figure class='figure'>
                                        <video class='rounded' controls src=\"media/video/".$value['source_media']."\"></video>
                                        <figcaption class='figure-caption text-center'>".$value['nom_media']."</figcaption>
                                    </figure>";
                                    $cpt += 1;
                                }
                            }

                            if ($cpt == 0){
                                echo $q[$_SESSION['lang']]['actualite']['f'];
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <?php echo $q[$_SESSION['lang']]['actualite']['g']?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
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
                                echo $q[$_SESSION['lang']]['actualite']['h'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <p class="date"><?php echo $q[$_SESSION['lang']]['actualite']['i']." ". $actualite['date_actualite']." ".$q[$_SESSION['lang']]['actualite']['j']." ". $auteur['prenom_utilisateur']." ".$auteur['nom_utilisateur'] ?> </p>
        </section>
    </main>
<?php
include_once 'includes/footer.php'
?>
