<?php
include_once "includes/header.php";

?>
<main class="col-lg-10 ajoutAction-btn">
    <?php include_once 'includes/title.php' ?>
    <section class="content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2>Création d'action :&nbsp;</h2>
        </div>
        <div class="ajoutAction container-fluid col-lg-12">
            <article class="col-lg-12">

                <form method="post" class="form-signin">
                    <section class="row">
                        <article class="col-lg-12">
                            <p>
                                Nom de l'action :
                                <input type="text" name="inputNomAction" id="inputNomAction"
                                       class="form-control" placeholder="Nom de l'action"
                                       maxlength="255" required>

                            </p>
                        </article>
                    </section>
                    <!--Les sous-actions 'input' vont s'afficher ici-->
                    <section id="s-a">

                    </section>
                    <section class="row col-lg-12 justify-content-between">
                        <!--Boutons qui servent a ajouter/supprimer l'ajout d'une sous-action-->
                        <input  type="button" class="btn btn-success col-lg-4 p-2" id="ajout" value="Ajouter Sous-Action"
                               onClick="modifier(1)">
                        <input type="button" class="btn btn-danger col-lg-4 p-2" id="supprimer"
                               value="Supprimer Sous Action"
                               onClick="modifier(1)">
                    </section>
                    <!--Programme qui permet d'afficher/supprimer les sous-actions-->
                    <script language="javascript">
                        var valeur = 0;

                        function modifier(increment) {
                            document.getElementById('nbSousAction').value = valeur;
                            document.getElementById('ajout').onclick = function () {
                                valeur += increment;

                                var p = document.createElement("P");
                                p.name = "inputNomSousAction" + valeur;
                                p.id = "inputNomSousAction" + valeur;

                                var input = document.createElement("INPUT");
                                input.name = "inputNomSousAction" + valeur;
                                input.id = "inputNomSousAction" + valeur;
                                input.placeholder = "Nom de la sous_action" + valeur;
                                input.className = "form-control";
                                input.setAttribute("type", "text");
                                input.maxLength = 500;
                                input.required = true;

                                p.appendChild(input);
                                document.getElementById('s-a').appendChild(p);
                                document.getElementById('nbSousAction').value = valeur;
                            };
                            document.getElementById('supprimer').onclick = function () {
                                var sa = document.getElementById("s-a");
                                var nsa = document.getElementById("inputNomSousAction" + valeur);

                                sa.removeChild(nsa);
                                valeur -= increment;
                                document.getElementById('nbSousAction').value = valeur;

                            };
                        }
                    </script>
                    <!--input qui garde en memoire le nombre de sous-action-->
                    Lien vers la video :
                    <input type="url" name="inputLienAction" id="inputLienAction"
                           class="form-control" placeholder="Lien vers la video de l'action (si plusieurs videos, faire : video1;video2;)"
                           maxlength="255">
                    <p>
                        <input type="hidden" name="nbSousAction" id="nbSousAction" class="form-control" value="0"
                               required>
                    </p>
                    <button class="bouton-submit btn btn-block text-uppercase" type="submit">Valider</button> </form>

                </form>
            </article>
        </div>
    </section>
</main>


<?php
include_once "includes/footer.php";
?>
