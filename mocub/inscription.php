<?php
include_once "functions/config.php";

//On import le JSON

$get_q = file_get_contents('json/package.json');
$q = json_decode($get_q, true);

//On définit la langue en francais par défaut

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = 'fr';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Classe 2 - Connexion</title>
    <!-- Paramètre pour Responsive. Pour définir une taille à l'écran du portable -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/import/normalize.css">
    <link rel="stylesheet" href="css/import/sweetalert2.min.css">
    <link rel="stylesheet" href="css/import/hamburgers.min.css">
    <link rel="stylesheet" href="css/personal/style.css" />
    <!--Permet au caroussel de fonctionner mais fait tout casse-->

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <main class="form-tmplt pageInsc col-lg-12">
            <a class="back-btn-1" href="index.php" type="button">
                <i class="fas fa-home"></i>&nbsp;Retour à la page d'accueil</a>

        <div class="container">
            <div >
                <div class="delete-container">
                    <select class="custom-select language-select" name="countries" id="countries" id="input-language">
                        <option <?php if($_SESSION['lang'] == "fr") echo 'selected'; ?> value='fr' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="France">Français</option>
                        <option <?php if($_SESSION['lang'] == "en") echo 'selected'; ?> value='en' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="Anglais">Anglais</option>
                    </select>
                </div>
                <div class="col-sm-10 col-md-9 col-lg-8 mx-auto">
                    <div class="card card-signin">
                        <div class="card-body">
                            <div class="col-sm-9 col-md-8 col-lg-6 mx-auto">
                                <img src="../media_commun/projet/<?php echo $nameprojetgeneral ?>_logo.png">
                            </div>
                            <h5 class="card-title text-center">Inscription à MOCUB</h5>
                            <div class="message"></div>
                            <form enctype="multipart/form-data" method="post" class="form-signin">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-label-group flex-div">
                                            <!--<p>Choisir votre image d'avatar :</p>-->
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choisissez votre image d'avatar</label>
                                                </div>
                                            </div>
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
                                        <div class="form-label-group">
                                            <input type="text" name="inputEtab" id="inputEtab" class="form-control" placeholder="Etablissement" required>
                                            <label for="inputEtab">Etablissement</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-label-group">
                                            <input type="url" name="inputUrl" id="url" class="form-control" placeholder="Site internet : http:// ou https://">
                                            <label for="url">Site internet : http:// ou https://</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-label-group flex-div">
                                            <p>Choisissez votre statut :</p>
                                            <select required class="statut-select" name="inputStatut">
                                                <option value="" class="statut" selected disabled="">Statut</option>
                                                <?php
                                                //On va chercher les enum de la BDD de la commune utilisateur

                                                $stmt = $bdd->prepare("SHOW COLUMNS FROM commune.utilisateur");
                                                $stmt->execute();
                                                $tableActu = $stmt->fetchAll();

                                                //On selectionne les enums des statut

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
                                            <select required class="labo-select" name="inputLabo">
                                                <option value="" class="statut" selected="" disabled="">Laboratoire</option>
                                                <?php

                                                //On va chercher les laboratoires dans la BDD

                                                $stmt = $bdd->prepare("SELECT id_laboratoire, nom_laboratoire
                                                                                 FROM commune.laboratoire");
                                                $stmt->execute();
                                                while ($result = $stmt->fetch())
                                                {echo "<option value='".$result['id_laboratoire']."'>".$result['nom_laboratoire']."</option>";}
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-label-group">
                                            <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="inputEmail" type="email" id="inputEmail" class="form-control" placeholder="Votre adresse mail" required>
                                            <label for="inputEmail">Adresse email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-label-group">
                                            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                                            <label for="inputPassword">Mot de passe</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4" style="margin: 0 auto;">
                                    <button class="bouton-submit btn btn-lg btn-primary btn-block text-uppercase" type="submit">S'inscrire</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back-btn-2" href="#" type="button" onclick="history.back(-1)">
            <i class="fas fa-caret-left"></i>&nbsp;Retour à la page précédente</a>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/import/sweetalert2.all.min.js"></script>
    <script src="js/import/jquery.dd.min.js"></script>
    <script src="js/personal/main.js"></script>
</body>
</html>
