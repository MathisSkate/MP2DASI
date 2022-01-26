<?php
//DESC : fichier qui met à jour les données d'un utilisateur lorsque l'on clique sur "Sauvegarder les changements" dans le modal d'edition d'un utilisateur dans la page "admin_utilisateur"

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$inputId = $_POST['inputId'];
$inputNom = $_POST['inputNom'];
$inputPrenom = $_POST['inputPrenom'];
$inputEtab = $_POST['inputEtab'];
$inputStatut = $_POST['inputStatut'];
$inputMission = $_POST['inputMission'];
$inputPortrait = $_POST['inputPortrait'];
$inputLabo = $_POST['inputLabo'];
$inputUrl = $_POST['inputUrl'];
$userSuperadmin = $_POST['userSuperadmin'];
$inputEmail = $_POST['inputEmail'];
$inputEmail = filter_var($inputEmail, FILTER_SANITIZE_STRING);

/*Pour rechercher la photo*/
$req = $bdd->prepare("SELECT photo_utilisateur from commune.utilisateur where commune.utilisateur.id_utilisateur = '$inputId' ");
$req->execute();
$reqPhoto = $req->fetchAll();

$inputAvatar = $_FILES['inputLogoUtilisateurupdate'];
$path = $inputAvatar['name'];
$avatarExt = pathinfo($path, PATHINFO_EXTENSION);
if ($inputAvatar['size'] == 0 && (sizeof($reqPhoto) == 0) ) {
    $nameAvatar = null;
}
else
{
    $nameAvatar = $inputEmail . "_avatar." . $avatarExt;
}

if (isset($_POST["inputId"]))
{
    if (strlen($nameAvatar) == 0)
    {
        $nameAvatar = null;
    }
    else
    {
        $ext = explode(".", $nameAvatar);

        if (($ext[2] == "png") || ($ext[2] == "jpg") || ($ext[2] == "jpeg")) {
            move_uploaded_file($inputAvatar['tmp_name'], "../../media_commun/avatar/" . $nameAvatar);
        } else {
            if (strlen($reqPhoto[0]['photo_utilisateur']) == 0)
            {
                move_uploaded_file($inputAvatar['tmp_name'], "../../media_commun/avatar/" . $nameAvatar);
            }
            else
            {
                $nameAvatar = $reqPhoto[0]['photo_utilisateur'];
                move_uploaded_file($inputAvatar['tmp_name'], "../../media_commun/avatar/" . $nameAvatar);
            }

        }
    }

    $stmt = $bdd->prepare("
    UPDATE commune.utilisateur 
    SET photo_utilisateur= :photo, nom_utilisateur = :nom, prenom_utilisateur = :prenom, statut_utilisateur = :statut, etablissement_utilisateur = :etab, mission_utilisateur = :mission, portrait_utilisateur = :portrait, site_utilisateur = :site, mail_utilisateur = :email, super_admin = :superadmin   
    WHERE id_utilisateur = :user");
    $stmt->bindParam(":photo", $nameAvatar);
    $stmt->bindParam(":nom", $inputNom);
    $stmt->bindParam(":prenom", $inputPrenom);
    $stmt->bindParam(":statut", $inputStatut);
    $stmt->bindParam(":etab", $inputEtab);
    $stmt->bindParam(":mission", $inputMission);
    $stmt->bindParam(":portrait", $inputPortrait);
    $stmt->bindParam(":site", $inputUrl);
    $stmt->bindParam(":email", $inputEmail);
    $stmt->bindParam(":superadmin", $userSuperadmin);
    $stmt->bindParam(":user", $inputId);
    $stmt->execute();

    /*Pour afficher les actions*/
    $req = $bdd->prepare("SELECT id_laboratoire, id_utilisateur from commune.etudier where commune.etudier.id_utilisateur = :user");
    $req->bindParam(":user", $inputId);
    $req->execute();
    $reqLabo = $req->fetchAll();

    if (sizeof($reqLabo) == 0) {
        $stmt = $bdd->prepare("INSERT INTO commune.etudier(id_laboratoire, id_utilisateur)
                                                  VALUES (?, ?)");
        $stmt->bindParam(1, $inputLabo);
        $stmt->bindParam(2, $inputIdUtilisateur);
        $stmt->execute();
    } else {
        $stmt = $bdd->prepare("UPDATE commune.etudier SET id_laboratoire =:labo where commune.etudier.id_utilisateur = :user ");
        $stmt->bindParam(":labo", $inputLabo);
        $stmt->bindParam(":user", $inputId);
        $stmt->execute();
    }

    echo 1;
} else {
    echo 0;
}
?>