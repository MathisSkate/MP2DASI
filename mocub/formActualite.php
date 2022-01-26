<?php

include_once "includes/header.php";
require_once "functions/selectMedia.php";

//Requête pour récupérer les différents types d'actualités possible
$reqTypeActu = $bdd->query("SHOW COLUMNS FROM actualite");
$tableActu = $reqTypeActu->fetchAll();
$enumType = substr($tableActu[1]['Type'], 6, -2);
$types = explode("','", $enumType);

//Récupérer le nom de la page précédente
$lastPage = basename($_SERVER['HTTP_REFERER']);
$modif = false;

//Pour différencier Ajout ou Modif
if ($lastPage != "actualites.php"){
    //Récupère le numéro(id) après "actualite.php?actualite="
    $idActu = substr($lastPage, 24);
    $modif = true;

    //Rquête pour récupéré informations sur actualite si modif
    $reqActu = $bdd->query("SELECT type_actualite, titre_actualite, lien_actualite, description_actualite, resume_actualite, date_actualite_debut, date_actualite_fin, id_utilisateur_detail FROM actualite WHERE id_actualite = ".$idActu." ");
    $actualite = $reqActu->fetch();

    //Requête pour récupéré média si modif
    $images = selectMedia($bdd, 'actualite', $idActu, 'image');
    $videos = selectMedia($bdd, 'actualite', $idActu, 'video');
    $fichiers = selectMedia($bdd, 'actualite', $idActu, 'pdf');
}

?>
<main class="col-lg-10 <?php if ($modif){echo "modifActu-btn";} else echo "ajoutActu-btn";?>">
<?php include_once 'includes/title.php'?>
    <section id="form_actu">
        <form enctype="multipart/form-data" method="post">
            <?php
            if ($modif){
                echo "<input name='idActu' type='hidden' value='".$idActu."'>";
            }
            ?>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formActualite']['a']?></label>
                <input type="text" class="form-control" name="titreActualite" placeholder="Titre actualite" value="<?php if ($modif){echo $actualite['titre_actualite'];}?>" required>
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formActualite']['c']?></label>
                <select class="form-control type-select" name="typeActualite" required>
                    <option class="type" selected>
                        <?php
                        if ($modif) {
                            echo $actualite['type_actualite'];
                        } else {
                            echo $q[$_SESSION['lang']]['formActualite']['d'];
                        }
                        ?>
                    </option>
                    <?php

                    foreach ($types as $type){
                        if ($type == $actualite['type_actualite']){
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
                <label><?php echo $q[$_SESSION['lang']]['formActualite']['e']?></label>
                <input type="text" class="form-control" name="resumeActualite" placeholder="Resume actualite" value="<?php if ($modif){echo $actualite['resume_actualite'];}?>" required>
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formActualite']['p']?></label>
                <input type="date" name="dateActualiteDebut" id="dateActualiteDebut"
                       class="form-control" placeholder="Date de l'actualité(debut ou unique)" value="<?php if ($modif){echo $actualite['date_actualite_debut'];}?>" required>
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formActualite']['r']?></label>
                <input type="date" name="dateActualiteFin" id="dateActualiteFin"
                       class="form-control" placeholder="Date de l'actualité (fin)" value="<?php if ($modif){echo $actualite['date_actualite_fin'];}?>" >
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formActualite']['g']?></label>
                <textarea class="form-control" name="descriptionActualite" id="editor" placeholder="Description actualite" maxlength="2000" value="<?php if ($modif){echo $actualite['description_actualite'];}?>" ><?php if ($modif){echo $actualite['description_actualite'];}?></textarea>
            </div>
            <div class="form-group">
                <label><?php echo $q[$_SESSION['lang']]['formActualite']['q'] ?></label>
                <input type="url" class="form-control" name="lienActualite"
                       placeholder="Lien vers l'actualite : http:// ou https://" maxlength="500"
                       value="<?php if ($modif) {
                           echo $actualite['lien_actualite'];
                       } ?>">
            </div>
            <h3><?php echo $q[$_SESSION['lang']]['formActualite']['h']?></h3>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input multiple type="file" accept="image/png, image/jpeg" class="custom-file-input" name="images[]" id="images">
                    <label class="custom-file-label font-weight-light" for="images"><?php echo $q[$_SESSION['lang']]['formActualite']['i']?></label>
                </div>
            </div>
            <div class="mediasFormActu">
                <?php
                if (!empty($images)){
                    foreach ($images as $image){
                        echo "<div class='imageFormActu'><img src='media/image/".$image['source_media']."' class='img-thumbnail deleteMedia'>";
                        echo "<button id='".$image['id_media']."' class='mediasDelete btn btn-danger'>".$q[$_SESSION['lang']]['formActualite']['n']."</button></div>";
                    }
                }
                ?>
            </div>
            <h3><?php echo $q[$_SESSION['lang']]['formActualite']['j']?></h3>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input multiple type="file" accept="video/*" class="custom-file-input" name="videos[]">
                    <label class="custom-file-label font-weight-light"><?php echo $q[$_SESSION['lang']]['formActualite']['k']?></label>
                </div>
            </div>
            <div class="mediasFormActu">
                <?php
                if (!empty($videos)){
                    foreach ($videos as $video){
                        echo "<div class='imageFormActu'>
                              <video src=media/video/".$video['source_media']."' class='img-thumbnail deleteMedia'></video>
                              <button id='".$video['id_media']."' class='mediasDelete btn btn-danger'>".$q[$_SESSION['lang']]['formActualite']['n']."</button></div>";
                    }
                }
                ?>
            </div>
            <h3><?php echo $q[$_SESSION['lang']]['formActualite']['l']?></h3>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input multiple type="file" accept="application/pdf" class="custom-file-input" name="fichiers[]">
                    <label class="custom-file-label font-weight-light"><?php echo $q[$_SESSION['lang']]['formActualite']['m']?></label>
                </div>
            </div>
            <div class="mediasFormActu">
                <?php
                if (!empty($fichiers)){
                    foreach ($fichiers as $fichier){
                        echo "<div class='mediaForm'>
                                <a class='' href=\"media/pdf/".$fichier['source_media']."\" target='_blank'>
						<i style=\"font-size:100px; width: 100%;\" class=\"fas fa-file-pdf\"></i>                                            </a>
                              <button id='".$fichier['id_media']."' class='mediasDelete btn btn-danger'>".$q[$_SESSION['lang']]['formActualite']['n']."</button></div>";
                    }
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $q[$_SESSION['lang']]['formActualite']['o']?></button>
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
