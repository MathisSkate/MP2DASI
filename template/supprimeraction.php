<?php
include_once "includes/header.php";

?>
<main class="col-lg-10 supAction-btn">
    <?php include_once 'includes/title.php' ?>
    <section class="content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2>Suppression d'action :&nbsp;</h2>
        </div>
        <div class="ficheIden container-fluid col-lg-12">
            <article class="col-lg-12">
                <form method="post" class="form-signin">
                    Action(s) que vous voulez supprimer :
                    <?php
                    $stmt = $bdd->prepare('SELECT id_action, nom_action from ' . $nameprojetgeneral . '.action order by id_action');
                    $stmt->execute();
                    $reqAct = $stmt->fetchAll();
                    for ($i = 0; $i < sizeof($reqAct); $i++) {
                        echo "<div class=\"custom-control custom-checkbox\">
                                        <input type=\"checkbox\" name=\"supAct[]\" class=\"custom-control-input\" id=\"supAct$i\" value=\"" . $reqAct[$i]['id_action'] . "\">
                                        <label class=\"custom-control-label\" for=\"supAct$i\">" . $reqAct[$i]['id_action'] . " => " . $reqAct[$i]['nom_action'] . "</label> 
                                    </div>";
                    }
                    ?>
                    <button class="bouton-submit btn btn-block text-uppercase" type="submit">Valider</button>
                </form>
            </article>
        </div>
    </section>
</main>


<?php
include_once "includes/footer.php";
?>
