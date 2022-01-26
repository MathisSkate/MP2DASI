<?php

include "config.php";

$getEmail = $_GET['email'];
$inputPwd = $_POST['inputPwd'];
$inputPwdConf = $_POST['inputPwdConf'];

$hashpwd = hash('sha256', $inputPwd);

if ($inputPwd == $inputPwdConf) {
  $stmt = $bdd->prepare("UPDATE commune.utilisateur AS tab1 SET tab1.mdp_utilisateur = ? WHERE tab1.mail_utilisateur = ?");
  $stmt->bindParam(1, $hashpwd);
  $stmt->bindParam(2, $getEmail);
  $stmt->execute();
  echo 1;
} else {
  echo 0;
}


?>
