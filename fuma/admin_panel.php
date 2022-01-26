<?php

include_once "includes/header.php";


if ($_SESSION['isSuperAdmin'] == 0) {
                     echo '<meta http-equiv="refresh" content="0; URL= admin_redirect.php">';





                    }
            else {

$stmt = $bdd->prepare("SELECT tab1.id_utilisateur, tab1.nom_utilisateur, tab1.prenom_utilisateur, tab1.statut_utilisateur, tab1.etablissement_utilisateur, tab1.mail_utilisateur, tab1.mail_utilisateur, tab1.actif_utilisateur , tab2.admin 
                                FROM commune.utilisateur AS tab1 
                                JOIN commune.participer AS tab2 
                                ON tab1.id_utilisateur = tab2.id_utilisateur
                                WHERE tab1.actif_utilisateur = '0'
                                ORDER BY `id_utilisateur` DESC");
$stmt->execute();
$donnees = $stmt->fetchAll();

?>
    <main class="col-lg-10 pageAdmin">
        <?php include_once "includes/title.php" ?>
        <section class="content-container row">
            <div class="col-lg-12">
                <h2>Dashboard administration</h2>
            </div>
            <div class="card-container col-lg-12">
                <div class="card w-100">
                    <h5 class="card-header">Gestion des accès aux projets</h5>
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="card-text">Pour autoriser les utilisateurs à accéder à un ou plusieurs projets.</p>
                        <a href="admin_utilisateurs_activation.php" class="LinkOut btn btn-primary">Accéder à la page</a>
                    </div>
                </div>
                <div class="card w-100">
                    <h5 class="card-header">Gestion des Utilisateurs</h5>
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="card-text">Pour modifier les informations personnelles d'un utilisateur.</p>
                        <a href="admin_utilisateurs.php" class="LinkOut btn btn-primary">Accéder à la page</a>
                    </div>
                </div>
                <div class="card w-100">
                    <h5 class="card-header">Gestion des Laboratoires</h5>
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-building"></i>
                        </div>
                        <p class="card-text">Pour modifier le contenu de la section laboratoire.</p>
                        <a href="admin_laboratoires.php" class="LinkOut btn btn-primary">Accéder à la page</a>
                    </div>
                </div>
                <div class="card w-100">
                    <h5 class="card-header">Gestion des Projets</h5>
                    <div class="card-body">
                        <div class="icon-container">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <p class="card-text">Pour ajouter un nouveau projet ou modifier et supprimer ceux existant.</p>
                        <a href="admin_projets.php" class="LinkOut btn btn-primary">Accéder à la page</a>
                    </div>
                </div>
            </div>




        </section>
    </main>
<?php
include_once "includes/footer.php";
}
?>
