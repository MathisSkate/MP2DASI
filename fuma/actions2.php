<?php

include_once "includes/header.php";

/*Pour afficher les actions*/
$req = $bdd->prepare('SELECT id_action, numero_action, nom_action from ' . $nameprojetgeneral . '.action');
$req->execute();
$reqAct = $req->fetchAll();

/*Pour afficher les personnes en lien avec l'action*/
$req = $bdd->prepare('SELECT tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.mail_utilisateur, tab3.id_action FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur JOIN ' . $nameprojetgeneral . '.participer AS tab3 ON tab2.id_utilisateur_detail = tab3.id_utilisateur_detail JOIN ' . $nameprojetgeneral . '.action AS tab4 ON tab3.id_action = tab4.id_action WHERE tab3.id_action = :action ORDER by tab1.nom_utilisateur');

?>

<main class="col-lg-10">
    <?php include_once 'includes/title.php' ?>
    <section class="listCard content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2><?php echo $q[$_SESSION['lang']]['actions']['a']?></h2>
        </div>

        <?php
        if (isset($_SESSION['emailUser']) && $_SESSION['isAdmin'] == 1 || ($_SESSION['isSuperAdmin'] == 1)) {
            echo " <section class=\"row col-lg-12 justify-content-between\">
            <a class=\"btn btn-success col-lg-4\" href=\"ajoutaction.php\">".$q[$_SESSION['lang']]['actions']['d']."</a>
            <a class=\"btn btn-danger col-lg-4\" href=\"supprimeraction.php\">".$q[$_SESSION['lang']]['actions']['e']."</a>
        </section>";
        }else{
            echo "";
        }

        ?>
        <section class="col-lg-12 actions-container row justify-content-center">
        <?php

        echo '<ul>';
        for ($i = 0; $i < sizeof($reqAct); $i++) {


            echo "<section class=\"card-action\">
                  <section class=\"card-body\">
                  <h2 class=\"card-title\">".$q[$_SESSION['lang']]['actions']['b']." " . $reqAct[$i]['numero_action'] . "</h2>
                  <p class=\"card-text\">" . $reqAct[$i]['nom_action'] . "</p>
                  </section>
                  <section class=\"card-footer date\">
                  <span class=\"presSousAction\">
                  </span>
                  <a class=\"btn btn-primary\" href=\"action.php?action=" . $reqAct[$i]['id_action'] . "\">".$q[$_SESSION['lang']]['actions']['c']."</a>
                  </section>
                  </section>";
        }
        echo '</ul>';
        ?>
        </section>
    </section>

</main>
<?php
include_once "includes/footer.php";
?>

