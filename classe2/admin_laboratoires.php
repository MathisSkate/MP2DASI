<?php
include_once "includes/header.php";


if ($_SESSION['isSuperAdmin'] == 0) {
                     echo '<meta http-equiv="refresh" content="0; URL= admin_redirect.php">';





                    }
            else{  

?>
<main class="col-lg-10  pageAdminUser">
    <?php include_once 'includes/title.php' ?>
    <?php
    if ($_SESSION['isSuperAdmin'] == "1"){
        echo "";
    }
    ?>
    <section class="content-container row ">
        <div class="col-lg-12">
            <h1>Gestion des laboratoires</h1>
        </div>
        <div class="col-lg-12 options-container">
            <div class="filter">
                <select required="" class="filter-select" name="inputLabo" onchange="usgsChanged(this);">
                    <option value="" class="statut" selected="" disabled="">Trier par</option>
                    <option valueid="Labo" valuecol="1" valuedesc="asc" value="3">Nom dans l'ordre alphabétique</option>
                    <option valueid="Labo" valuecol="1" valuedesc="desc" value="4">Nom dans l'ordre alphabétique inversé</option>
                    <option valueid="Labo" valuecol="2" valuedesc="asc" value="5">Abréviation dans l'ordre alphabétique</option>
                    <option valueid="Labo" valuecol="2" valuedesc="desc" value="6">Abréviation dans l'ordre alphabétique inversé</option>
                </select>
            </div>
            <div class="add-data">
                <button type="button" class="admin-add-data-labo btn btn-primary btn-success">Ajouter un laboratoire</button>
            </div>
            <div class="search">
                <form method="GET" class="main-form-search">
                    <div class="input-container">
                        <input type="text" class="site-search" name="query" placeholder="Rechercher un laboratoire">
                        <button class="button-search-container">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>


        </div>
        <div class="col-lg-12">
            <table id="Labo" class="w-100 table table-responsive table-striped">
                <thead>
                <tr>
                    <th class="text-center" scope="col">Logo du laboratoire</th>
                    <th scope="col">Nom du laboratoire</th>
                    <th scope="col">Abréviation</th>
                    <th scope="col">Site du laboratoire</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody class="tbody-table-labo">

                </tbody>
            </table>
        </div>

    </section>
    <div class="modal fade" id="update_labo_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"  onclick="javascript:window.location.reload()" class="close" data-dismiss="modal"> <span aria-hidden="true" class=""><i class="fas fa-times-circle"></i></span><span class="sr-only">Fermer</span>

                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editer le laboratoire</h4>

                </div>
                <div class="modal-body">
                    <div class="message"></div>
                    <form novalidate enctype="multipart/form-data" method="post" class="update_labo">
                        <div class="col-lg-7 mx-auto">
                            <div class="col-lg-12">
                                <img src="" class="labo-logo">
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-file" style="margin-bottom: 1rem;">
                                    <input type="file" id="inputLogoLaboupdate" name="inputLogoLaboupdate" accept="image/png, image/jpeg" class="custom-file-input">
                                    <label class="custom-file-label font-weight-light" for="inputLogoLaboupdate">Choisir le logo du laboratoire</label>
                                </div>
                            </div>
                        </div>
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
                                    <input type="text" name="inputNom" id="inputNom" class="form-control" placeholder="Nom" required>
                                    <label for="inputNom">Nom</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input type="text" name="inputAbrevLabo" id="inputAbrevLabo" class="form-control" placeholder="Abréviation du laboratoire" required>
                                    <label for="inputAbrevLabo">Abréviation du laboratoire</label>
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
                                    <p>Description du laboratoire : </p>
                                    <textarea required class="form-control" maxlength="2000" name="inputDescLabo" id="inputDescLabo" placeholder="Description du laboratoire"></textarea>
                                </div>
                            </div>
                        </div>

                         <!-- _______________________error des checkbox____________________ -->


<script>

    

</script>
                       
                         <div class="form-group">
                            <p class="presProjet">
                                Projet(s) lié(s) (penser à regarder dans la colonne 'projet(s) lié(s)')
                                <?php
                                
                                   
                                
                                    //lister tous les projets existants   
                                $stmt = $bdd->prepare('SELECT
                                                                    tab1.id_projet,
                                                                    tab1.nom_projet
                                                                FROM
                                                                    commune.projet AS tab1');
                                                                    
                                $stmt->execute();
                                $reqP = $stmt->fetchAll();

                                

                                
                                
                                
                                

                                for ($i = 0; $i < sizeof($reqP); $i++) {
                                    $name=$reqP[$i]['id_projet'];
                                    echo "<div  class=\"custom-control custom-checkbox\">
                                        <input   type=\"checkbox\" name=\"projet[]\" class=\"custom-control-input\" id=\"Check$i\" value=\"" . $reqP[$i]['id_projet'] . "\">
                                        

                                        <label class=\"custom-control-label\" for=\"Check$i\">" . $reqP[$i]['nom_projet'] . "</label> 
                                        </div>";
                                }
                                ?>
                                <!-- _______________________ fin error des checkbox____________________ -->
                            </p>
                        </div>
                        





                        <div class="row justify-content-center">
                            <button type="submit" id="update"  name="update"  class="action-button update-labo-button btn btn-primary bg-success" value="update">Sauvegarder les changements</button>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" id="delete" onclick="javascript:window.location.reload()" name="delete" class="action-button delete-labo-button btn btn-primary bg-danger" value="delete">Supprimer le laboratoire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_labo_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class=""><i class="fas fa-times-circle"></i></span><span class="sr-only">Fermer</span>

                    </button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un laboratoire</h4>

                </div>
                <div class="modal-body">
                    <div class="message"></div>
                    <form novalidate enctype="multipart/form-data" method="post" class="update_labo">
                        <div class="col-lg-7 mx-auto">
                            <div class="col-lg-12">
                                <img src="" class="labo-logo">
                            </div>
                            <div class="col-lg-12">
                                <div class="custom-file" style="margin-bottom: 1rem;">
                                    <input required type="file" id="inputLogoLabo" name="inputLogoLaboadd" accept="image/png, image/jpeg" class="custom-file-input">
                                    <label class="custom-file-label font-weight-light" for="inputLogoLaboadd">Choisir le logo du laboratoire</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input readonly type="text" id="inputIdadd" name="inputId" class="text-center form-control" placeholder="ID">
                                    <label class="text-center" for="inputIdadd">ID (ajouté automatiquement)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group">
                                    <input type="text" name="inputNom" id="inputNomadd" class="form-control" placeholder="Nom" required>
                                    <label for="inputNomadd">Nom</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input type="text" name="inputAbrevLabo" id="inputAbrevLaboadd" class="form-control" placeholder="Abréviation du laboratoire" required>
                                    <label for="inputAbrevLaboadd">Abréviation du laboratoire</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <input required type="url" name="inputUrl" id="inputUrladd" class="form-control" placeholder="Site internet : http://" pattern="http://.*">
                                    <label for="inputUrladd">Site internet : http://</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-label-group flex-div">
                                    <p>Description du laboratoire : </p>
                                    <textarea class="form-control" maxlength="2000" name="inputDescLabo" id="inputDescLabo" placeholder="Description du laboratoire"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <input type="submit" class="add-labo-button btn btn-primary bg-success" value="Ajouter le laboratoire">
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