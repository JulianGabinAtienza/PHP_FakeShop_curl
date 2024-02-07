<?php 

// On utilise la classe PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Récupération des données rentrées par l'utilisateur du formulaire de contact 
if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $email = $_POST['email'];
    $subject = htmlspecialchars($_POST['subject']);
    $body = htmlspecialchars($_POST['body']);

    // On vérifie que l'email soit au bon format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // On instancie la classe PHP Mailer cad on crée un objet $mail
        $mail = new PHPMailer(true);

        try {
            //Server settings / On configure le serveur SMTP
            $mail->isSMTP();                                            
            $mail->Host       = SMTP_HOST;                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = SMTP_USERNAME;                     
            $mail->Password   = SMTP_PASSWORD;                               
            $mail->SMTPSecure = SMTP_ENCRYPTION;            
            $mail->Port       = SMTP_PORT;                              

            //Recipients / On précise les récipients pour le mail 
            $mail->setFrom($email);
            $mail->addAddress($mail->Username, 'Romain'); 
            $mail->Subject = $subject;
            $mail->Body  = $body;   

            // On envoie le mail 
            $mail->send();
            echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $error = "Assurez vous que le mail soit au bon format";
    }
} else {
    $error = "Veuillez remplir tous les champs";
}

