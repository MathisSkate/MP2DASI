<?php
include_once "includes/header.php";

$stmt = $bdd->prepare("SELECT tab1.nom_projet FROM commune.projet AS tab1 ");
$stmt->execute();
?>
<main class="col-lg-10 pageAdminUserActivate">
    <?php include_once 'includes/title.php' ?>
    <section class="content-container row">
        <div class="col-lg-12">
            <h2>Gestion accès aux projets</h2>
        </div>
        <div class="col-lg-12 options-container">
            <div class="filter">
                <select required="" class="filter-select" name="inputLabo" onchange="usgsChanged(this);">
                    <option value="" class="statut" selected="" disabled="">Trier par</option>
                    <option valueid="Users" valuecol="0" valuedesc="asc" value="3">Nom dans l'ordre alphabétique</option>
                    <option valueid="Users" valuecol="0" valuedesc="desc" value="4">Nom dans l'ordre alphabétique inversé</option>
                    <option valueid="Users" valuecol="1" valuedesc="asc" value="5">Prénom dans l'ordre alphabétique</option>
                    <option valueid="Users" valuecol="1" valuedesc="desc" value="6">Prénom dans l'ordre alphabétique inversé</option>
                    <option valueid="Users" valuecol="4" valuedesc="asc" value="9">Email dans l'ordre alphabétique</option>
                    <option valueid="Users" valuecol="4" valuedesc="desc" value="10">Email dans l'ordre alphabétique inversé</option>
                </select>
            </div>
            <div class="search">
                <form method="GET" class="main-form-search">
                    <div class="input-container">
                        <input type="text" class="site-search" name="query" placeholder="Rechercher un utilisateur">
                        <button class="button-search-container">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>


        </div>
        <div class="col-lg-12">
            <table id="Users" class="w-100 table table-responsive table-striped">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody class="tbody-table-users-active">

                </tbody>
            </table>
        </div>

    </section>
    <div class="modal fade" id="update_user_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class=""><i class="fas fa-times-circle"></i></span><span class="sr-only">Fermer</span>

                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editer l'utilisateur</h4>

                </div>
                <div class="modal-body">
                    <div class="message"></div>
                    <form enctype="multipart/form-data" method="post" class="add_user">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input readonly type="text" id="inputId" name="inputId" class="text-center form-control" placeholder="ID">
                                    <label class="text-center" for="inputId">ID</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input readonly pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="inputEmail" type="email" id="inputEmail" class="form-control" placeholder="Votre adresse mail" required>
                                    <label for="inputEmail">Adresse email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input readonly type="text" name="inputNom" id="inputNom" class="form-control" placeholder="Nom" required>
                                    <label for="inputNom">Nom</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input readonly type="text" name="inputPrenom" id="inputPrenom" class="form-control" placeholder="Prénom" required>
                                    <label for="inputPrenom">Prénom</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-lg-12'>
                                <h4 class="modal-title" >Accès au projet : </h4>
                                <p style="margin-bottom: 2rem" class="modal-title">Si vous voulez qu'un utilisateur n'ai pas accès au projet, ne cochez aucune case de celui-ci.</p>
                            </div>
                            <div class="col-lg-12 card-checkbox-container">
                                <?php
                                while ($donnees = $stmt->fetch()){
                                    echo "
                               <div class=\"card col-lg-5 project-access\">
                                  <div class=\"card-header\">
                                        <label class=\"form-check-label\">
                                            <input class=\"form-check-input check-project\" type=\"checkbox\" value=\"x\" name=\"".$donnees['nom_projet']."-project\">
                                             ".$donnees['nom_projet']."
                                        </label>
                                  </div>
                                  <ul class=\"list-group list-group-flush\">
                                    <li class=\"list-group-item\">
                                        <label class=\"form-check-label\">
                                            <input class=\"form-check-input child \" disabled type=\"radio\" value=\"0\" name=\"".$donnees['nom_projet']."-radio\">
                                            Utilisateur
                                        </label>
                                    </li>
                                    <li class=\"list-group-item\">
                                        <label class=\"form-check-label\">
                                            <input class=\"form-check-input child \" disabled type=\"radio\" value=\"1\" name=\"".$donnees['nom_projet']."-radio\">
                                            Administrateur
                                        </label>
                                    </li>
                                  </ul>
                                </div>";
                                }?>
                            </div>;
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="edit-user-button btn btn-primary bg-success">Sauvegarder les changements</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include_once "includes/footer.php";
?>


