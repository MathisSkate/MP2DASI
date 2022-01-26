<?php

include_once "includes/header.php";
require_once "functions/selectMedia.php";

//Récupérer le nom de la page précédente
$lastPage = basename($_SERVER['HTTP_REFERER']);
$modif = false;

//Pour différencier Ajout ou Modif
if ($lastPage != "theses.php") {
    //Récupère le numéro(id) après "these.php?these="
    $idThese = substr($lastPage, 16);
    $modif = true;

    //Rquête pour récupéré informations sur actualite si modif
    $reqThese = $bdd->prepare("SELECT titre_these, annee_these, soutenant_these, specialite_these, jury_these, resume_these, lien_these, id_utilisateur_detail, id_action FROM these WHERE id_these = " . $idThese . " ");
    $reqThese->execute();
    $these = $reqThese->fetch();

    //Requête pour récupéré média si modif
    $images = selectMedia($bdd, 'these', $idThese, 'image');
    $videos = selectMedia($bdd, 'these', $idThese, 'video');
    $fichiers = selectMedia($bdd, 'these', $idThese, 'pdf');
}

?>
<main class="col-lg-10 <?php if ($modif){echo "modifThese-btn";} else echo "ajoutThese-btn";?>">
    <?php include_once 'includes/title.php'?>
    <section id="form_pub">
        <form enctype="multipart/form-data" method="post">
            <?php
            if ($modif){
                echo "<input name='idThese' type='hidden' value='".$idThese."'>";
            }
            ?>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['a']?></label>
                <input type="text" class="form-control" name="titreThese" placeholder="Titre these" maxlength="255" value="<?php if ($modif){echo $these['titre_these'];}?>" required>
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['q']?></label>
                <input type="date" name="dateThese" id="dateThese"
                       class="form-control" placeholder="Date de la these" value="<?php if ($modif){echo $these['annee_these'];}?>" required>
            </div>
            <!--<div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['b']?></label>
                <input type="text" class="form-control" name="soutenantThese" placeholder="Soutenant these" maxlength="255" value="<?php if ($modif){echo $these['soutenant_these'];}?>" required>
            </div>-->
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['b']?></label>
                <select class="action-select form-control" name="soutenantThese" required>
                    <?php
                    /*Pour afficher les noms des utlisateurs*/
                        $req = $bdd->prepare(' 
                        SELECT
                            tab1.prenom_utilisateur,
                            tab1.nom_utilisateur,
                            tab2.id_utilisateur_detail
                        FROM
                            commune.utilisateur AS tab1
                        JOIN utilisateur_detail AS tab2
                        ON
                            tab1.id_utilisateur = tab2.id_utilisateur
                        ORDER BY
                            tab1.nom_utilisateur ASC');
                    $req->execute();
                    $reqUtiDet = $req->fetchAll();

                    if ($modif) {
                        for ($i = 0; $i < sizeof($reqUtiDet); $i++) {
                            echo "<option ";
                            if ($these['id_utilisateur_detail'] == $reqUtiDet[$i]['id_utilisateur_detail']) {
                                echo " selected ";
                            }
                            echo " value='".$reqUtiDet[$i]['nom_utilisateur']." ".$reqUtiDet[$i]['prenom_utilisateur']."'>".$reqUtiDet[$i]['nom_utilisateur']." ".$reqUtiDet[$i]['prenom_utilisateur']."</option>";
                        }
                    } else {
                        echo "<option selected>  
                            " . $q[$_SESSION['lang']]['formThese']['h'] . "
                        </option>";
                        for ($i = 0; $i < sizeof($reqUtiDet); $i++) {
                            echo "<option value='".$reqUtiDet[$i]['nom_utilisateur']." ".$reqUtiDet[$i]['prenom_utilisateur']."'>".$reqUtiDet[$i]['nom_utilisateur']." ".$reqUtiDet[$i]['prenom_utilisateur']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['c']?></label>
                <input type="text" class="form-control" name="speThese" placeholder="Specialite these" maxlength="255" value="<?php if ($modif){echo $these['specialite_these'];}?>" >
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['d']?></label>
                <textarea class="form-control" name="juryThese" id="editor" placeholder="Jury these" maxlength="2000" value="<?php if ($modif){echo $these['jury_these'];}?>" ><?php if ($modif){echo $these['jury_these'];}?></textarea>
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['e']?></label>
                <input type="text" class="form-control" name="resumeThese" placeholder="Resume these" value="<?php if ($modif){echo $these['resume_these'];}?>" >
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['f']?></label>
                <input type="url" class="form-control" name="lienThese" placeholder="Lien vers la these : http:// ou https://" maxlength="500" value="<?php if ($modif){echo $these['lien_these'];}?>" >
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formThese']['g']?></label>
                <select class="action-select form-control" name="actionThese" required>
                    <?php
                    /*Pour afficher les actions*/
                    $req = $bdd->prepare('SELECT id_action, nom_action from ' . $nameprojetgeneral . '.action');
                    $req->execute();
                    $reqAct = $req->fetchAll();

                    if ($modif) {
                        for ($i = 0; $i < sizeof($reqAct); $i++) {
                            echo "<option ";
                            if ($these['id_action'] == $reqAct[$i]['id_action']) {
                                echo " selected ";
                            }
                            echo " value='" . $reqAct[$i]['id_action'] . "'>" . $reqAct[$i]['nom_action'] . "</option>";
                        }
                    } else {
                        echo "<option selected>  
                            " . $q[$_SESSION['lang']]['formThese']['h'] . "
                        </option>";
                        for ($i = 0; $i < sizeof($reqAct); $i++) {
                            echo "<option value='" . $reqAct[$i]['id_action'] . "'>" . $reqAct[$i]['nom_action'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <h3><?php echo $q[$_SESSION['lang']]['formThese']['i']?></h3>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input multiple type="file" accept="image/png, image/jpeg" class="custom-file-input" name="images[]" id="images">
                    <label class="custom-file-label font-weight-light" for="images"><?php echo $q[$_SESSION['lang']]['formThese']['j']?></label>
                </div>
            </div>
            <div class="mediasFormActu">
                <?php
                if (!empty($images)){
                    foreach ($images as $image){
                        echo "<div class='imageFormActu'><img src='media/image/".$image['source_media']."' class='img-thumbnail deleteMedia'>";
                        echo "<button id='".$image['id_media']."' class='mediasDelete btn btn-danger'>".$q[$_SESSION['lang']]['formThese']['p']."</button></div>";
                    }
                }
                ?>
            </div>
            <h3><?php echo $q[$_SESSION['lang']]['formThese']['k']?></h3>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input multiple type="file" accept="video/*" class="custom-file-input" name="videos[]">
                    <label class="custom-file-label font-weight-light"><?php echo $q[$_SESSION['lang']]['formThese']['l']?></label>
                </div>
            </div>
            <div class="mediasFormActu">
                <?php
                if (!empty($videos)){
                    foreach ($videos as $video){
                        echo "<div class='imageFormActu'>
                              <video src='media/video/".$video['source_media']."' class='img-thumbnail deleteMedia'></video>
                              <button id='".$video['id_media']."' class='mediasDelete btn btn-danger'>".$q[$_SESSION['lang']]['formThese']['p']."</button></div>";
                    }
                }
                ?>
            </div>
            <h3><?php echo $q[$_SESSION['lang']]['formThese']['m']?></h3>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input multiple type="file" accept="application/pdf" class="custom-file-input" name="fichiers[]">
                    <label class="custom-file-label font-weight-light"><?php echo $q[$_SESSION['lang']]['formThese']['n']?></label>
                </div>
            </div>
            <div class="mediasFormActu">
                <?php
                if (!empty($fichiers)){
                    foreach ($fichiers as $fichier){
                        echo "<div class='mediaForm'>
                                <a class='' href=\"media/pdf/".$fichier['source_media']."\" target='_blank'>
                                                <i style=\"font-size:100px; width: 100%;\" class=\"fas fa-file-pdf\"></i> 
                                            </a>
                              <button id='".$fichier['id_media']."' class='mediasDelete btn btn-danger'>".$q[$_SESSION['lang']]['formThese']['p']."</button></div>";
                    }
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $q[$_SESSION['lang']]['formThese']['o']?></button>
        </form>
    </section>
</main>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php include_once 'includes/footer.php' ?>
