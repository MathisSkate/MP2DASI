<?php
include_once "includes/header.php";

/*Pour afficher les actions*/
$action = $_GET['action'];
$req = $bdd->prepare('SELECT tab1.id_action, tab1.nom_action, tab2.nom_sous_action FROM ' . $nameprojetgeneral . '.action AS tab1 JOIN ' . $nameprojetgeneral . '.sous_action AS tab2 ON tab1.id_action = tab2.id_action WHERE tab1.id_action = :action');
$req->bindParam(':action', $action, PDO::PARAM_INT);
$req->execute();
$reqAct = $req->fetchAll();

/*Pour afficher les personnes en lien avec l'action*/
$req = $bdd->prepare('SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.mail_utilisateur, tab3.id_action FROM commune.utilisateur AS tab1 JOIN ' . $nameprojetgeneral . '.utilisateur_detail AS tab2 ON tab1.id_utilisateur = tab2.id_utilisateur JOIN ' . $nameprojetgeneral . '.participer AS tab3 ON tab2.id_utilisateur_detail = tab3.id_utilisateur_detail JOIN ' . $nameprojetgeneral . '.action AS tab4 ON tab3.id_action = tab4.id_action WHERE tab3.id_action = :action ORDER by tab1.nom_utilisateur');
$req->bindParam(':action', $action, PDO::PARAM_INT);
$req->execute();
$reqUtil = $req->fetchAll();

?>
<main class="col-lg-10 modifAction-btn">
    <?php include_once 'includes/title.php' ?>
    <section class="content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2>Modification d'action :&nbsp;</h2>
        </div>
        <div class="modifAction  container-fluid col-lg-12">
            <form method="POST" class="form-signin" >
                <section class="row">
                    <div class="col-lg-12">
                        <h1>Action <?php echo($reqAct[0]['id_action']); ?>&nbsp;</h1>
                    </div>
                    <div class="col-lg-12">
                        <h3> Nom de l'action : <input type="text" name="inputNomAction" id="inputNomAction"
                                                      class="form-control" placeholder="Nom de l'action"
                                                      value="<?php
                                                      if (strlen($reqAct[0]['nom_action']) == 0) {
                                                          echo "Aucun prenom communiqué";
                                                      } else {
                                                          echo($reqAct[0]['nom_action']);
                                                      } ?>"
                                                      maxlength="255" required></h3>
                    </div>
                    <div class="col-lg-12">
                        <?php
                        echo "<p id=\"presSousAction\">";
                        $tabListeSousAction = array();
                        for ($i = 0; $i < sizeof($reqAct); $i++) {
                            $nom_sous_action = $reqAct[$i]['nom_sous_action'];
                            array_push($tabListeSousAction, $nom_sous_action);
                            if (isset($reqAct[0]['nom_sous_action'])) {
                                $num_saction = $i + 1;
                                echo "<span class=\"original\" id=\"test$num_saction\">";
                                echo "" . $num_saction . "
                                <input type = \"text\" name=\"inputNomSousAction$num_saction\" id=\"inputNomSousAction$num_saction\"
                                    class=\"form-control\" placeholder=\"Nom de la sous_action$num_saction\"
                                    value=\"" . $reqAct[$i]['nom_sous_action'] . "\"
                                    maxlength=\"500\" required>";
                                echo " <input type=\"button\" class=\"btn btn-danger col-lg-4\" id=\"supprimeraction$num_saction\" value=\"Supprimer Sous Action$num_saction\"
                               onClick=\"supaction($num_saction)\">";
                                echo "</span>";
                            } else {
                                $num_saction = $i + 1;
                                echo "<span class=\"original\" id=\"test$num_saction\">";
                                echo "" . $num_saction . "
                                <input type = \"text\" name=\"inputNomSousAction$num_saction\" id=\"inputNomSousAction$num_saction\"
                                    class=\"form-control\" placeholder=\"Nom de la sous_action$num_saction\"
                                    value=\"" . $reqAct[$i]['nom_sous_action'] . "\"
                                    maxlength=\"500\" required>";
                                echo " <input type=\"button\" class=\"btn btn-danger col-lg-4\" id=\"supprimeraction$num_saction\" value=\"Supprimer Sous Action$num_saction\"
                               onClick=\"supaction($num_saction)\">";
                                echo "</span>";
                                array_push($tabListeSousAction, "null");
                                $tabListeSousAction = array_values(array_filter($tabListeSousAction));
                            }
                        }
                        echo "</p>";


                        echo "<section class=\"row col-lg-12 justify-content-between\">
                        <!--Boutons qui servent a ajouter/supprimer l'ajout d'une sous-action-->
                        <input type=\"button\" class=\"btn btn-success col-lg-4\" id=\"ajout\" value=\"Ajouter Sous-Action\"
                               onClick=\"modifier(1)\">
                        </section>";

                        echo " <input type=\"hidden\" name=\"nbSousAction\" id=\"nbSousAction\" class=\"form-control\" value=\"" . sizeof($reqAct) . "\" required>";

                        ?>
                    </div>
                    <!--Programme qui permet d'afficher/supprimer les sous-actions-->
                    <script language="javascript">
                        var jArraySousAction = <?php echo json_encode($tabListeSousAction); ?>;

                        function modifier(increment) {

                            jArraySousAction.push('Nom de la sous_action');
                            var test = jArraySousAction.filter(jArraySousAction => jArraySousAction.length);

                            console.log(test);

                            var valeur = parseInt(document.getElementById('nbSousAction').value);
                            console.log(valeur);
                            valeur += increment;
                            document.getElementById('nbSousAction').value = valeur;
                            console.log(valeur);

                            var span = document.createElement("SPAN");
                            span.id = "test" + valeur;
                            span.textContent = valeur;
                            span.className = "original";

                            var input = document.createElement("INPUT");
                            input.name = "inputNomSousAction" + valeur;
                            input.id = "inputNomSousAction" + valeur;
                            input.placeholder = "Nom de la sous_action";
                            input.className = "form-control";
                            input.setAttribute("type", "text");
                            input.maxLength = 500;
                            input.required = true;

                            var bt = document.createElement("INPUT");
                            bt.id = "supprimeraction" + valeur;
                            bt.placeholder = "Nom de la sous_action" + valeur;
                            bt.className = "btn btn-danger col-lg-4";
                            bt.setAttribute("type", "button");
                            bt.value = "Supprimer Sous Action" + valeur;
                            console.log(increment, valeur);
                            bt.indice = valeur;
                            bt.onclick = function () {
                                supaction(this.indice)
                            };

                            span.appendChild(input);
                            span.appendChild(bt);
                            document.getElementById('presSousAction').appendChild(span);
                            document.getElementById('nbSousAction').value = valeur;
                            console.log(document.getElementById('nbSousAction').value);


                        }

                        function supaction(sous_action) {
                            var increment = 1;
                            console.log("array avant : " + jArraySousAction);
                            delete jArraySousAction[(sous_action-1)];
                            console.log("Delete : " + jArraySousAction);
                            jArraySousAction.splice((sous_action-1),1);
                            var test = jArraySousAction.filter(jArraySousAction => jArraySousAction.length);
                            console.log("array apres : " + test);
                            $("#test" + sous_action).remove();
                            $("#supprimeraction" + sous_action).remove();
                            var span = document.getElementsByClassName("original");
                            span = Array.prototype.slice.call(span);
                            console.log(span);
                            for (var i = 0; i < span.length; i++) {

                                var num_sous_action = i + 1;
                                console.log(span.length)
                                if (span[i].className == 'original') {

                                    var spanI = document.createElement("SPAN");
                                    spanI.id = "test" + num_sous_action;
                                    spanI.textContent = num_sous_action;
                                    spanI.className = "original";

                                    var input = document.createElement("INPUT");
                                    input.name = "inputNomSousAction" + num_sous_action;
                                    input.id = "inputNomSousAction" + num_sous_action;
                                    input.placeholder = "Nom de la sous_action";
                                    input.className = "form-control";
                                    input.setAttribute("type", "text");
                                    input.setAttribute("value", "" + test[i] + "");
                                    input.maxLength = 500;
                                    input.required = true;

                                    var bt = document.createElement("INPUT");
                                    bt.id = "supprimeraction" + num_sous_action;
                                    bt.placeholder = "Nom de la sous_action" + num_sous_action;
                                    bt.className = "btn btn-danger col-lg-4";
                                    bt.setAttribute("type", "button");
                                    bt.value = "Supprimer Sous Action" + num_sous_action;
                                    console.log(increment, num_sous_action);
                                    bt.indice = num_sous_action;
                                    bt.onclick = function () {
                                        supaction(this.indice)
                                    };

                                    spanI.appendChild(input);
                                    spanI.appendChild(bt);

                                    var parent = span[i].parentNode;
                                    parent.replaceChild(spanI, span[i]);

                                }
                            }

                            var valeur = parseInt(document.getElementById('nbSousAction').value);
                            console.log(valeur);
                            valeur -= increment;
                            document.getElementById('nbSousAction').value = valeur;
                            console.log(valeur);
                        }
                    </script>

                    <div class="col-lg-12 control-group">
                        <p class="presParticipant">
                            Participant :
                            <?php

                            $stack = array();

                            for ($i = 0; $i < sizeof($reqUtil); $i++) {
                                $id_utilisateur = $reqUtil[$i]['id_utilisateur'];
                                array_push($stack, $id_utilisateur);
                            }

                            $stmt = $bdd->prepare('SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur 
                                                            FROM commune.utilisateur as tab1
                                                            JOIN commune.participer AS tab2
                                                            ON tab1.id_utilisateur = tab2.id_utilisateur
                                                            JOIN commune.projet AS tab3 
                                                            ON tab2.id_projet = tab3.id_projet
                                                            WHERE tab3.nom_projet = :projetgeneral
                                                            ORDER BY nom_utilisateur');
                            $stmt->bindParam(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);
                            $stmt->execute();
                            $reqU = $stmt->fetchAll();
                            for ($i = 0; $i < sizeof($reqU); $i++) {
                                if (in_array(($reqU[$i]['id_utilisateur']), $stack)) {
                                    echo "<div class=\"custom-control custom-checkbox\">
                                        <input type=\"checkbox\" name=\"util[]\" class=\"custom-control-input\" id=\"Check$i\" value=\"" . $reqU[$i]['id_utilisateur'] . "\" checked>
                                        <label class=\"custom-control-label\" for=\"Check$i\">" . $reqU[$i]['nom_utilisateur'] . " " . $reqU[$i]['prenom_utilisateur'] . "</label> 
                                    </div>";
                                } else {
                                    echo "<div class=\"custom-control custom-checkbox\">
                                        <input type=\"checkbox\" name=\"util[]\" class=\"custom-control-input\" id=\"Check$i\" value=\"" . $reqU[$i]['id_utilisateur'] . "\">
                                        <label class=\"custom-control-label\" for=\"Check$i\">" . $reqU[$i]['nom_utilisateur'] . " " . $reqU[$i]['prenom_utilisateur'] . "</label> 
                                    </div>";
                                }
                            }
                            ?>
                        </p>
                        <input type="hidden" name="nbAction" id="nbAction" class="form-control nbAction"
                               value="<?php echo($reqAct[0]['id_action']); ?>" required>
                    </div>
                </section>
                <button class="bouton-submit btn btn-block text-uppercase" type="submit">Valider</button>
            </form>
        </div>
    </section>
</main>


<?php
include_once "includes/footer.php";
?>
