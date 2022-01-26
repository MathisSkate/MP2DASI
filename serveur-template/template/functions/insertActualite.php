 <?php
/**
 * Created by PhpStorm.
 * User: doria
 * Date: 25/02/2019
 * Time: 23:50
 */

include_once "config.php";
require_once "insertMedia.php";


//Récupère différents éléments du formulaire
$type = $_POST['typeActualite'];
$titre = $_POST['titreActualite'];
$description = $_POST['descriptionActualite'];
$resume = $_POST['resumeActualite'];

//Récupère date et ID utilisateur connecté
$date = $_POST['dateActualite'];
$utilisateur = $_SESSION['idUserDetail'];

//Insertion actualité
$reqInsertActualite = $bdd->exec("
INSERT INTO actualite (type_actualite, titre_actualite, description_actualite, resume_actualite, date_actualite, id_utilisateur_detail) 
VALUES ('".$type."', '".$titre."', '".$description."', '".$resume."', '".$date."', ".$utilisateur.") ");

//Récupérer id new actu
$reqIdNewActu = $bdd->query("SELECT id_actualite FROM actualite ORDER BY id_actualite DESC LIMIT 1");
$idActu = $reqIdNewActu->fetch();

//Insertion média
insertMedia($bdd, $titre, 'actualite', $idActu['id_actualite']);

//Pour raffraichissement Ajax
echo 1;
?>
