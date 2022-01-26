<?php

include "functions/config.php";

//On import le JSON
$get_q = file_get_contents('json/package.json');
$q = json_decode($get_q, true);

//On définit la langue par défaut en francais
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = 'fr';
}

//On récupère le parametre token et email de l'url
$token = $_GET['token'];
$email = $_GET['email'];

//On regarde si le token de l'url, l'email et la date d'expiration sont présentes et pas dépassés
$stmt = $bdd->prepare("SELECT tab1.mail_utilisateur, tab1.token_utilisateur, tab1.expiration_token_utilisateur FROM commune.utilisateur AS tab1 WHERE tab1.mail_utilisateur = ?");
$stmt->bindParam(1, $email, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll();

$expiracy_date = $result[0]['expiration_token_utilisateur'];
$now  = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Classe 2 - Reinitialisation de mot de passe</title>
  <!-- Paramètre pour Responsive. Pour définir une taille à l'écran du portable -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/import/normalize.css">
  <link rel="stylesheet" href="css/import/hamburgers.min.css">
  <link rel="stylesheet" href="css/import/sweetalert2.min.css">
  <link rel="stylesheet" href="css/personal/style.css" />
  <!--Permet au caroussel de fonctionner mais fait tout casse-->

  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
  <main class="form-tmplt pageResetpwd col-lg-12">
    <a class="back-btn-1" href="index.php" type="button">
      <i class="fas fa-home"></i>&nbsp;Retour à la page d'accueil</a>
    <div class="container">
      <div class="row">
          <div class="delete-container">
              <select class="custom-select language-select" name="countries" id="countries" id="input-language">
                  <option <?php if($_SESSION['lang'] == "fr") echo 'selected'; ?> value='fr' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="France">Français</option>
                  <option <?php if($_SESSION['lang'] == "en") echo 'selected'; ?> value='en' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="Anglais">Anglais</option>
              </select>
          </div>
          <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
                <img src="media/<?php echo $nameprojetgeneral ?>_logo_couleur.png">
                <?php
                //Si le token du parametre GET est égal au token dans la BDD alors on regarde si le token a pas expiré
                if ($token == $result[0]['token_utilisateur']) {
                    if($now < $expiracy_date) {
                        echo '<h5 class="card-title text-center">Mot de passe oublié</h5>
              <h6 class="card-subtitle text-center">Etape 2/2</h6>
              <form class="form-signin">
                  <div class="form-label-group input-form-password">
                    <input type="password" name="inputPwd" id="inputPwd" class="form-control" placeholder="Mot de passe" required autofocus>
                    <label for="inputPwd">Mot de passe</label>
                  </div>
                  <div class="form-label-group">
                    <input type="password" name="inputPwdConf" id="inputPwdConf" class="form-control" placeholder="Confirmer le mot de passe" required autofocus>
                    <label for="inputPwdConf">Confirmer le mot de passe</label>
                  </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Réinitialiser mon mot de passe</button>
                <input class="emailGet" type="hidden" value="'.$email.'">
              </form>';
                    } else {
                        echo '
              <h5 class="card-title text-center">Error token invalid</h5>
              <p>Il y a un problème dans le lien, 2 explications possible :</p>
              <ul>
                <li>Mauvais token</li>
                <li>Lien expiré (au bout de 1h)</li>
              </ul>
              <p>Il faut refaire le formulaire de réinitialisation de mot de passe.</p>
              <a href="forgotpassword.php" class="btn btn-lg btn-primary btn-block text-uppercase"><i class="fas fa-question"></i>&nbsp; Retourner au formulaire</a>';
                    }
                } else {
                    echo "
              <p>Le token n'est pas bon, auriez-vous essayer de faire un faux token ?</p>";
                }
                ?>
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

