<?php
include_once "includes/header.php";


if ($_SESSION['isSuperAdmin'] == 0) {
                     echo '<meta http-equiv="refresh" content="0; URL= admin_redirect.php">';





                    }
            else{

?>
    <main class="col-lg-10 pageAdminUser">
        <?php include_once 'includes/title.php' ?>
        <section class="content-container row">
            <div class="col-lg-12">
                <h2>Gestion des utilisateurs</h2>
            </div>
            <div class="col-lg-12 options-container">
                <div class="filter">
                    <select required="" class="filter-select" name="inputLabo" onchange="usgsChanged(this);">
                        <option value="" class="statut" selected="" disabled="">Trier par</option>
                        <option valueid="Users" valuecol="0" valuedesc="asc" value="3">Nom dans l'ordre alphabétique</option>
                        <option valueid="Users" valuecol="0" valuedesc="desc" value="4">Nom dans l'ordre alphabétique inversé</option>
                        <option valueid="Users" valuecol="1" valuedesc="asc" value="5">Prénom dans l'ordre alphabétique</option>
                        <option valueid="Users" valuecol="1" valuedesc="desc" value="6">Prénom dans l'ordre alphabétique inversé</option>
                        <option valueid="Users" valuecol="2" valuedesc="asc" value="7">Statut dans l'ordre alphabétique</option>
                        <option valueid="Users" valuecol="2" valuedesc="desc" value="8">Statut dans l'ordre alphabétique inversé</option>
                        <option valueid="Users" valuecol="3" valuedesc="asc" value="9">Etablissement dans l'ordre alphabétique</option>
                        <option valueid="Users" valuecol="3" valuedesc="desc" value="10">Etablissement dans l'ordre alphabétique inversé </option>
                        <option valueid="Users" valuecol="4" valuedesc="asc" value="9">Email dans l'ordre alphabétique</option>
                        <option valueid="Users" valuecol="4" valuedesc="desc" value="10">Email dans l'ordre alphabétique inversé</option>
                    </select>
                </div>
                <div class="add-data">
                    <button type="button" class="admin-add-data btn btn-primary btn-success">Ajouter un utilisateur</button>
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
                <table id="Users" class="w-100 table table-responsive table-striped" style="font-size:0.9em;" >
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Etablissement</th>
                        <th scope="col">Email</th>
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="tbody-table-users">

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
                                        <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="inputEmail" type="email" id="inputEmail" class="form-control" placeholder="Votre adresse mail" required>
                                        <label for="inputEmail">Adresse email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="text" name="inputNom" id="inputNom" class="form-control" placeholder="Nom" required>
                                        <label for="inputNom">Nom</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="text" name="inputPrenom" id="inputPrenom" class="form-control" placeholder="Prénom" required>
                                        <label for="inputPrenom">Prénom</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-label-group flex-div">
                                        <p>Choisissez votre statut :</p>
                                        <select required class="userStatut-select" name="inputStatut">
                                            <option value="" class="userStatut" selected disabled="">Statut</option>
                                            <?php
                                            $stmt = $bdd->prepare("SHOW COLUMNS FROM commune.utilisateur");
                                            $stmt->execute();
                                            $tableActu = $stmt->fetchAll();
                                            $enumType = substr($tableActu['3']['Type'], 6, -2);
                                            $types = explode("','", $enumType);
                                            foreach ($types as $type){
                                                echo "<option value='".$type."'>".$type."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-label-group flex-div">
                                        <p>Choisissez votre laboratoire :</p>
                                        <select required class="userLabo-select" name="inputLabo">
                                            <option value="" class="userLabo-selected" selected="" disabled>Laboratoire</option>
                                            <?php
                                            $stmt = $bdd->prepare("SELECT id_laboratoire, nom_laboratoire
                                                                                 FROM commune.laboratoire");
                                            $stmt->execute();
                                            while ($result = $stmt->fetch())
                                            {echo "<option class='userLabo' value='".$result['id_laboratoire']."'>".$result['nom_laboratoire']."</option>";}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="text" name="inputEtab" id="inputEtab" class="form-control" placeholder="Etablissement" required>
                                        <label for="inputEtab">Etablissement</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="url" name="inputUrl" id="inputUrl" class="form-control" placeholder="Site internet : http://" pattern="http://.*">
                                        <label for="inputUrl">Site internet : http://</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-label-group flex-div">
                                        <p>Mission de l'utilisateur : </p>
                                        <textarea class="form-control" maxlength="1000" name="inputMission" id="inputMission"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-label-group flex-div">
                                        <p>Activité de l'utilisateur : </p>
                                        <select required class="userSuperadmin-select" name="userSuperadmin">
                                            <option value="" class="userSuperadmin-selected" selected="" disabled>Activité</option>
                                            <option class="userAdmin" value="0">Utilisateur</option>
                                            <option class="userAdmin" value="1">Superadmin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input name="update" type="submit" class="action-button edit-user-button btn btn-primary bg-success" value="Sauvegarder les changements">
                            </div>
                            <div class="row justify-content-center">
                                <input name="delete" type="submit" class="action-button delete-user-button btn btn-primary bg-danger" value="Supprimer l'utilisateur">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add_user_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class=""><i class="fas fa-times-circle"></i></span><span class="sr-only">Fermer</span>

                        </button>
                        <h4 class="modal-title" id="myModalLabel">Ajouter un utilisateur</h4>

                    </div>
                    <div class="modal-body">
                        <div class="message"></div>
                        <form enctype="multipart/form-data" method="post" class="add_user">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-label-group">
                                        <input disabled type="text" id="inputIdadd" name="inputId" class="text-center form-control" placeholder="ID">
                                        <label class="text-center" for="inputIdadd">ID (ajouté automatiquement)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="inputEmail" type="email" id="inputEmailadd" class="form-control" placeholder="Votre adresse mail" required>
                                        <label for="inputEmailadd">Adresse email</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="password" name="inputPassword" id="inputPasswordadd" class="form-control" placeholder="Mot de passe" required>
                                        <label for="inputPasswordadd">Mot de passe</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="text" name="inputNom" id="inputNomadd" class="form-control" placeholder="Nom" required>
                                        <label for="inputNomadd">Nom</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="text" name="inputPrenom" id="inputPrenomadd" class="form-control" placeholder="Prénom" required>
                                        <label for="inputPrenomadd">Prénom</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-label-group flex-div">
                                        <p>Choisissez votre statut :</p>
                                        <select required class="userStatut-select" name="inputStatut">
                                            <option value="" class="userStatut" selected disabled="">Statut</option>
                                            <?php
                                            $stmt = $bdd->prepare("SHOW COLUMNS FROM commune.utilisateur");
                                            $stmt->execute();
                                            $tableActu = $stmt->fetchAll();
                                            $enumType = substr($tableActu['3']['Type'], 6, -2);
                                            $types = explode("','", $enumType);
                                            foreach ($types as $type){
                                                echo "<option value='".$type."'>".$type."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-label-group flex-div">
                                        <p>Choisissez votre laboratoire :</p>
                                        <select required class="userLabo-select" name="inputLabo">
                                            <option value="" class="userLabo-selected" selected="" disabled>Laboratoire</option>
                                            <?php
                                            $stmt = $bdd->prepare("SELECT id_laboratoire, nom_laboratoire
                                                                                 FROM commune.laboratoire");
                                            $stmt->execute();
                                            while ($result = $stmt->fetch())
                                            {echo "<option class='userLabo' value='".$result['id_laboratoire']."'>".$result['nom_laboratoire']."</option>";}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="text" name="inputEtab" id="inputEtabadd" class="form-control" placeholder="Etablissement" required>
                                        <label for="inputEtabadd">Etablissement</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-label-group">
                                        <input type="url" name="inputUrl" id="inputUrladd" class="form-control" placeholder="Site internet : http://" pattern="http://.*">
                                        <label for="inputUrladd">Site internet : http://</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-label-group flex-div">
                                        <p>Mission de l'utilisateur : </p>
                                        <textarea class="form-control" maxlength="1000" name="inputMission" id="inputMission"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-label-group flex-div">
                                        <p>Activité de l'utilisateur : </p>
                                        <select required class="userSuperadmin-select" name="userSuperadmin">
                                            <option value="" class="userSuperadmin-selected" selected="" disabled>Activité</option>
                                            <option class="userAdmin" value="0">Utilisateur</option>
                                            <option class="userAdmin" value="1">Superadmin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <input type="submit" class="btn btn-primary" value="Ajouter l'utilisateur">
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
}
?>


