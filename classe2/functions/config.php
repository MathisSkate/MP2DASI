<?php
//DESC : fichier qui permet de configurer le projet

// Variable ayant une valeur égale au nom de la BDD et du dossier
$nameprojetgeneral = "classe2";

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

function suppr_accents($str, $encoding='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $encoding);
    $str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
    $str = preg_replace('#&[^;]+;#', '', $str);
    return $str;
}

try{
    $bdd=new PDO('mysql:host=localhost;dbname='.$nameprojetgeneral.';charset=utf8','root','toor');
}
catch(Exception $e)
{
    die('erreur:'.$e->getMessage());
}

/*Pour afficher les actions*/
$req = $bdd->prepare("SELECT tab1.abreviation_projet FROM commune.projet AS tab1 
                                     WHERE tab1.nom_projet = :nomprojet");
$req->bindParam(':nomprojet', $nameprojetgeneral, PDO::PARAM_STR);
$req->execute();
$reqProjet = $req->fetchAll();

// Variable ayant une valeur qui sera affiché dans l'entête du site
if (strlen($reqProjet[0]['abreviation_projet']) == 0)
{
    $detailprojetgeneral = null;

}
else
{
    $detailprojetgeneral = "".$reqProjet[0]['abreviation_projet']."";
}

session_start();
?>
