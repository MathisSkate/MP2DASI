<?php

include_once "includes/header.php";
require_once "functions/selectMedia.php";

//Requête pour récupérer les différents types d'actualités possible
$reqTypePub = $bdd->query("SHOW COLUMNS FROM publication");
$tablePub = $reqTypePub->fetchAll();
$enumType = substr($tablePub[3]['Type'], 6, -2);
$types = explode("','", $enumType);

//Récupérer le nom de la page précédente
$lastPage = basename($_SERVER['HTTP_REFERER']);
$modif = false;

//Pour différencier Ajout ou Modif
if ($lastPage != "publications.php") {
    //Récupère le numéro(id) après "publication.php?publication="
    $idPub = substr($lastPage, 28);
    $modif = true;

    //Rquête pour récupéré informations sur actualite si modif
    $reqPub = $bdd->prepare("SELECT titre_publication, annee_publication, type_publication, auteur_publication, information_publication, lien_publication, id_action FROM publication WHERE id_publication = " . $idPub . " ");
    $reqPub->execute();
    $publication = $reqPub->fetch();

    //Requête pour récupéré média si modif
    $images = selectMedia($bdd, 'publication', $idPub, 'image');
    $videos = selectMedia($bdd, 'publication', $idPub, 'video');
    $fichiers = selectMedia($bdd, 'publication', $idPub, 'pdf');
}

?>
    <main class="col-lg-10 froalaTextarea <?php if ($modif) {
        echo "modifPub-btn";
    } else echo "ajoutPub-btn"; ?>">
        <?php include_once 'includes/title.php' ?>
        <section id="form_pub">
            <form enctype="multipart/form-data" method="post">
                <?php
                if ($modif) {
                    echo "<input name='idPubli' type='hidden' value='" . $idPub . "'>";
                }
                ?>
                <div class="form-group">
                    <label><?php echo $q[$_SESSION['lang']]['formPublication']['a'] ?></label>
                    <input type="text" class="form-control" name="titrePublication" placeholder="Titre publication"
                           value="<?php if ($modif) {
                               echo $publication['titre_publication'];
                           } ?>" required>
                </div>
                <div class="form-group">
                    <label><?php echo $q[$_SESSION['lang']]['formActualite']['c']?></label>
                    <select class="form-control type-select" name="typePublication" required>
                        <option class="type" selected>
                            <?php
                            if ($modif) {
                                echo $publication['type_publication'];
                            } else {
                                echo $q[$_SESSION['lang']]['formPublication']['d'];
                            }
                            ?>
                        </option>
                        <?php

                        foreach ($types as $type){
                            if ($type == $actualite['type_publication']){
                                echo "";
                            }
                            else
                            {
                                echo "<option value='".$type."'>".$type."</option>";
                            }
                        }?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo $q[$_SESSION['lang']]['formPublication']['e'] ?></label>
                    <select class="form-control" name="actionPublication" required>
                        <option selected>
                            <?php
                            echo $q[$_SESSION['lang']]['formPublication']['d'];
                            ?>
                        </option>
                        <?php
                        /*Pour afficher les actions*/
                        $req = $bdd->prepare('SELECT id_action, nom_action from ' . $nameprojetgeneral . '.action');
                        $req->execute();
                        $reqAct = $req->fetchAll();

                        for ($i = 0; $i < sizeof($reqAct); $i++) {
                            echo "<option value='" . $reqAct[$i]['id_action'] . "'>" . $reqAct[$i]['nom_action'] . "</option>";
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo $q[$_SESSION['lang']]['formPublication']['p'] ?></label>
                    <input type="text" maxlength="4" name="datePublication" id="datePublication"
                           class="form-control" placeholder="Année de la publication" value="<?php if ($modif) {
                        echo $publication['annee_publication'];
                    } ?>" required>
                </div>
                <div class="form-group">
                    <label><?php echo $q[$_SESSION['lang']]['formPublication']['f'] ?></label>
                    <input type="text" class="form-control" name="auteurPublication"
                           placeholder="Nom des auteurs de la publication(ex : Nom P)" maxlength="500"
                           value="<?php if ($modif) {
                               echo $publication['auteur_publication'];
                           } ?>" required>
                </div>
                <div class="form-group">
                    <label><?php echo $q[$_SESSION['lang']]['formPublication']['g'] ?></label>
                    <input type="text" class="form-control" name="informationPublication"
                           placeholder="Bref information sur la publication" value="<?php if ($modif) {
                        echo $publication['information_publication'];
                    } ?>">
                </div>
                <div class="form-group">
                    <label><?php echo $q[$_SESSION['lang']]['formPublication']['h'] ?></label>
                    <input type="url" class="form-control" name="lienPublication"
                           placeholder="Lien vers la publication : http:// ou https://" maxlength="500"
                           value="<?php if ($modif) {
                               echo $publication['lien_publication'];
                           } ?>">
                </div>
                <h3><?php echo $q[$_SESSION['lang']]['formPublication']['i'] ?></h3>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input multiple type="file" accept="image/png, image/jpeg" class="custom-file-input" name="images[]"
                               id="images">
                        <label class="custom-file-label font-weight-light"
                               for="images"><?php echo $q[$_SESSION['lang']]['formPublication']['j'] ?></label>
                    </div>
                </div>
                <div class="mediasFormActu">
                    <?php
                    if (!empty($images)) {
                        foreach ($images as $image) {
                            echo "<div class='imageFormActu'><img src='media/image/" . $image['source_media'] . "' class='img-thumbnail deleteMedia'>";
                            echo "<button id='" . $image['id_media'] . "' class='mediasDelete btn btn-danger'>" . $q[$_SESSION['lang']]['formPublication']['q'] . "</button></div>";
                        }
                    }
                    ?>
                </div>
                <h3><?php echo $q[$_SESSION['lang']]['formPublication']['k'] ?></h3>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input multiple type="file" accept="video/*" class="custom-file-input" name="videos[]">
                        <label class="custom-file-label font-weight-light"><?php echo $q[$_SESSION['lang']]['formPublication']['l'] ?></label>
                    </div>
                </div>
                <div class="mediasFormActu">
                    <?php
                    if (!empty($videos)) {
                        foreach ($videos as $video) {
                            echo "<div class='imageFormActu'>
                              <video src='media/video/" . $video['source_media'] . "' class='img-thumbnail deleteMedia'></video>
                              <button id='" . $video['id_media'] . "' class='mediasDelete btn btn-danger'>" . $q[$_SESSION['lang']]['formPublication']['q'] . "</button></div>";
                        }
                    }
                    ?>
                </div>
                <h3><?php echo $q[$_SESSION['lang']]['formPublication']['m'] ?></h3>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input multiple type="file" accept="application/pdf" class="custom-file-input" name="fichiers[]">
                        <label class="custom-file-label font-weight-light"><?php echo $q[$_SESSION['lang']]['formPublication']['n'] ?></label>
                    </div>
                </div>
                <div class="mediasFormActu">
                    <?php
                    if (!empty($fichiers)) {
                        foreach ($fichiers as $fichier) {
                            echo "<div class='mediaForm'>
                                <a class='' href=\"media/pdf/" . $fichier['source_media'] . "\" target='_blank'>
                                                <img class='figure-img rounded ' src=\"media/icon/pdf.png\">
                                            </a>
                              <button id='" . $fichier['id_media'] . "' class='mediasDelete btn btn-danger'>" . $q[$_SESSION['lang']]['formPublication']['q'] . "</button></div>";
                        }
                    }
                    ?>
                </div>
                <button type="submit"
                        class="btn btn-primary"><?php echo $q[$_SESSION['lang']]['formPublication']['o'] ?></button>
            </form>
        </section>
    </main>

<?php include_once 'includes/footer.php' ?>