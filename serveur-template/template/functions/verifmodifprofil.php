<?php

include_once "config.php";

$inputIdUtilisateur = $_POST['inputIdUtilisateur'];

/*Pour rechercher la photo*/
$req = $bdd->prepare("SELECT photo_utilisateur from commune.utilisateur where commune.utilisateur.id_utilisateur = '$inputIdUtilisateur' ");
$req->execute();
$reqPhoto = $req->fetchAll();

$inputAvatar = $_FILES['inputAvatar'];

$path = $inputAvatar['name'];
$avatarExt = pathinfo($path, PATHINFO_EXTENSION);


$inputNom = $_POST['inputNom'];
$inputPrenom = $_POST['inputPrenom'];
$inputEtab = $_POST['inputEtab'];
$inputUrl = $_POST['inputUrl'];
$inputStatut = $_POST['inputStatut'];
$inputLabo = $_POST['inputLabo'];
$inputEmail = $_POST['inputEmail'];

/*Permet de mettre a jour la variable session*/
$_SESSION['emailUser'] = $inputEmail;

$nameAvatar = $inputEmail . "_avatar." . $avatarExt;

/*Ancien mot de passe*/
$inputPassword = $_POST['inputPassword'];
$hashedPassword = hash('sha256', $inputPassword);

/*Nouveau mot de passe*/
$inputNewPassword = $_POST['inputNewPassword'];
$hashedNewPassword = hash('sha256', $inputNewPassword);

$inputMission = $_POST['inputMission'];

/*Pour afficher les actions*/
$req = $bdd->prepare("SELECT mdp_utilisateur from commune.utilisateur where commune.utilisateur.id_utilisateur = '$inputIdUtilisateur' ");
$req->execute();
$reqMdp = $req->fetchAll();


if ($hashedPassword == $reqMdp[0]['mdp_utilisateur'])
{
    if (isset($inputNom) && isset($inputPrenom) && isset($inputEtab) && isset($inputUrl) && isset($inputStatut) && isset($inputLabo) && isset($inputEmail) && isset($hashedPassword) && isset($inputMission)) {


        $ext = explode(".", $nameAvatar);

        if (($ext[2] == "png") || ($ext[2] == "jpg") || ($ext[2] == "jpeg"))
        {
            move_uploaded_file($inputAvatar['tmp_name'], "../../media_commun/avatar/" . $nameAvatar);
        }
        else
        {
            $nameAvatar = $reqPhoto[0]['photo_utilisateur'];
            move_uploaded_file($inputAvatar['tmp_name'], "../../media_commun/avatar/" . $nameAvatar);
        }

        if (strlen($inputNewPassword) == 0)
        {
            $ancienMdp = $reqMdp[0]['mdp_utilisateur'];
            $stmt = $bdd->prepare("UPDATE commune.utilisateur SET mission_utilisateur='$inputMission', nom_utilisateur='$inputNom', prenom_utilisateur='$inputPrenom', etablissement_utilisateur='$inputEtab', statut_utilisateur='$inputStatut', site_utilisateur='$inputUrl', id_laboratoire='$inputLabo', photo_utilisateur='$nameAvatar', mail_utilisateur='$inputEmail', mdp_utilisateur='$ancienMdp' where commune.utilisateur.id_utilisateur = '$inputIdUtilisateur' ");
        }
        else
        {
            $stmt = $bdd->prepare("UPDATE commune.utilisateur SET mission_utilisateur='$inputMission', nom_utilisateur='$inputNom', prenom_utilisateur='$inputPrenom', etablissement_utilisateur='$inputEtab', statut_utilisateur='$inputStatut', site_utilisateur='$inputUrl', id_laboratoire='$inputLabo', photo_utilisateur='$nameAvatar', mail_utilisateur='$inputEmail', mdp_utilisateur='$hashedNewPassword' where commune.utilisateur.id_utilisateur = '$inputIdUtilisateur' ");
        }
        $stmt->execute();

        echo 1;

    } else {
        echo 0;
    }

}
else
{
    echo 2;
}?>
