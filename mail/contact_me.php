<?php
// Vérification des champs vides
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    echo "Tous les champs ne sont pas remplis correctement !";
    return false;
}

// Nettoyage des données
$nom = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$telephone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Création et envoi de l'email
$destinataire = 'yzs3090@gmail.com'; // Adresse email où les messages seront envoyés
$sujet = "Formulaire de contact : $nom";
$corps_email = "Vous avez reçu un nouveau message depuis votre formulaire de contact.\n\n".
               "Voici les détails :\n\n".
               "Nom : $nom\n\n".
               "Email : $email\n\n".
               "Téléphone : $telephone\n\n".
               "Message :\n$message";
$headers = "De : noreply@votredomaine.com\n"; // Adresse email d'envoi recommandée (à configurer)
$headers .= "Reply-To: $email";

// Envoi de l'email
if(mail($destinataire, $sujet, $corps_email, $headers)) {
    return true;
} else {
    echo "Erreur lors de l'envoi du message.";
    return false;
}
?>