<?php
include_once "functions/config.php";

//On récupère le JSON

$get_q = file_get_contents('json/package.json');
$q = json_decode($get_q, true);

//On définit la langue fr par défaut

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

function dateFormat($dateBDD, $lang)
{
    $lastmodified = $dateBDD;

    list($date) = explode(" ", $lastmodified);

    list($year, $month, $day) = explode("-", $date);

    $monthsFr = array("janvier", "février", "mars", "avril", "mai", "juin",
        "juillet", "août", "septembre", "octobre", "novembre", "décembre");

    $monthsEn = array("January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December");


    if ($lang == "fr") {
        $lastmodified = "$day " . $monthsFr[$month - 1] . " $year";
    } else {
        $lastmodified = "" . $monthsEn[$month - 1] . " $day, $year";
    }


    return $lastmodified;
}

//On définit la variable session super admin à 0 par défaut

if(!isset($_SESSION['isSuperAdmin'])){
    $_SESSION['isSuperAdmin'] = 0;
}

//On récupère toutes les infos de l'utilisateur connecté

if (isset($_SESSION['emailUser'])) {
    $email = $_SESSION['emailUser'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $isAdmin = $_SESSION['isAdmin'];

    $stmt = $bdd->prepare("SELECT nom_utilisateur, prenom_utilisateur, statut_utilisateur, photo_utilisateur, mail_utilisateur
                                         FROM commune.utilisateur
                                         WHERE mail_utilisateur = ?");
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();

    $resultUser = $stmt->fetchAll();
    $resultUser = $resultUser['0'];

    $nomUser = $resultUser['nom_utilisateur'];
    $prenomUser = $resultUser['prenom_utilisateur'];
    $statutUser = $resultUser['statut_utilisateur'];
    $photoUser = $resultUser['photo_utilisateur'];
    $mailUser = $resultUser['mail_utilisateur'];
}

/*Pour afficher les actions*/
$req = $bdd->prepare('SELECT id_action from ' . $nameprojetgeneral . '.action');
$req->execute();
$reqAct = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo strtoupper($nameprojetgeneral)?></title>
    <!-- Paramètre pour Responsive. Pour définir une taille à l'écran du portable -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/import/normalize.css">
    <link rel="stylesheet" href="css/import/hamburgers.min.css">
    <link rel="stylesheet" href="css/personal/style.css"/>

    <!-- Include FROALA -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />

    <!--Permet au caroussel de fonctionner mais fait tout casse-->

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/import/dd.css" />
    <link rel="stylesheet" type="text/css" href="css/import/flags.css" />

    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

</head>
<body class="container-fluid">
<div class="row">
    <nav id="menuFixed" class="col-lg-2 sticky-top navbar navbar-expand-lg sticky-top logoPosition">
        <a class="nav-item topnav" href="index.php"><img border="0" class="img-brand" alt="Logo"
                                                              src="media/<?php echo $nameprojetgeneral?>_logo.png" width="200" height="200"></a>
        <button type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle Navigation"
                class="navbar-toggler hamburger hamburger--collapse hamburger--accessible js-hamburger">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
            <span class="hamburger-label"><?php echo $q[$_SESSION['lang']]['header']['a']?></span>
        </button>
        <div class="navbar nav-full collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php"><?php echo $q[$_SESSION['lang']]['header']['b']?></a>
                </li>
                <li class="text-right nav-item tn-group dropdown">
                    <a href="actions.php"><?php echo $q[$_SESSION['lang']]['header']['c']?></a>
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" >
                        <span class="sr-only"><?php echo $q[$_SESSION['lang']]['header']['d']?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        for ($i = 0; $i < sizeof($reqAct); $i++) {
                            echo "<li class=\"dropdown-item\">
                            <a class=\"nav-link\" href=\"action.php?action=" . $reqAct[$i]['id_action'] . "\">"."". $q[$_SESSION['lang']]['header']['e'] ."". " ".$reqAct[$i]['id_action']."</a>
                        </li>";
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="laboratoire.php"><?php echo $q[$_SESSION['lang']]['header']['f']?> <span class="flag-icon flag-icon-fr"> </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="participants.php"><?php echo $q[$_SESSION['lang']]['header']['t']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="actualites.php"><?php echo $q[$_SESSION['lang']]['header']['g']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="publications.php"><?php echo $q[$_SESSION['lang']]['header']['h']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="theses.php"><?php echo $q[$_SESSION['lang']]['header']['i']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><?php echo $q[$_SESSION['lang']]['header']['j']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link txt-menu" href="#"><i class="fas fa-search"></i></a>
                </li>
            </ul>
            <div class="bottom-footer-container">
                <?php
                //On affiche les divs ci-dessous seulement si l'utilisateur est connecté
                if (isset($_SESSION['emailUser'])) {
                    echo "
            <div class=\"dropup\">
                <button type=\"button\" class=\"btn btn-secondary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    " . $q[$_SESSION['lang']]['header']['k'] . " $prenomUser
                </button>
                <div class=\"dropdown-menu\">
                    <a class=\"dropdown-item\" href=\"profil.php?mail=$mailUser\"><i class=\"fas fa-user-alt\"></i>&nbsp; ". $q[$_SESSION['lang']]['header']['l']."</a>
  
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"logout dropdown-item\" href=\"#\"><i class=\"fas fa-sign-out-alt\"></i>&nbsp; ". $q[$_SESSION['lang']]['header']['m'] ."</a>
                </div>
            </div>";
                    //On affiche les divs ci-dessous seulement si l'utilisateur est superadmin
                    if ($_SESSION['isSuperAdmin'] == 1) {
                        echo "
            <div class='panel-admin'>
                        <a class=\"btn btn-secondary btn-admin\" href=\"admin_panel.php\" type=\"button\"><i class=\"fas fa-user\"></i>&nbsp;". $q[$_SESSION['lang']]['header']['n']."</a>
            </div>
                    ";
                    }
                } else {
                    echo "
            <a class=\"btn-connection\" href=\"connection.php\" type=\"button\"><i class=\"fas fa-user\"></i>&nbsp;". $q[$_SESSION['lang']]['header']['o'] ."</a>
            <a class=\"btn-inscription\" href=\"inscription.php\" type=\"button\"><i class=\"fas fa-user\"></i>&nbsp;". $q[$_SESSION['lang']]['header']['p'] ."</a>";
                }
                ?>
            </div>
        </div>


        <div class="bottom-footer-container">
            <?php
            //On affiche les divs ci-dessous seulement si l'utilisateur est connecté
            if (isset($_SESSION['emailUser'])) {
                echo "
            <div class=\"dropup\">
                <button type=\"button\" class=\"btn btn-secondary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    " . $q[$_SESSION['lang']]['header']['k'] . " $prenomUser
                </button>
                <div class=\"dropdown-menu\">
                    <a class=\"dropdown-item\" href=\"profil.php?mail=$mailUser\"><i class=\"fas fa-user-alt\"></i>&nbsp; ". $q[$_SESSION['lang']]['header']['l']."</a>
  
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"logout dropdown-item\" href=\"#\"><i class=\"fas fa-sign-out-alt\"></i>&nbsp; ". $q[$_SESSION['lang']]['header']['m'] ."</a>
                </div>
            </div>";
                //On affiche les divs ci-dessous seulement si l'utilisateur est superadmin
                if ($_SESSION['isSuperAdmin'] == 1) {
                    echo "
            <div class='panel-admin'>
                        <a class=\"btn btn-secondary btn-admin\" href=\"admin_panel.php\" type=\"button\"><i class=\"fas fa-user\"></i>&nbsp;". $q[$_SESSION['lang']]['header']['n']."</a>
            </div>
                    ";
                }
            } else {
                echo "
            <a class=\"btn-connection\" href=\"connection.php\" type=\"button\"><i class=\"fas fa-user\"></i>&nbsp;". $q[$_SESSION['lang']]['header']['o'] ."</a>
            <a class=\"btn-inscription\" href=\"inscription.php\" type=\"button\"><i class=\"fas fa-user\"></i>&nbsp;". $q[$_SESSION['lang']]['header']['p'] ."</a>";
            }
            ?>
        </div>
    </nav>
