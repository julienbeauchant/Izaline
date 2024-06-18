<?php
// Importation des classes nécessaires de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Inclusion de l'autoloader généré par Composer pour charger automatiquement les classes
require '../../vendor/autoload.php';

// vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // récupération des données du formulaire
    $nom = $_POST['contactInputNom'];
    $prenom = $_POST['contactInputPrenom'];
    $telephone = $_POST['contactInputTel'];
    $email = $_POST['contactInputEmail'];
    $prestation = $_POST['prestation'];
    $objet = $_POST['contactInputObjet'];
    $message = $_POST['contactInputMessage'];

    // création d'une nouvelle instance de PHPMailer
    $mail = new PHPMailer(true);

    try {

        // configuration du serveur SMTP
        $mail->isSMTP();                                        // utilisation de SMTP                
        $mail->Host       = 'smtp.gmail.com';                   // définition du serveur SMTP    
        $mail->SMTPAuth   = true;                               // activation de l'authentification SMTP    
        $mail->Username   = 'julienbeauchant.pro@gmail.com';    // nom d'utilisateur SMTP    
        $mail->Password   = 'rkvl tqfc qlxr bnqi';              // mot de passe SMTP ( mode de passe d'application )   
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // activation du cryptage SSL/TLS    
        $mail->Port       = 465;                                // port SMTP à utiliser    

        // configuration de l'expéditeur et du destinataire
        $mail->setFrom($email, "$prenom $nom");                 // informations de l'expéditeur 
        $mail->addAddress('julienbeauchant.pro@gmail.com');     // adresse destinataire
        $mail->addReplyTo($email);                              // adresse pour les réponses      

        // configuration du contenu de l'email
        $mail->isHTML(true);                                        // utilisation du format HTML pour l'email
        $mail->Subject = $objet;                                    // sujet de l'email
        $mail->Body    = "<p><strong>Nom :</strong> $nom</p>
                        <p><strong>Prénom :</strong> $prenom</p>
                        <p><strong>Téléphone :</strong> $telephone</p>
                        <p><strong>Email :</strong> $email</p>
                        <p><strong>Prestation :</strong> $prestation</p>
                        <p><strong>Message :<br></strong> $message</p>";  // corps de l'email en HTML
        // corps de l'email en texte brut et pas en code HTML  
        $mail->AltBody = "Nom : $nom\nPrénom : $prenom\nTéléphone : $telephone\nEmail : $email\nPrestation : $prestation\nMessage : $message";

        // envoi de l'email
        $mail->send();
        // redirection vers la page d'accueil après l'envoi de l'email
        header("Location: ../../public/index.php");
        // fin du script
        exit(); 
    } catch (Exception $e) {
        // affichage d'un message d'erreur en cas d'échec de l'envoi de l'email
        echo "Message non envoyé, erreur mail: {$mail->ErrorInfo}";
    }
} else {
    echo "Le formulaire n'a pas été soumis";
}
?>