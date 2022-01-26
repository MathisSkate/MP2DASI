<?php

include "config.php";


$inputNom = $_POST['inputNom'];
$inputPrenom = $_POST['inputPrenom'];
$inputEtab = $_POST['inputEtab'];
$inputUrl = $_POST['inputUrl'];
$inputStatut= $_POST['inputStatut'];
$inputLabo = $_POST['inputLabo'];
$inputEmail = $_POST['inputEmail'];

$inputEmail = filter_var($inputEmail, FILTER_SANITIZE_STRING);

$inputPassword = hash('sha256', $_POST['inputPassword']);

if (isset($_FILES['inputAvatar'])){
    $inputAvatar = $_FILES['inputAvatar'];
    $path = $inputAvatar['name'];
    $avatarExt = pathinfo($path, PATHINFO_EXTENSION);
    $nameAvatar = $inputEmail."_avatar.".$avatarExt;
    move_uploaded_file($inputAvatar['tmp_name'],"../media/image/avatar_images/".$nameAvatar);
}


if( isset($inputNom) && isset($inputPrenom) && isset($inputEtab) && isset($inputStatut) && isset($inputLabo) && isset($inputEmail) && isset($inputPassword) ){

    $stmt = $bdd->prepare("INSERT INTO commune.utilisateur(nom_utilisateur, prenom_utilisateur, statut_utilisateur, etablissement_utilisateur, photo_utilisateur, site_utilisateur, mail_utilisateur, mdp_utilisateur, id_laboratoire)
                                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $inputNom);
    $stmt->bindParam(2, $inputPrenom);
    $stmt->bindParam(3, $inputStatut);
    $stmt->bindParam(4, $inputEtab);
    $stmt->bindParam(5, $inputAvatar['name']);
    $stmt->bindParam(6, $inputUrl);
    $stmt->bindParam(7, $inputEmail);
    $stmt->bindParam(8, $inputPassword);
    $stmt->bindParam(9, $inputLabo);
    $stmt->execute();

    $mail = "no-reply@classe.fr";
    $nom = "Classe 2";

    $subject="Compte inactif - ".$nameprojetgeneral;
    $body="Bonjour ".$inputPrenom.", \n\n
Votre compte a bien été créé. Cependant l'administrateur du site n'a pas encore activé votre compte. Vous recevrez un mail quand celui-ci sera activé. \n
Attention à ne pas oublier votre email et votre mot de passe :\n
Email : ".$_POST['inputEmail']." \n
Mot de passe : ".$_POST['inputPassword']." \n\n

Cordialement, \n
L'équipe du projet ".$nameprojetgeneral;

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: <$mail>\r\nReply-to : $nom <$mail>\nX-Mailer:PHP";

    $mailobject = mail($inputEmail,$subject,$body,$headers);

    echo 1;

}
else{
    echo "invalid";
}
?>
