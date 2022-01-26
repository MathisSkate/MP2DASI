<?php
//DESC : fichier qui active un utilisateur en l'ajoutant a 1 ou plusieurs projets dans le modal d'edition d'un utilisateur dans la page "admin_utilisateur_active"

include "config.php";

//inclure le fichier qui possède la  variable de la BDD

$iduser = $_POST['inputId'];

//On supprime toutes les lignes dans la base commune table participer ou l'utilisateur est l'id

$stmt1 = $bdd->prepare("DELETE FROM commune.participer WHERE id_utilisateur = :user");
$stmt1->bindParam(":user", $iduser);
$stmt1->execute();

$stmt3 = $bdd->prepare("SELECT id_projet, nom_projet
                                  FROM commune.projet");
$stmt3->execute();

//Pour tous les projets présent on supprime les utilisateurs de la table utilisateur_detail de chaque projet

while ($donnees = $stmt3->fetch()) {
    $idprojet = $donnees['id_projet'];
    $nomprojet = $donnees['nom_projet'];

    //On récupère le nom et l'id du projet dans le while

    $stmt2 = $bdd->prepare("DELETE FROM ".$nomprojet.".utilisateur_detail WHERE id_utilisateur = :user ");
    $stmt2->bindParam(":user", $iduser);
    $stmt2->execute();
    print_r($stmt2->errorInfo());

    //On dit que par défaut chaque utilisateur est dans aucun projet

    if(!isset($_POST[$donnees['nom_projet'].'-radio'])){
        $_POST[$donnees['nom_projet'].'-radio'] = 2;
    }

    //On récupère la valeur POST de chaque radio et de chaque projet

    $useraccess = $_POST[$donnees['nom_projet'].'-radio'];

    if (isset($_POST["inputId"]) && ($useraccess != 2)) {

        $stmt4 = $bdd->prepare("INSERT INTO commune.participer(id_utilisateur, id_projet, admin)
                                          VALUES (:user, :idprojet, :useraccess)
                                         ");
        $stmt4->bindParam(":user", $iduser);
        $stmt4->bindParam(":idprojet", $idprojet);
        $stmt4->bindParam(":useraccess", $useraccess);
        $stmt4->execute();

        $stmt5 = $bdd->prepare("INSERT INTO $nomprojet.utilisateur_detail(id_utilisateur)
                                          VALUES (:user)
                                         ");
        $stmt5->bindParam(":user", $iduser);
        $stmt5->execute();

        echo $nomprojet." : ".$useraccess." : 0 / ";
    } else {
        echo 1;
    }
}

$stmt2 = $bdd->prepare("SELECT tab1.mail_utilisateur, tab2.id_projet, tab3.nom_projet
                                     FROM commune.utilisateur AS tab1
                                     JOIN commune.participer AS tab2 
                                     ON tab1.id_utilisateur = tab2.id_utilisateur 
                                     JOIN commune.projet AS tab3 
                                     ON tab2.id_projet = tab3.id_projet 
                                     WHERE tab1.id_utilisateur = :user");
$stmt2->bindParam(":user", $iduser);
$stmt2->execute();

//On envoie un mail pour chaque projet où l'utilisateur est activé

while ($donnees = $stmt2->fetch()) {
    $emailUser = $donnees['mail_utilisateur'];
    $nomprojetUser = $donnees['nom_projet'];
    $mail = "no-reply@classe.fr";
    $nom = $nomprojetUser;

    $destinataire="$emailUser";
    $subject="Votre compte a été activé - ".$nomprojetUser."";
    $body="Bonjour, \n
Vous avez récemment créer un compte sur le site ".$nomprojetUser." \n
Votre compte a désormais été activé par l'administrateur.\n\n

Pour pouvoir vous connecter au site de ".$nomprojetUser." allez sur ce lien : \n
    www.projet-recherche-normandie.fr/".$nomprojetUser."/connection.php\n\n

Cordialement,\n
L'équipe ".$nomprojetUser.".";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=utf8\r\n";
    $headers .= "From: <$mail>\r\nReply-to : $nom <$mail>\nX-Mailer:PHP";

    $mailobject = mail($destinataire,$subject,$body,$headers);

}


?>