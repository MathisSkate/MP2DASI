<?php
include_once "functions/config.php";

$get_q = file_get_contents('json/package.json');
$q = json_decode($get_q, true);

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
    <link rel="stylesheet" href="css/import/hamburgers.min.css">
    <link rel="stylesheet" href="css/import/sweetalert2.min.css">
    <link rel="stylesheet" href="css/personal/style.css" />
    <link rel="stylesheet" type="text/css" href="css/import/dd.css" />
    <link rel="stylesheet" type="text/css" href="css/import/flags.css" />
    <!--Permet au caroussel de fonctionner mais fait tout casse-->

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>
    <main class="form-tmplt pageConnect col-lg-12">
            <a class="back-btn-1" href="index.php" type="button">
                <i class="fas fa-home"></i>&nbsp;Retour à la page d'accueil</a>
        <div class="container">
            <div class="delete-container">
                <select class="custom-select language-select" name="countries" id="countries" id="input-language">
                    <option <?php if($_SESSION['lang'] == "fr") echo 'selected'; ?> value='fr' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="France">Français</option>
                    <option <?php if($_SESSION['lang'] == "en") echo 'selected'; ?> value='en' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="Anglais">Anglais</option>
                </select>
            </div>
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
                    <div class="card card-signin">
                        <div class="card-body">
                            <img src="../media_commun/projet/<?php echo $nameprojetgeneral ?>_logo.png">
                            <h5 class="card-title text-center">Se connecter à Classe 2</h5>
                            <div class="message"></div>
                            <form method="post" class="form-signin">
                                <div class="form-label-group">
                                    <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="inputEmail" type="email" id="inputEmail" class="form-control" placeholder="Votre adresse mail" required autofocus>
                                    <label for="inputEmail">Adresse email</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                                    <label for="inputPassword">Mot de passe</label>
                                </div>
                                <button class="connection-form btn btn-lg btn-primary btn-block text-uppercase">Se connecter</button>
                                <hr class="my-4">
                                <a href="forgotpassword.php" class="btn btn-lg btn-google btn-block text-uppercase"><i class="fas fa-question"></i> J'ai oublié mon mot de passe</a>
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
