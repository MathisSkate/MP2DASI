<?php
include_once "includes/header.php";
$mail = $_GET['mail'];
/*Pour afficher les informations de la personne*/
$req = $bdd->prepare('SELECT tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.photo_utilisateur, tab1.statut_utilisateur, tab1.site_utilisateur, tab1.etablissement_utilisateur, tab1.mail_utilisateur, tab1.mission_utilisateur, tab1.portrait_utilisateur
                                FROM commune.utilisateur AS tab1 
                                JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 
                                ON tab1.id_utilisateur = tab2.id_utilisateur  
                                JOIN commune.participer AS tab4 
                                ON tab1.id_utilisateur = tab4.id_utilisateur
                                JOIN commune.projet AS tab5 
                                ON tab4.id_projet = tab5.id_projet
                                WHERE tab1.mail_utilisateur = :mail and tab5.nom_projet = :projetgeneral');
$req->bindParam(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);
$req->bindParam(':mail', $mail, PDO::PARAM_STR);
$req->execute();
$reqUtil = $req->fetchAll();

/*Pour afficher les informations du labo de la personne*/
$req = $bdd->prepare('
    SELECT
        tab1.nom_laboratoire
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
$reqLabo= $req->fetchAll();

/*Pour afficher la liste des publications*/
$req = $bdd->prepare('
SELECT
    tab4.id_publication,
    tab4.titre_publication
FROM
    commune.utilisateur AS tab1
JOIN classe2.utilisateur_detail AS tab2
ON
    tab1.id_utilisateur = tab2.id_utilisateur
JOIN classe2.publier AS tab3
ON
    tab2.id_utilisateur_detail = tab3.id_utilisateur_detail
JOIN classe2.publication AS tab4
ON
    tab3.id_publication = tab4.id_publication
WHERE tab1.mail_utilisateur = :mail');
$req->bindParam(':mail', $mail, PDO::PARAM_STR);
$req->execute();
$reqPub = $req->fetchAll();

/*Pour afficher la liste des th??ses*/
$req = $bdd->prepare('SELECT tab3.id_these, tab3.titre_these FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur JOIN ' . $nameprojetgeneral . '.these AS tab3 ON tab2.id_utilisateur_detail = tab3.id_utilisateur_detail WHERE tab1.mail_utilisateur = :mail');
$req->bindParam(':mail', $mail, PDO::PARAM_STR);
$req->execute();
$reqThe = $req->fetchAll();

function ifTest(){

}
?>
<main class="col-lg-10">
    <?php include_once 'includes/title.php' ?>
    <section class="content-container col-lg-12 row">
    <?php
    if ($reqUtil){
        echo "
        <div class=\"col-lg-12\">
            <h2>".$q[$_SESSION['lang']]['profil']['a']."&nbsp;</h2>
        </div>
        <div class=\"ficheIden container-fluid col-lg-12\">
            <section class=\"row\" style=\"color: white;\">
                <article class=\"col-lg-5\">
                    <img style='width: 15rem;' class=\"photoIdentite\" src=\" 
                    ".
                        ((strlen($reqUtil[0]['photo_utilisateur']) == 0) ? "../media_commun/avatar/classe2_avatar.png" : "../media_commun/avatar/".$reqUtil[0]['photo_utilisateur'])
                        ."
                    \">
                </article>
                <article class=\"col-lg-7 information\">
                <p> ".$q[$_SESSION['lang']]['profil']['b']."
                    ".
                        ((strlen($reqUtil[0]['nom_utilisateur']) == 0) ? "Aucun Nom communiqu??" : "".$reqUtil[0]['nom_utilisateur']."")
                    ."
                </p>
                <p> ".$q[$_SESSION['lang']]['profil']['c']."
                    ".
                        ((strlen($reqUtil[0]['prenom_utilisateur']) == 0) ? "Aucun pr??nom communiqu??" : "".$reqUtil[0]['prenom_utilisateur']."")
                        ."
                </p>
                <p> ".$q[$_SESSION['lang']]['profil']['d']."
                    ".
                        ((strlen($reqUtil[0]['etablissement_utilisateur']) == 0) ? "Aucun ??tablissement communiqu??" : "".$reqUtil[0]['etablissement_utilisateur']."")
                        ."
                </p>
                <p> ".$q[$_SESSION['lang']]['profil']['e']."
                    ".
                        ((strlen($reqUtil[0]['site_utilisateur']) == 0) ? "Aucun site communiqu??" : "".$reqUtil[0]['site_utilisateur']."")
                        ."
                </p>
                <p> ".$q[$_SESSION['lang']]['profil']['f']."
                    ".
                        ((strlen($reqUtil[0]['statut_utilisateur']) == 0) ? "Aucun statut communiqu??" : "".$reqUtil[0]['statut_utilisateur']."")
                        ."
                </p>
                <p> ".$q[$_SESSION['lang']]['profil']['g']."
                    ".
                        ((strlen($reqLabo[0]['nom_laboratoire']) == 0) ? "Aucun laboratoire communiqu??" : "".$reqLabo[0]['nom_laboratoire']."")
                        ."
                </p>
                <p> ".$q[$_SESSION['lang']]['profil']['h']."
                    ".
                        ((strlen($reqUtil[0]['mail_utilisateur']) == 0) ? "Aucun nom communiqu??" : "<a href=\"mailto:" . $reqUtil[0]['mail_utilisateur'] . "\">" . $reqUtil[0]['mail_utilisateur'] . "</a>")
                        ."
                </p>
                </article>
                    ".
                        (((isset($_SESSION['emailUser'])) && ($_SESSION['emailUser'] == $reqUtil[0]['mail_utilisateur'])) ? "<a class=\"btn btn-success\" href=\"modifprofil.php?mail=" . $reqUtil[0]['mail_utilisateur'] . "\">".$q[$_SESSION['lang']]['profil']['i']."</a>" : "")
                    ."
            </section>
        </div>
    ";
    } else {
        echo "<div style='text-align : center; width: 100%;' class=\"alert alert-danger\" role=\"alert\">
            ".$q[$_SESSION['lang']]['profil']['s']."
          </div>";
    }
    ?>
    </section>
    <section class="<?php if(empty($reqUtil)) {echo "hide";} ?> container-fluid col-lg-12">
        <div class="accordion md-accordion medias" id="accordionEx1" role="tablist" aria-multiselectable="true">
            <?php
            if (strlen($reqUtil[0]['portrait_utilisateur']) == 0) {
                echo " ";
            }
            else
            {
                echo "
                <div class=\"card\">
                    <div class=\"card-header\" id=\"headingOne\">
                        <a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordionEx1\" href=\"#collapseOne\"
                       aria-expanded=\"false\" aria-controls=\"collapseOne\">
                        <h5 class=\"mb-0\">
                            ".$q[$_SESSION['lang']]['profil']['r']." <i class=\"fas fa-angle-down rotate-icon\"></i>
                        </h5>
                    </a>
                    </div>
                    <div id=\"collapseOne\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#accordionEx1\">
                        <div class=\"card-body\">
                            <p>
							".$reqUtil[0]['portrait_utilisateur']."
							</p>
                        </div>
                    </div>
                </div>";
            }
            ?>
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo1">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                       aria-expanded="false" aria-controls="collapseTwo1">
                        <h5 class="mb-0">
                            <?php echo $q[$_SESSION['lang']]['profil']['j'] ?> <i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>
                <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
                     data-parent="#accordionEx1">
                    <div class="card-body">

                        <?php
                        if (strlen($reqUtil[0]['mission_utilisateur']) == 0) {
                            echo "Aucune mission pour le moment pour " . $reqUtil[0]['prenom_utilisateur'] . " " . $reqUtil[0]['nom_utilisateur'];
                        } else {
                            echo($reqUtil[0]['mission_utilisateur']);
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo2">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
                       aria-expanded="false" aria-controls="collapseTwo21">
                        <h5 class="mb-0">
                            <?php
                            if (sizeof($reqPub) <= 1) {
                                echo $q[$_SESSION['lang']]['profil']['k-2'];
                            } else {
                                echo $q[$_SESSION['lang']]['profil']['k'];                            }
                            ?> <i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>
                <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21"
                     data-parent="#accordionEx1">
                    <div class="card-body">
                        <?php
                        if (sizeof($reqPub) == 0) {
                            echo "Aucune publication pour le moment pour " . $reqUtil[0]['prenom_utilisateur'] . " " . $reqUtil[0]['nom_utilisateur'];
                        } else {
                            if (sizeof($reqPub) == 1) {
                                echo "<p>" . $reqUtil[0]['prenom_utilisateur'] . " " . $reqUtil[0]['nom_utilisateur'] . " a fait " . sizeof($reqPub) . " publication</p>";
                            } else {
                                echo "<p>" . $reqUtil[0]['prenom_utilisateur'] . " " . $reqUtil[0]['nom_utilisateur'] . " a fait " . sizeof($reqPub) . " publications</p>";
                            }
                            for ($i = 0; $i < sizeof($reqPub); $i++) {
                                echo "<p><a href=\"publication.php?publication=" . $reqPub[$i]['id_publication'] . "\">" . $reqPub[$i]['titre_publication'] . "</a></p>";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" role="tab" id="headingThree31">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
                       aria-expanded="false" aria-controls="collapseThree31">
                        <h5 class="mb-0">
                            <?php
                            if (sizeof($reqThe) <= 1) {
                                echo $q[$_SESSION['lang']]['profil']['l-2'];
                            } else {
                                echo $q[$_SESSION['lang']]['profil']['l'];                         }
                            ?>
                             <i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>
                <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31"
                     data-parent="#accordionEx1">
                    <div class="card-body">
                        <?php
                        if (sizeof($reqThe) == 0) {
                            echo "Aucune th??se pour le moment pour " . $reqUtil[0]['prenom_utilisateur'] . " " . $reqUtil[0]['nom_utilisateur'];
                        } else {
                            if (sizeof($reqThe) == 1) {
                                echo "<p>" . $reqUtil[0]['prenom_utilisateur'] . " " . $reqUtil[0]['nom_utilisateur'] . " a fait " . sizeof($reqThe) . " th??se</p>";
                            } else {
                                echo "<p>" . $reqUtil[0]['prenom_utilisateur'] . " " . $reqUtil[0]['nom_utilisateur'] . " a fait " . sizeof($reqThe) . " th??ses</p>";
                            }
                            for ($i = 0; $i < sizeof($reqThe); $i++) {
                                echo "<p><a href=\"these.php?these=" . $reqThe[$i]['id_these'] . "\">" . $reqThe[$i]['titre_these'] . "</a></p>";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include_once "includes/footer.php";
?>
