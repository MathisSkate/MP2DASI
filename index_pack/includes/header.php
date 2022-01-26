<?php
//DESC : fichier qui permet de configurer le projet
session_start();
// Variable ayant une valeur égale au nom de la BDD et du dossier
$nameprojetgeneral = "commune";

$get_q = file_get_contents('index_pack/json/package.json');
$q = json_decode($get_q, true);

//On définit la langue fr par défaut

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = 'fr';
}

try {
    $bdd=new PDO('mysql:host=localhost;dbname='.$nameprojetgeneral.';charset=utf8','root','root');
} catch (Exception $e) {
    die('erreur:' . $e->getMessage());
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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $q[$_SESSION['lang']]['header']['a']?></title>
    <!-- Paramètre pour Responsive. Pour définir une taille à l'écran du portable -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="index_pack/css/import/normalize.css">
    <link rel="stylesheet" href="index_pack/css/import/hamburgers.min.css">
    <link rel="stylesheet" href="index_pack/css/personal/style.css"/>

    <!--Permet au caroussel de fonctionner mais fait tout casse-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,500,500i,700,700i"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index_pack/css/import/dd.css"/>
    <link rel="stylesheet" type="text/css" href="index_pack/css/import/flags.css"/>
    <meta name="keywords" content="site web, gestion de projets, recherche, normandie, litis, nimec, idees, lmah, classe2, classe, devport, vallée de la seine, sflog, structure fédérative en logistique">

</head>
<body class="container-fluid">
<div class="content-container col-lg-12 row">
    <div class="col-lg-5"></div>
    <div class="col-lg-5"></div>
    <div class="input-group col-lg-2 mb-3">
        <select class="custom-select language-select" name="countries" id="countries" id="input-language">
            <option <?php if($_SESSION['lang'] == "fr") echo 'selected'; ?> value='fr' data-image="index_pack/media/image/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="France">Français</option>
            <option <?php if($_SESSION['lang'] == "en") echo 'selected'; ?> value='en' data-image="index_pack/media/image/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="Anglais">Anglais</option>
        </select>
    </div>
    <div class="titreProjet col-lg-12">
        <h1><?php echo $q[$_SESSION['lang']]['header']['a']?></h1>
    </div>
</div>

<div class="row">
