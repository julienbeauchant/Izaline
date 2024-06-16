<?php
// Importation des classes nécessaires de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Inclusion de l'autoloader généré par Composer pour charger automatiquement les classes
require '../../vendor/autoload.php';

// Vérifie si la méthode de la requête est POST (c'est-à-dire que le formulaire a été soumis)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Récupération des données du formulaire soumis
    $nom = $_POST['contactInputNom'];
    $prenom = $_POST['contactInputPrenom'];
    $telephone = $_POST['contactInputTel'];
    $email = $_POST['contactInputEmail'];
    $prestation = $_POST['prestation'];
    $objet = $_POST['contactInputObjet'];
    $message = $_POST['contactInputMessage'];

    // Création d'une nouvelle instance de PHPMailer
    $mail = new PHPMailer(true);

    try {

        // Configuration du serveur SMTP
        $mail->isSMTP();                                        // Utilisation de SMTP                
        $mail->Host       = 'smtp.gmail.com';                   // Définition du serveur SMTP    
        $mail->SMTPAuth   = true;                               // Activation de l'authentification SMTP    
        $mail->Username   = 'julienbeauchant.pro@gmail.com';    // Nom d'utilisateur SMTP    
        $mail->Password   = 'rkvl tqfc qlxr bnqi';              // Mot de passe SMTP ( mode de passe d'application )   
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Activation du cryptage SSL/TLS    
        $mail->Port       = 465;                                // Port SMTP à utiliser    

        // Configuration de l'expéditeur et du destinataire
        $mail->setFrom($email, "$prenom $nom");                     
        $mail->addAddress('julienbeauchant.pro@gmail.com');   
        $mail->addReplyTo($email);                              // Adresse pour les réponses      

        // Configuration du contenu de l'email
        $mail->isHTML(true);                                        // Utilisation du format HTML pour l'email
        $mail->Subject = $objet;                                    // Sujet de l'email
        $mail->Body    = "<p><strong>Nom :</strong> $nom</p>
                        <p><strong>Prénom :</strong> $prenom</p>
                        <p><strong>Téléphone :</strong> $telephone</p>
                        <p><strong>Email :</strong> $email</p>
                        <p><strong>Prestation :</strong> $prestation</p>
                        <p><strong>Message :<br></strong> $message</p>";  // Corps de l'email en HTML
        // Corps de l'email en texte brut pour les clients email qui ne supportent pas le HTML  
        $mail->AltBody = "Nom : $nom\nPrénom : $prenom\nTéléphone : $telephone\nEmail : $email\nPrestation : $prestation\nMessage : $message";

        // Envoi de l'email
        $mail->send();
        // Redirection vers la page d'accueil après l'envoi de l'email
        header("Location: ../../public/index.php");
        exit(); 
    } catch (Exception $e) {
        // Affichage d'un message d'erreur en cas d'échec de l'envoi de l'email
        echo "Message non envoyé, erreur mail: {$mail->ErrorInfo}";
        header("Location: ../../public/index.php#mainContact");
    }
} else {
    echo "Le formulaire n'a pas été soumis";
    header("Location: ../../public/index.php#mainContact");
}
?>