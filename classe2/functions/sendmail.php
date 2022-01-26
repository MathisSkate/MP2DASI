<?php

//DESC : Fichier qui envoie un mail quand on demande à réinitialiser son mot de passe

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$email = $_POST['inputEmail'];
$email = filter_var($email, FILTER_SANITIZE_STRING);

$stmt = $bdd->prepare("SELECT * FROM commune.utilisateur WHERE mail_utilisateur = ?");
$stmt->bindParam(1, $email, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll();

//On compte le resultat de la requete
$result = count($result);

if ($result > 0){
  //On crée une chaine de caractères aléatoire que l'on inserera dans la bdd dans la requête suivante
  $token = random_str(32);

  //On récupère la date du jour
  $startDate = time();
  //On récupère l'heure les minutes et les secondes instantanée
  $expiracy_date = date('Y-m-d H:i:s', strtotime('+1 Hour', $startDate));

  $stmt = $bdd->prepare("UPDATE commune.utilisateur SET token_utilisateur = ?, expiration_token_utilisateur = ? WHERE mail_utilisateur = ?");
  $stmt->bindParam(1, $token);
  $stmt->bindParam(2, $expiracy_date);
  $stmt->bindParam(3, $email);
  $stmt->execute();

  //On envoie un mail avec le lien de réinitialisation du mot de passe

  $mail = "no-reply@classe.fr";
  $nom = ".$nameprojetgeneral.";

  $destinataire="$email";
  $subject="Vous avez oublié votre mot de passe - ".$nameprojetgeneral."";
  $body="Bonjour, \n
Vous avez récemment demander à réinitialiser votre mot de passe. \n
Voici le lien pour pouvoir le réinitialiser :\n
www.projet-recherche-normandie.fr/".$nameprojetgeneral."/resetpassword.php?email=$email&token=$token\n\n
Cordialement,\n
L'équipe ".$nameprojetgeneral.".";

  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=utf8\r\n";
  $headers .= "From: <$mail>\r\nReply-to : $nom <$mail>\nX-Mailer:PHP";

  $mailobject = mail($destinataire,$subject,$body,$headers);

  echo 1;
}
else{
    echo 0;
}

?>
