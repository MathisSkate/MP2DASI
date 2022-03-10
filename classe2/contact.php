<?php
include_once "includes/header.php";

if (isset($_SESSION['emailUser'])) {
    $email = $_SESSION['emailUser'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $stmt = $bdd->prepare("SELECT nom_utilisateur, prenom_utilisateur, statut_utilisateur, photo_utilisateur, mail_utilisateur
                                         FROM commune.utilisateur
                                         WHERE mail_utilisateur = ?");
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();

    $resultUser = $stmt->fetchAll();
    $resultUser = $resultUser['0'];

    $nomUser = $resultUser['nom_utilisateur'];
    $prenomUser = $resultUser['prenom_utilisateur'];
}

$req = $bdd->prepare('SELECT
    tab1.nom_utilisateur,
    tab1.prenom_utilisateur,
    tab1.mail_utilisateur,
    tab3.id_action
FROM
    commune.utilisateur AS tab1
JOIN classe2.utilisateur_detail AS tab2
ON
    tab1.id_utilisateur = tab2.id_utilisateur
JOIN classe2.participer AS tab3
ON
    tab2.id_utilisateur_detail = tab3.id_utilisateur_detail
JOIN classe2.action AS tab4
ON
    tab3.id_action = tab4.id_action
JOIN commune.participer AS tab5
ON
    tab1.id_utilisateur = tab5.id_utilisateur
JOIN commune.projet AS tab6
ON
    tab5.id_projet = tab6.id_projet
WHERE
    tab3.id_action = 0 AND tab6.nom_projet = ?
ORDER BY
    tab1.nom_utilisateur');
$req->bindParam(1, $nameprojetgeneral, PDO::PARAM_STR);
$req->execute();
$reqUtil = $req->fetchAll();

?>
<main class="col-lg-10">
    <?php include_once 'includes/title.php' ?>

    <section class="content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2><?php echo $q[$_SESSION['lang']]['contact']['a']?>&nbsp;</h2>
        </div>
        <div class="ficheContact container-fluid col-lg-12">
            <section class="row justify-content-between">
                <article class="col-lg-6">
                    <div class="col-lg-12 text-center">
                        <h2><?php echo $q[$_SESSION['lang']]['contact']['b']?></h2>
                    </div>
                    <?php
                    if (sizeof($reqUtil) == 0) {
                        echo $q[$_SESSION['lang']]['contact']['j'];
                    } else {
                        for ($i = 0; $i < sizeof($reqUtil); $i++) {
                            echo "<div class=\"mx-auto col-lg-12\">
                                        <table class='w-100 table table-responsive' style=\"background-color: white;\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><i style=\"font-size: 20px;\" class=\"fas fa-user\"></i>
                                                </td>
                                                <td style=\"text-align: center;\">" . $reqUtil[$i]['prenom_utilisateur'] . "
                                                    <br>" . $reqUtil[$i]['nom_utilisateur'] . "</td>
                                            </tr>
                                            <tr>
                                                <td style=\"text-align: center;\"><i style=\"font-size: 20px;\" class=\"fas fa-envelope\"></i>
                                                </td>
                                                <td style=\"text-align: center;\"><a href=\"mailto:" . $reqUtil[$i]['mail_utilisateur'] . "\" target=\"_top\">" . $reqUtil[$i]['mail_utilisateur'] . "</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br/>";
                        }
                    }
                    ?>
                </article>
                <article class="col-lg-6 text-center" >
                    <img style="width: 50%;" src="media/image/logo/normandie.jpg" alt="Logo Normandie">
                </article>
            </section>
            <br/>
            <section class="contact-form-container">
                <form method="post" class="form-contact">
                    <section class="row">
                        <article class="col-lg-12 contact">
                            <div class="form-label-group">
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<input pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\" name=\"inputEmailExpediteur\" type=\"email\" id=\"inputEmailExpediteur\" readonly class=\"form-control\" placeholder=\"".$q[$_SESSION['lang']]['contact']['c']."\" value=\"" . $_SESSION['emailUser'] . "\"required>";
                                } else {
                                    echo "<input pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\" name=\"inputEmailExpediteur\" type=\"email\" id=\"inputEmailExpediteur\" class=\"form-control\" placeholder=\"".$q[$_SESSION['lang']]['contact']['c']."\" required>";
                                }
                                ?>
                                <label for="inputEmailExpediteur"><?php echo $q[$_SESSION['lang']]['contact']['d']?></label>

                            </div>
                            <div class="form-label-group">
                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<input name=\"inputPrenomExpediteur\"
                                           type=\"text\" id=\"inputPreomExpediteur\" readonly class=\"form-control\"
                                           placeholder=\"".$q[$_SESSION['lang']]['contact']['e']."\" value=\"" . $prenomUser . "\" required>";
                                } else {
                                    echo "<input name=\"inputPrenomExpediteur\"
                                           type=\"text\" id=\"inputPrenomExpediteur\" class=\"form-control\"
                                           placeholder=\"".$q[$_SESSION['lang']]['contact']['e']."\" required>";
                                }
                                ?>
                                <label for="inputPrenomExpediteur"><?php echo $q[$_SESSION['lang']]['contact']['e']?></label>
                            </div>
                            <div class="form-label-group">

                                <?php
                                if ((isset($_SESSION['emailUser']))) {
                                    echo "<input name=\"inputNomExpediteur\"
                                           type=\"text\" id=\"inputNomExpediteur\" readonly class=\"form-control\"
                                           placeholder=\"".$q[$_SESSION['lang']]['contact']['f']."\" value=\"" . $nomUser . "\" required >";
                                } else {
                                    echo "<input name=\"inputNomExpediteur\"
                                           type=\"text\" id=\"inputNomExpediteur\" class=\"form-control\"
                                           placeholder=\"".$q[$_SESSION['lang']]['contact']['f']."\" required>";
                                }
                                ?>
                                <label for="inputNomExpediteur"><?php echo $q[$_SESSION['lang']]['contact']['f']?></label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" name="inputSubject" class="form-control" id="inputSubject"
                                       placeholder="<?php echo $q[$_SESSION['lang']]['contact']['g']?>"
                                       maxlength="255" required>
                                <label for="inputSubject"><?php echo $q[$_SESSION['lang']]['contact']['g']?></label>

                            </div>
                            <div class="form-label-group">
                                <textarea class="form-control" id="inputDescriptionMail" name="inputDescriptionMail" placeholder="<?= $q[$_SESSION["lang"]]['contact']['h'] ?>" required></textarea>
                            </div>
                        </article>
                    </section>
                    <button class="bouton-submit btn btn-block text-uppercase" type="submit"><?php echo $q[$_SESSION['lang']]['contact']['i']?></button>
                </form>
            </section>
        </div>
    </section>
</main>


<?php
include_once "includes/footer.php";
?>
