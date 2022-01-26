<?php
include_once "includes/header.php";
?>
<main class="col-lg-10 pageAdminProjet">
    <?php include_once 'includes/title.php' ?>
    <?php
    ?>
    <section class="content-container row">
        <div class="col-lg-12">
            <h2>Gestion des projets</h2>
        </div>
        <div class="col-lg-12 options-container">
            <div class="filter">
                <select required="" class="filter-select" name="inputLabo" onchange="usgsChanged(this);">
                    <option value="" class="statut" selected="" disabled="">Trier par</option>
                    <option valueid="Projets" valuecol="0" valuedesc="asc" value="3">ID dans l'ordre croissant</option>
                    <option valueid="Projets" valuecol="0" valuedesc="desc" value="4">ID dans l'ordre décroissant
                    </option>
                    <option valueid="Projets" valuecol="1" valuedesc="asc" value="5">Nom dans l'ordre alphabétique
                    </option>
                    <option valueid="Projets" valuecol="1" valuedesc="desc" value="6">Nom dans l'ordre alphabétique
                        inversé
                    </option>
                    <option valueid="Projets" valuecol="2" valuedesc="asc" value="7">Date de début dans l'ordre
                        alphabétique
                    </option>
                    <option valueid="Projets" valuecol="2" valuedesc="desc" value="8">Date de début dans l'ordre
                        alphabétique inversé
                    </option>
                    <option valueid="Projets" valuecol="3" valuedesc="asc" value="7">Date de fin dans l'ordre
                        alphabétique
                    </option>
                    <option valueid="Projets" valuecol="3" valuedesc="desc" value="8">Date de fin dans l'ordre
                        alphabétique inversé
                    </option>
                </select>
            </div>
            <div class="add-data">
                <button type="button" class="admin-add-data btn btn-primary btn-success">Ajouter un projet</button>
            </div>
            <div class="search">
                <form method="GET" class="main-form-search">
                    <div class="input-container">
                        <input type="text" class="site-search" name="query" placeholder="Rechercher un projet">
                        <button class="button-search-container">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>


        </div>
        <div class="col-lg-12">
            <table id="Projets" class="w-100 table table-responsive table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Abreviation</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Date de debut</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col">Image presentation</th>

                    <th class="text-center" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody class="tbody-table-projet">

                </tbody>
            </table>
        </div>

    </section>
    <div class="modal fade" id="update_projet_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class=""><i
                                    class="fas fa-times-circle"></i></span><span class="sr-only">Fermer</span>

                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editer le projet</h4>

                </div>
                <div class="modal-body">
                    <div class="message"></div>
                    <form enctype="multipart/form-data" method="post" class="update_projet">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input readonly type="text" id="inputId" name="inputId"
                                           class="text-center form-control" placeholder="ID">
                                    <label class="text-center" for="inputId">ID</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mx-auto">
                            <div class="col-lg-12">
                                <img src="" class="projet-logo">
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-file" style="margin-bottom: 1rem;">
                                    <input type="file" id="inputLogoProjetupdate" name="inputLogoProjetupdate"
                                           accept="image/png, image/jpeg" class="custom-file-input">
                                    <label class="custom-file-label font-weight-light" for="inputLogoProjetupdate">Choisir
                                        le logo du projet</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input type="text" name="inputNomupdate" id="inputNomupdate" class="form-control"
                                           placeholder="Nom" required>
                                    <label for="inputNomupdate">Nom du projet</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input type="text" name="inputAbreviationupdate" id="inputAbreviationupdate"
                                           class="form-control" placeholder="Abreviation du projet" required>
                                    <label for="inputAbreviationupdate">Abreviation du projet*</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group flex-div">
                                    <p>Résume du projet : </p>
                                    <textarea class="form-control" name="inputResumeupdate"
                                              id="inputResumeupdate" placeholder="Résume du projet"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input type="date" name="inputDateDebutupdate" id="inputDateDebutupdate"
                                           class="form-control" placeholder="Date de début">
                                    <label for="inputDateDebutupdate">Date de début</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input type="date" name="inputDateFinupdate" id="inputDateFinupdate"
                                           class="form-control" placeholder="Date de fin">
                                    <label for="inputDateFinupdate">Date de fin</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mx-auto">
                            <div class="col-lg-12">
                                <img src="" class="media-logo">
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-file" style="margin-bottom: 1rem;">
                                    <input type="file" id="inputMediaProjetupdate" name="inputMediaProjetupdate"
                                           accept="image/png, image/jpeg, video/*" class="custom-file-input">
                                    <label class="custom-file-label font-weight-light" for="inputMediaProjetupdate">Choisir
                                        le media du projet</label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <input name="update" id="update" type="submit"
                                   class="action-button edit-projet-button btn btn-primary bg-success"
                                   value="Sauvegarder les changements">
                        </div>
                        <div class="row justify-content-center">
                            <input name="delete" id="delete" type="submit"
                                   class="action-button delete-projet-button btn btn-primary bg-danger"
                                   value="Supprimer le projet">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_projet_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class=""><i
                                    class="fas fa-times-circle"></i></span><span class="sr-only">Fermer</span>

                    </button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un projet</h4>

                </div>
                <div class="modal-body">
                    <div class="message"></div>
                    <form enctype="multipart/form-data" method="post" class="add_user">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input readonly type="text" id="inputIdadd" name="inputIdadd"
                                           class="text-center form-control" placeholder="ID">
                                    <label class="text-center" for="inputIdadd">ID (ajouté automatiquement)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mx-auto">
                            <div class="col-lg-12">
                                <img src="" class="projet-logo">
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-file" style="margin-bottom: 1rem;">
                                    <input type="file" id="inputLogoProjetadd" name="inputLogoProjetadd"
                                           accept="image/png, image/jpeg" class="custom-file-input">
                                    <label class="custom-file-label font-weight-light" for="inputLogoProjetadd">Choisir
                                        le logo du projet</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input type="text" name="inputNomadd" id="inputNomadd" class="form-control"
                                           placeholder="Nom" required>
                                    <label for="inputNomadd">Nom du projet*</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input type="text" name="inputAbreviationadd" id="inputAbreviationadd"
                                           class="form-control" placeholder="Abreviation du projet" required>
                                    <label for="inputAbreviationadd">Abreviation du projet*</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group flex-div">
                                    <p>Résume du projet : </p>
                                    <textarea class="form-control" name="inputResumeadd"
                                              id="inputResumeadd" placeholder="Résume du projet"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input type="date" required name="dateDebutadd" id="dateDebutadd"
                                           class="form-control" placeholder="Date de début*">
                                    <label for="dateDebutadd">Date de début*</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input type="date" name="dateFinadd" id="dateFinadd" class="form-control"
                                           placeholder="Date de fin">
                                    <label for="dateFinadd">Date de fin</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mx-auto">
                            <div class="col-lg-12">
                                <img src="" class="projet-logo">
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-file" style="margin-bottom: 1rem;">
                                    <input type="file" id="inputMediaProjetadd" name="inputMediaProjetadd"
                                           accept="image/png, image/jpeg, video/*" class="custom-file-input">
                                    <label class="custom-file-label font-weight-light" for="inputMediaProjetadd">Choisir
                                        le media du projet</label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <input type="submit" class="btn btn-primary" value="Ajouter le projet">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="resume_projet_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class=""><i
                                    class="fas fa-times-circle"></i></span><span class="sr-only">Fermer</span>

                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editer le projet</h4>

                </div>
                <div class="modal-body">
                    <div class="message"></div>
                    <form enctype="multipart/form-data" method="post" class="resume_projet">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input readonly type="text" id="inputIdread" name="inputIdread"
                                           class="text-center form-control" placeholder="ID">
                                    <label class="text-center" for="inputIdread ">ID</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group flex-div">
                                    <p>Résume du projet : </p>
                                    <textarea style="resize: none;" rows="15" cols="33" class="form-control" maxlength="2000" name="inputResumeread"
                                              id="inputResumeread" placeholder="Pas de resume" readonly></textarea>
                                </div>
                            </div>
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


