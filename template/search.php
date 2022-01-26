<?php
include_once "includes/header.php";

//On récupère le parametre GET et on filtre tout le html le php on supprime les accents etc.
$search = $_GET['query'];
$search = htmlspecialchars($search);
$search = suppr_accents($search);
$search = ucfirst($search);

$req = $bdd->prepare("
SELECT DISTINCT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.statut_utilisateur, tab1.etablissement_utilisateur, tab1.mail_utilisateur, tab1.mail_utilisateur, tab2.id_utilisateur_detail
             FROM commune.utilisateur AS tab1 
             JOIN ".$nameprojetgeneral.".utilisateur_detail AS tab2 
             ON tab1.id_utilisateur = tab2.id_utilisateur
             JOIN commune.participer AS tab3 
             ON tab1.id_utilisateur = tab3.id_utilisateur
             JOIN commune.projet AS tab4
             ON tab3.id_projet = tab4.id_projet
             WHERE tab4.nom_projet = :projetgeneral AND tab1.nom_utilisateur LIKE :search OR tab1.prenom_utilisateur LIKE :search
");
$req->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
$req->bindValue(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);
$req->execute();

?>
    <main class="col-lg-10 pageAdminUser">
        <?php include_once 'includes/title.php' ?>
        <section class="content-container col-lg-12 row">
            <div class="col-lg-12">

                <h2><?php echo $q[$_SESSION['lang']]['search']['a'].$search ?></h2>

            </div>
            <div class="col-lg-12">

                    <?php

                    if ($req->rowCount() > 0) {
                        echo "
                        <div class=\"col-lg-12 options-container\">
                            <div class=\"filter\">
                                <select required=\"\" class=\"filter-select\" name=\"inputLabo\" onchange=\"usgsChanged(this);\">
                                    <option value=\"\" class=\"statut\" selected=\"\" disabled=\"\">".$q[$_SESSION['lang']]['search']['b']."</option>
                                    <option valueid=\"Users\" valuecol=\"0\" valuedesc=\"?asc\" value=\"1\">".$q[$_SESSION['lang']]['search']['c']."</option>
                                    <option valueid=\"Users\" valuecol=\"0\" valuedesc=\"?desc\" value=\"2\">".$q[$_SESSION['lang']]['search']['d']."</option>
                                    <option valueid=\"Users\" valuecol=\"1\" valuedesc=\"asc\" value=\"3\">".$q[$_SESSION['lang']]['search']['e']."</option>
                                    <option valueid=\"Users\" valuecol=\"1\" valuedesc=\"desc\" value=\"4\">".$q[$_SESSION['lang']]['search']['f']."</option>
                                    <option valueid=\"Users\" valuecol=\"2\" valuedesc=\"asc\" value=\"5\">".$q[$_SESSION['lang']]['search']['g']."</option>
                                    <option valueid=\"Users\" valuecol=\"2\" valuedesc=\"desc\" value=\"6\">".$q[$_SESSION['lang']]['search']['h']."</option>
                                    <option valueid=\"Users\" valuecol=\"3\" valuedesc=\"asc\" value=\"7\">".$q[$_SESSION['lang']]['search']['i']."</option>
                                    <option valueid=\"Users\" valuecol=\"3\" valuedesc=\"desc\" value=\"8\">".$q[$_SESSION['lang']]['search']['j']."</option>
                                    <option valueid=\"Users\" valuecol=\"4\" valuedesc=\"asc\" value=\"9\">".$q[$_SESSION['lang']]['search']['k']."</option>
                                    <option valueid=\"Users\" valuecol=\"4\" valuedesc=\"desc\" value=\"10\">".$q[$_SESSION['lang']]['search']['l']." </option>
                                    <option valueid=\"Users\" valuecol=\"5\" valuedesc=\"asc\" value=\"9\">".$q[$_SESSION['lang']]['search']['m']."</option>
                                    <option valueid=\"Users\" valuecol=\"5\" valuedesc=\"desc\" value=\"10\">".$q[$_SESSION['lang']]['search']['n']."</option>
                                    <option valueid=\"Users\" valuecol=\"6\" valuedesc=\"?desc\" value=\"9\">".$q[$_SESSION['lang']]['search']['o']."</option>
                                    <option valueid=\"Users\" valuecol=\"6\" valuedesc=\"?asc\" value=\"10\">".$q[$_SESSION['lang']]['search']['p']."</option>
                                    <option valueid=\"Users\" valuecol=\"7\" valuedesc=\"?desc\" value=\"9\">".$q[$_SESSION['lang']]['search']['q']."</option>
                                    <option valueid=\"Users\" valuecol=\"7\" valuedesc=\"?asc\" value=\"10\">".$q[$_SESSION['lang']]['search']['r']."</option>
                                </select>
                            </div>
                            <div class=\"search\">
                                <form method=\"GET\" class=\"main-form-search\">
                                    <div class=\"input-container\">
                                        <input type=\"text\" class=\"site-search\" name=\"query\" placeholder=\"".$q[$_SESSION['lang']]['search']['s']."\">
                                        <button class=\"button-search-container\">
                                            <i class=\"fas fa-search\"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                <table id=\"Users\" class=\"w-100 table table-responsive table-striped\">
                    <thead>
                    <tr>
                        <th scope=\"col\">".$q[$_SESSION['lang']]['search']['t']."</th>
                        <th scope=\"col\">".$q[$_SESSION['lang']]['search']['u']."</th>
                        <th scope=\"col\">".$q[$_SESSION['lang']]['search']['v']."</th>
                        <th scope=\"col\">".$q[$_SESSION['lang']]['search']['w']."</th>
                        <th scope=\"col\">".$q[$_SESSION['lang']]['search']['x']."</th>
                        <th scope='col'>".$q[$_SESSION['lang']]['search']['y']."</th>
                    </tr>
                    </thead>
                    <tbody>";
                        while ($donnees = $req->fetch()){
                            echo "
                            <tr>
                                <td>".$donnees['nom_utilisateur']."</td>
                                <td>".$donnees['prenom_utilisateur']."</td>
                                <td>".$donnees['statut_utilisateur']."</td>
                                <td>".$donnees['etablissement_utilisateur']."</td>                            
                                <td>".$donnees['mail_utilisateur']."</td>
                                <td><a href=\"profil.php?mail=".$donnees['mail_utilisateur']."\" class=\"LinkOut btn btn-primary\">".$q[$_SESSION['lang']]['search']['z']." <i class=\"fas fa-user-alt\"></i></a></td>
                            </tr>
                      ";
                        }
                echo "</tbody>
                </table>";
                    } else {
                        echo '
                        <section class="no-result">
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-times-circle"></i><span class="error">&nbsp; '.$q[$_SESSION['lang']]['search']['aa'] .' '.$search.'</span>                       
                        </div>
                        </section>';
                    }
                    ?>
            </div>
        </section>
    </main>
<?php
include_once "includes/footer.php";
?>
