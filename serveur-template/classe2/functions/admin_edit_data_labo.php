<?php

//DESC : fonction qui met les données dans le modal quand on clique sur "éditer"  dans le panel admin des laboratoires

//inclure le fichier qui possède la  variable de la BDD

include "config.php";

//On récupère les données du formulaire

$idlabo = $_POST['id_user'];
$idlabo = filter_var($idlabo, FILTER_SANITIZE_STRING);

if(isset($_POST["id_user"]))
{
    $stmtLabo = $bdd->prepare("SELECT
                                            tab1.id_laboratoire,
                                            tab1.nom_laboratoire,
                                            tab1.abreviation_laboratoire,
                                            tab1.img_laboratoire,
                                            tab1.site_laboratoire,
                                            tab1.description_laboratoire
                                        FROM
                                            commune.laboratoire AS tab1
                                        WHERE 
                                            tab1.id_laboratoire = :idlabo");
    $stmtLabo->bindParam(':idlabo', $idlabo, PDO::PARAM_STR);
    $stmtLabo->execute();

    $result = $stmtLabo->fetch();

    $result = json_encode($result);

    echo $result;
}
?>