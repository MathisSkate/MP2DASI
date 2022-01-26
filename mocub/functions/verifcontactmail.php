<?php

include_once "config.php";

$inputEmailExpediteur = $_POST['inputEmailExpediteur'];
$inputEmailExpediteur = filter_var($inputEmailExpediteur, FILTER_SANITIZE_STRING);

$inputSubject = $_POST['inputSubject'];

$inputDescriptionMail = $_POST['inputDescriptionMail'];

$inputPrenomExpediteur = $_POST['inputPrenomExpediteur'];

$inputNomExpediteur = $_POST['inputNomExpediteur'];

if (isset($inputEmailExpediteur) && isset($inputSubject) && isset($inputDescriptionMail) && isset($inputPrenomExpediteur) && isset($inputNomExpediteur)) {

    $mail = "$inputEmailExpediteur";

    $destinataire = "projet.cirmar@gmail.com";
    $subject = "$inputSubject";
    $body = "$inputPrenomExpediteur $inputNomExpediteur du projet $nameprojetgeneral a essayé de vous contacter pour le sujet : $subject et voici son message : $inputDescriptionMail";


    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: <$mail>\r\nReply-to : <$mail>\nX-Mailer:PHP";

    mail($destinataire,$subject,$body,$headers);

    echo 1;
} else {
    echo 0;
}

?>
