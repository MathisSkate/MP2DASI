<?php
//DESC : fichier qui met à jour les données d'un utilisateur lorsque l'on clique sur "Sauvegarder les changements" dans le modal d'edition d'un utilisateur dans la page "admin_utilisateur"

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$inputId = $_POST['inputId'];
$inputNom = $_POST['inputNom'];
$inputPrenom = $_POST['inputPrenom'];
$inputEtab = $_POST['inputEtab'];
$inputStatut= $_POST['inputStatut'];
$inputMission = $_POST['inputMission'];
$inputLabo = $_POST['inputLabo'];
$inputUrl = $_POST['inputUrl'];
$userSuperadmin = $_POST['userSuperadmin'];
$inputEmail = $_POST['inputEmail'];
$inputEmail = filter_var($inputEmail, FILTER_SANITIZE_STRING);


if(isset($_POST["inputId"]))
{
    $stmt = $bdd->prepare("
    UPDATE commune.utilisateur 
    SET nom_utilisateur = :nom, prenom_utilisateur = :prenom, statut_utilisateur = :statut, etablissement_utilisateur = :etab, mission_utilisateur = :mission, site_utilisateur = :site, mail_utilisateur = :email, super_admin = :superadmin, id_laboratoire = :labo   
    WHERE id_utilisateur = :user");
    $stmt->bindParam(":nom", $inputNom);
    $stmt->bindParam(":prenom", $inputPrenom);
    $stmt->bindParam(":statut", $inputStatut);
    $stmt->bindParam(":etab", $inputEtab);
    $stmt->bindParam(":mission", $inputMission);
    $stmt->bindParam(":site", $inputUrl);
    $stmt->bindParam(":email", $inputEmail);
    $stmt->bindParam(":superadmin", $userSuperadmin);
    $stmt->bindParam(":labo", $inputLabo);
    $stmt->bindParam(":user", $inputId);
    $stmt->execute();

    echo 1;
} else {
    echo 0;
}
?>