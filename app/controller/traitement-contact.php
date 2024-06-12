<?php
// Importation des classes PHPMailer dans l'espace global
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Charger l'autoloader de Composer
require '../../vendor/autoload.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['contactInputNom'];
    $prenom = $_POST['contactInputPrenom'];
    $telephone = $_POST['contactInputTel'];
    $email = $_POST['contactInputEmail'];
    $prestation = $_POST['prestation'];
    $objet = $_POST['contactInputObjet'];
    $message = $_POST['contactInputMessage'];

    // Créer une instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Activer la sortie de débogage verbose
        $mail->isSMTP();                                            // Envoyer en utilisant SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Définir le serveur SMTP de Gmail à utiliser pour l'envoi
        $mail->SMTPAuth   = true;                                   // Activer l'authentification SMTP
        $mail->Username   = 'julienbeauchant.pro@gmail.com';        // Nom d'utilisateur SMTP (votre adresse email Gmail)
        $mail->Password   = 'rkvl tqfc qlxr bnqi';                  // Mot de passe d'application généré
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Activer le chiffrement TLS implicite
        $mail->Port       = 465;                                    // Port TCP à connecter

        // Destinataires
        $mail->setFrom($email, "$prenom $nom");                     // Définir l'adresse de l'expéditeur
        $mail->addAddress('julienbeauchant.pro@gmail.com');         // Ajouter un destinataire (vous-même)

        // Contenu de l'email
        $mail->isHTML(true);                                        // Définir le format de l'email en HTML
        $mail->Subject = $objet;                                    // Définir le sujet de l'email
        $mail->Body    = "<p><strong>Nom :</strong> $nom</p>
                          <p><strong>Prénom :</strong> $prenom</p>
                          <p><strong>Téléphone :</strong> $telephone</p>
                          <p><strong>Email :</strong> $email</p>
                          <p><strong>Prestation :</strong> $prestation</p>
                          <p><strong>Message :</strong> $message</p>";  // Corps du message en HTML
        $mail->AltBody = "Nom : $nom\nPrénom : $prenom\nTéléphone : $telephone\nEmail : $email\nPrestation : $prestation\nMessage : $message"; // Corps du message en texte brut

        // Envoyer l'email
        $mail->send();
        header("Location: ../../public/index.php");
        exit();  // Arrêter le script après la redirection
    } catch (Exception $e) {
        // Afficher un message d'erreur si l'envoi échoue
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Le formulaire n'a pas été soumis.";
}
?>