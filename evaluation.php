<form action="evaluation.php" method="POST">
    <div>
        <h1>Fiche Contact</h1>
    </div>
        <div>
            <label for="last_name" class="h4">Nom</label>
            <input type="text" class="form-control" name="last_name" placeholder="Votre Nom" required>
        </div><br>
        <div>
            <label for="first_name" class="h4">Prénom</label>
            <input type="text" class="form-control" name="first_name" placeholder="Votre Prénom" required>
        </div><br>
        <div>
            <label for="email" class="h4">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Votre Email" required>
        </div><br>
        <div>
            <label for="tel" class="h4">Téléphone</label>
            <input type="number" class="form-control" name="tel" placeholder="Numéro de téléphone" required>
        </div><br>
    <button type="submit" class="btn btn-primacy">Valider</button>
</form>




<?php
session_start();

if(empty($_SESSION['messages'])) {
    $_SESSION['messages'] = [] ;
}

if(!empty($_POST['text'])){
    $m =[
        "message" => $_POST['text'],
    ];
    array_push($_SESSION['messages'], $m);  
}

?>




<?php
if(!empty($_SESSION['messages']) && count($_SESSION['messages'])) :?>
    <ul id="message">
            <?php foreach ($_SESSION['messages'] as $key => $text) :?>
                <li class="card">
                <div class="card-body"><?php echo $text['message']; ?></div>
            </li>
        <?php endforeach ; ?>
    </ul>
<?php
endif
?>



<?php
/*
    $last_name = "";
    $first_name = "";
    $email = "";
    $tel = "";

// Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not insnamee a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require_once('phpmailer/src/PHPMailerAutoload.php');
if (!empty($_POST['last_name'])&&!empty($_POST['first_name'])&&!empty($_POST['email'])&&!empty($_POST['tel'])) {

    //var_dump($_POST);
    $last_name=$_POST['last_name'];
    $first_name=$_POST['first_name'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    echo $last_name,$first_name,$email,$tel;


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();
$mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP 
// $mail->Host = 'smtp.gmail.com'; // Spécifier le serveur SMTP
// $mail->SMTPAuth = true; // Activer authentication SMTP
// $mail->Username = 'i.salhi@it-students.fr'; // Votre adresse email d'envoi
// $mail->Password = '1991jane@'; // Le mot de passe de cette adresse email
// $mail->SMTPSecure = 'TLS/SSL'; // Accepter SSL
// $mail->Port = 465;
$mail->Host = 'ssl0.ovh.net'; // Spécifier le serveur SMTP
$mail->SMTPAuth = true; // Activer authentication SMTP
$mail->Username = 'it@ws312.com'; // Votre adresse email d'envoi
$mail->Password = 'Azertyuiop0'; // Le mot de passe de cette adresse email
$mail->SMTPSecure = 'ssl'; // Accepter SSL
$mail->Port = 465;



    $mail->setFrom('it@ws312.com','le message'); // Personnaliser l'envoyeur
    $mail->addAddress('n.charvieux@it-students.fr', 'Nicolas User'); // Ajouter le destinataire
    //$mail->addAddress('To2@example.com'); 
    $mail->addReplyTo($email,$last_name); // L'adresse de réponse
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('/var/tmp/file.tar.gz'); // Ajouter un attachement
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 
    $mail->isHTML(true); // Paramétrer le format des emails en HTML ou non

    // $mail->Subject = $subject;
    // $mail->Body = $message;
    // $mail->AltBody = $message;
    if(!$mail->send()) {
        echo 'Erreur, message non envoyé.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Le message a bien été envoyé !';
    }}

?>*/