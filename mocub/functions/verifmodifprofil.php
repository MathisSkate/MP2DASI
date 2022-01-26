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
$inputPortrait = $_POST['inputPortrait'];

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

        /*Pour afficher les laboratoires*/
        $req = $bdd->prepare("SELECT id_laboratoire, id_utilisateur from commune.etudier where commune.etudier.id_utilisateur = '$inputIdUtilisateur' ");
        $req->execute();
        $reqLabo = $req->fetchAll();

        if (sizeof($reqLabo) == 0)
        {
            $stmt = $bdd->prepare("INSERT INTO commune.etudier(id_laboratoire, id_utilisateur)
                                                  VALUES (?, ?)");
            $stmt->bindParam(1, $inputLabo);
            $stmt->bindParam(2, $inputIdUtilisateur);
            $stmt->execute();
        }
        else
        {
            $stmt = $bdd->prepare("UPDATE commune.etudier SET id_laboratoire ='$inputLabo' where commune.etudier.id_utilisateur = '$inputIdUtilisateur' ");
            $stmt->execute();
        }


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
            $stmt = $bdd->prepare("UPDATE commune.utilisateur SET mission_utilisateur='$inputMission', nom_utilisateur='$inputNom', prenom_utilisateur='$inputPrenom', etablissement_utilisateur='$inputEtab', statut_utilisateur='$inputStatut', site_utilisateur='$inputUrl', photo_utilisateur='$nameAvatar', mail_utilisateur='$inputEmail', portrait_utilisateur='$inputPortrait', mdp_utilisateur='$ancienMdp' where commune.utilisateur.id_utilisateur = '$inputIdUtilisateur' ");
        }
        else
        {
            $stmt = $bdd->prepare("UPDATE commune.utilisateur SET mission_utilisateur='$inputMission', nom_utilisateur='$inputNom', prenom_utilisateur='$inputPrenom', etablissement_utilisateur='$inputEtab', statut_utilisateur='$inputStatut', site_utilisateur='$inputUrl', photo_utilisateur='$nameAvatar', mail_utilisateur='$inputEmail', portrait_utilisateur='$inputPortrait', mdp_utilisateur='$hashedNewPassword' where commune.utilisateur.id_utilisateur = '$inputIdUtilisateur' ");
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
