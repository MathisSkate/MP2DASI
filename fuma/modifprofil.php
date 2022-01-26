<?php
include_once "includes/header.php";

$mail = $_GET['mail'];
/*Pour afficher les informations de la personne*/
$req = $bdd->prepare('SELECT tab1.id_utilisateur,tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.photo_utilisateur, tab1.statut_utilisateur, tab1.site_utilisateur, tab1.etablissement_utilisateur, tab1.mail_utilisateur, tab1.mdp_utilisateur, tab1.mission_utilisateur, tab1.portrait_utilisateur
                                FROM commune.utilisateur AS tab1 
                                JOIN '.$nameprojetgeneral.'.utilisateur_detail AS tab2 
                                ON tab1.id_utilisateur = tab2.id_utilisateur 
                                JOIN commune.participer AS tab4 
                                ON tab1.id_utilisateur = tab4.id_utilisateur
                                JOIN commune.projet AS tab5 
                                ON tab4.id_projet = tab5.id_projet
                                WHERE tab1.mail_utilisateur = :mail AND tab5.nom_projet = :projetgeneral');
$req->bindParam(':mail', $mail, PDO::PARAM_STR);
$req->bindParam(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);

$req->execute();
$reqUtil = $req->fetchAll();


/*Pour afficher les informations du labo de la personne*/
$req = $bdd->prepare('
    SELECT
        tab1.id_laboratoire,
        tab1.nom_laboratoire,
        tab1.abreviation_laboratoire
    FROM
        commune.laboratoire AS tab1
    JOIN commune.etudier AS tab2
    ON
        tab1.id_laboratoire = tab2.id_laboratoire
    JOIN commune.utilisateur AS tab3
    ON
        tab2.id_utilisateur = tab3.id_utilisateur
        where tab3.mail_utilisateur = :mail ');
$req->bindParam(':mail', $mail, PDO::PARAM_STR);
$req->execute();
$reqLaboUtil= $req->fetchAll();

?>
    <main class="col-lg-10 modifProfil-btn">
        <?php include_once 'includes/title.php' ?>
        <section class="content-container col-lg-12 row">
            <div class="col-lg-12">
                <h2>Modification fiche d'identité :&nbsp;</h2>
            </div>
            <div class="modifProfil container-fluid col-lg-12">
                <form enctype="multipart/form-data" class="form-signin" method="POST">
                    <section class="row">
                        <article class="col-lg-5">
                            <img class="photoIdentite" src="<?php
                            if (strlen($reqUtil[0]['photo_utilisateur']) == 0) {
                                echo "../media_commun/avatar/classe2_avatar.png";
                            } else {
                                echo("../media_commun/avatar/" . $reqUtil[0]['photo_utilisateur']);
                            } ?>"/>
                            <div class="custom-file">
                                <input type="file" id="inputAvatar" name="inputAvatar" accept="image/png, image/jpeg" class="custom-file-input">
                                <label class="custom-file-label font-weight-light" for="images">Choisir vos images (png/jpg)</label>
                            </div>
                        </article>
                        <article class="col-lg-7 information">
                            <div class="form-label-group">
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<input type=\"text\" name=\"inputNom\" id=\"inputNom\"
                                   class=\"form-control\" placeholder=\"Nom\" value=\"".$reqUtil[0]['nom_utilisateur']."\"
                                   required>";
                                } else {
                                    echo "<input type=\"text\" name=\"inputNom\" id=\"inputNom\"
                                   class=\"form-control\" placeholder=\"Nom\"
                                   required>";
                                }
                                ?>
                                <label for="inputNom">Nom *</label>
                            </div>
                            <div class="form-label-group">
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<input type=\"text\" name=\"inputPrenom\" id=\"inputPrenom\"
                                   class=\"form-control prenomUtil\" placeholder=\"Prénom\"
                                   value=\"".$reqUtil[0]['prenom_utilisateur']."\" required>";
                                } else {
                                    echo "<input type=\"text\" name=\"inputPrenom\" id=\"inputPrenom\"
                                   class=\"form-control prenomUtil\" placeholder=\"Prénom\"
                                   required>";
                                }
                                ?>
                                <label for="inputPrenom">Prenom *</label>
                            </div>
                            <div class="form-label-group">
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<input type=\"text\" name=\"inputEtab\" id=\"inputEtab\"
                                   class=\"form-control\" placeholder=\"Etablissement\"
                                   value=\"".$reqUtil[0]['etablissement_utilisateur']."\" required>";
                                } else {
                                    echo "<input type=\"text\" name=\"inputEtab\" id=\"inputEtab\"
                                   class=\"form-control\" placeholder=\"Etablissement\"
                                   required>";
                                }
                                ?>
                                <label for="inputEtab">Etablissement *</label>
                            </div>
                            <div class="form-label-group">
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<input type=\"url\" name=\"inputUrl\" id=\"inputUrl\"
                                   class=\"form-control\" placeholder=\"Site internet : http://\"
                                   value=\"".$reqUtil[0]['site_utilisateur']."\" pattern=\"http://.*\">";
                                } else {
                                    echo "<input type=\"url\" name=\"inputUrl\" id=\"inputUrl\"
                                   class=\"form-control\" placeholder=\"Site internet : http:// ou https://\">";
                                }
                                ?>
                                <label for="inputUrl">Site internet : http://</label>
                            </div>
                            <div class="form-label-group">
                                Statut :
                                <select required class="statut-select form-control" name="inputStatut">
                                    <option class="statut" selected>
                                        <?php
                                        if (strlen($reqUtil[0]['statut_utilisateur']) == 0) {
                                            echo "Aucun statut communiqué";
                                        } else {
                                            echo($reqUtil[0]['statut_utilisateur']);
                                        }
                                        ?>
                                    </option>
                                    <?php
                                    $statut = $reqUtil[0]['statut_utilisateur'];
                                    $stmt = $bdd->prepare("SELECT statut_utilisateur 
                                                                 FROM commune.utilisateur 
                                                                 WHERE statut_utilisateur IS NOT NULL and statut_utilisateur != '$statut'
                                                                 GROUP BY statut_utilisateur");
                                    $stmt->execute();
                                    while ($result = $stmt->fetch()) {
                                        echo "<option class=\"avatar\">" . $result['statut_utilisateur'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-label-group">
                                Laboratoire :

                                <select required class="labo-select form-control" name="inputLabo">
                                    <?php  echo"<option class=\"laboratoire\" selected=\"\" value=\"".$reqLaboUtil[0]['id_laboratoire']."\">"?>
                                    <?php
                                    if (strlen($reqLaboUtil[0]['nom_laboratoire']) == 0 || strlen($reqLaboUtil[0]['abreviation_laboratoire']) == 0) {
                                        echo "Aucun laboratoire communiqué";
                                    } else {
                                        echo($reqLaboUtil[0]['nom_laboratoire']);
                                    }
                                    ?>
                                    </option>
                                    <?php
                                    $stmt = $bdd->prepare("SELECT id_laboratoire, nom_laboratoire 
                                                                FROM commune.laboratoire 
                                                                WHERE nom_laboratoire IS NOT NULL 
                                                                GROUP BY id_laboratoire");
                                    $stmt->execute();
                                    while ($result = $stmt->fetch()) {
                                        echo "<option value='" . $result['id_laboratoire'] . "'>" . $result['nom_laboratoire'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-label-group">
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<input
                                    pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\"
                                    name=\"inputEmail\" id=\"inputEmail\" type=\"email\"
                                    value=\"".$reqUtil[0]['mail_utilisateur']."\" class=\"form-control mailUtil\" placeholder=\"nomprenom@mail.fr\">";
                                } else {
                                    echo "<input
                                    pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\"
                                    name=\"inputEmail\" id=\"inputEmail\" type=\"email\"
                                    class=\"form-control mailUtil\" placeholder=\"nomprenom@mail.fr\">";
                                }
                                ?>
                                <label for="inputEmail">Courriel</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" placeholder="Mot de passe" id="inputPassword" name="inputPassword" required>
                                <label for="inputPassword">Mot de passe*</label>
                            </div>
                            Si modification mot de passe (pas obligatoires) :
                            <p>
                                <input type="password" placeholder="Nouveau mot de passe" id="newPassword">
                            </p>
                            <p>
                                <input type="password" name="inputNewPassword" placeholder="Confirmer mot de passe" id="confirm_newPassword">
                            </p>
                            <script type="text/javascript">
                                var newpassword = document.getElementById("newPassword");
                                var confirm_newpassword = document.getElementById("confirm_newPassword");

                                function validatePassword(){
                                    if(newpassword.value != confirm_newpassword.value) {
                                        confirm_newpassword.setCustomValidity("Mot de passe ne correspond pas avec le mot de passe mis juste avant");
                                    } else {
                                        confirm_newpassword.setCustomValidity('');
                                    }
                                }

                                newpassword.onchange = validatePassword;
                                confirm_newpassword.onkeyup = validatePassword;
                            </script>

                            <input type="hidden" readonly class="form-control-plaintext" name="inputIdUtilisateur" id="inputIdUtilisateur"
                                   value="<?php echo($reqUtil[0]['id_utilisateur']); ?>">
                        </article>
                        <article class="col-lg-12 information">
                            <div class="form-label-group flex-div">
                                <p>Portrait : </p>
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<textarea class='form-control' id='editor' required maxlength=\"350\" name=\"inputPortrait\" id=\"inputPortrait\" placeholder=\"Portrait\" value=\"".$reqUtil[0]['portrait_utilisateur'] ."\" >".$reqUtil[0]['portrait_utilisateur']."
                                      </textarea>";
                                } else {
                                    echo "<textarea class='form-control' id='editor' required maxlength=\"350\" name=\"inputPortrait\" id=\"inputPortrait\" placeholder=\"Portrait\"></textarea>";
                                }
                                ?>
                            </div>
                            <div class="form-label-group flex-div">
                                <p>Mission de l'utilisateur : </p>
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<textarea class='form-control editor' required maxlength=\"350\" name=\"inputMission\" id=\"inputMissionwithValue\" placeholder=\"Mission\" value=\"".$reqUtil[0]['mission_utilisateur'] ."\" >".$reqUtil[0]['mission_utilisateur']."
                                      </textarea>";
                                } else {
                                    echo "<textarea class='form-control editor' required maxlength=\"350\" name=\"inputMission\" id=\"inputMission\" placeholder=\"Mission\"></textarea>";
                                }
                                ?>
                            </div>
                        </article>
                    </section>
                    <button class="bouton-submit btn btn-block text-uppercase" type="submit">Valider</button>
                </form>
            </div>
        </section>
    </main>
<script>
    ClassicEditor
        .create( document.querySelector( '.editor' ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php
include_once "includes/footer.php";
?>
