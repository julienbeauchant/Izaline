<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom = $_POST['contactInputNom'];
    $prenom = $_POST['contactInputPrenom'];
    $telephone = $_POST['contactInputTel'];
    $email = $_POST['contactInputEmail'];
    $prestation = $_POST['prestation'];
    $objet = $_POST['contactInputObjet'];
    $message = $_POST['contactInputMessage'];

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'julienbeauchant.pro@gmail.com';        
        $mail->Password   = 'rkvl tqfc qlxr bnqi';                  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        $mail->setFrom($email, "$prenom $nom");                     
        $mail->addAddress('julienbeauchant.pro@gmail.com');         

        $mail->isHTML(true);                                        
        $mail->Subject = $objet;                                    
        $mail->Body    = "<p><strong>Nom :</strong> $nom</p>
                        <p><strong>Prénom :</strong> $prenom</p>
                        <p><strong>Téléphone :</strong> $telephone</p>
                        <p><strong>Email :</strong> $email</p>
                        <p><strong>Prestation :</strong> $prestation</p>
                        <p><strong>Message :</strong> $message</p>";
        $mail->AltBody = "Nom : $nom\nPrénom : $prenom\nTéléphone : $telephone\nEmail : $email\nPrestation : $prestation\nMessage : $message";

        $mail->send();
        header("Location: ../../public/index.php");
        exit(); 
    } catch (Exception $e) {
        echo "Message non envoyé, erreur mail: {$mail->ErrorInfo}";
    }
} else {
    echo "Le formulaire n'a pas été soumis";
}
?>