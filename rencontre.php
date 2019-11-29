<?php
include 'header.html';
?>

<h1>Rencontres faciles</h1>

<?php session_start(); ?>

<?php
if (!isset($_GET['etape']) || $_GET['etape'] == 1 ) {
?>
            
<form action="rencontre.php?etape=2" method="POST">
            <div>
                <h2>Etape 1 : identité</h2>
            <div>
                <label for="last_name" class="h4">Nom</label>
                <input type="text" class="form-control" name="last_name" placeholder="Votre NOM" required>
            </div><br>
            <div>
                <label for="first_name" class="h4">Prénom</label>
                <input type="text" class="form-control" name="first_name" placeholder="Votre Prénom" required>
            </div><br>
            <div>
                <label for="email" class="h4">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Votre Email" required>
            </div><br>
        <button type="submit" class="btn btn-primacy">Etape suivante</button>
</form>

<?php
}
elseif ( $_GET['etape'] == 2 ) {
    $_SESSION['identite'] = $_POST['first_name'];
    $_SESSION['identite'] = $_POST['last_name'];
    $_SESSION['identite'] = $_POST['email'];
    //bien entendu ici tu vérifies les informations et si erreur tu passe pas pas à la suite, tu renvoi vers ?etape=1 avec une erreur en variable de sessions peut etre
?>

<form action="rencontre.php?etape=3" method="POST" id="radio">
    <div>
        <h2 id="title">Etape 2 : Vos choix</h2>
    </div><br>
    <div>
    <div id="bon">
        <div class="boite">
                <div>
                    <h4>Vous recherchez :</h4>
                </div>
            <div class="genre">
                <input type="radio" id="men" name="name" value="homme"></input>
                <label for="homme">Homme</label>
            </div><br>
            <div class="genre">
                <input type="radio" id="wommen" name="name" value="femme"></input>
                <label for="femme">Femme</label>
            </div><br>
            <div class="genre">
                <input type="radio" id="other" name="name" value="autre"></input>
                <label for="autre">Autre</label>
            </div>
        </div>
        <div classe="boite">
                <div>
                    <h4>Centres d'intérets :</h4>
                </div>
            <div class="list">
                <input type="checkbox" id="musique" name="musique">
                <label for="musique">Musique</label>
            </div>
            <div class="list">
                <input type="checkbox" id="sport" name="sport">
                <label for="sport">Sport</label>
            </div>
            <div class="list">
            <input type="checkbox" id="nature" name="nature">
                <label for="nature">Nature</label>
            </div>
            <div class="list">
                <input type="checkbox" id="cinema" name="cinema">
                <label for="cinema">Cinéma</label>
            </div>
            <div class="list">
                <input type="checkbox" id="photographie" name="photographie">
                <label for="photographie">Photographie</label>
            </div>
            <div class="list">
                <input type="checkbox" id="art" name="art">
                <label for="art">Art</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primacy">Etape suivante</button>
</form>

<?php
}
elseif ( $_GET['etape'] == 3 ) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['vos_choix'] = $_POST['musique'];
    $_SESSION['vos_choix'] = $_POST['sport'];
    $_SESSION['vos_choix'] = $_POST['nature'];
    $_SESSION['vos_choix'] = $_POST['cinema'];
    $_SESSION['vos_choix'] = $_POST['photographie'];
    $_SESSION['vos_choix'] = $_POST['art'];
?>

<form action="rencontre.php?etape=4" method="POST">
    <div>
        <h>Etape 3 : Description</h2>
    </div>
    <div>
        <label for="description" class="h4">Description</label>
        <textarea name="message" class="form-control" cols="100" rows="10" placeholder="Votre description" required></textarea>
    </div>
    <button type="submit" class="btn btn-primacy">Valider</button>
</form>

<?php
}
elseif ( $_GET['etape'] == 4 ) {
    $_SESSION['description'] = $_POST['message'];
print "Identité : ".$_SESSION['identite']."<br>Vos choix : ".$_SESSION['vos_choix']."<br>Description : ".$_SESSION['description'];
}

else {
    //ici tu peux envoyer vers le debut, ou vers une page pour les visiteures égarés
}
?>

<?php

    $identite = "";
    $vos_choix = "";
    $description = "";

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
if (!empty($_POST['identite'])&&!empty($_POST['vos_choix'])&&!empty($_POST['description'])) {

    $identite=$_POST['last_name','first_name','email'];
    $vos_choix=$_POST['homme','femme','autre'['musique','sport','nature','cinema','photographie','art']];
    $description=$_POST['message'];
    echo $identite,$vos_choix,$description;


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

    $mail-> $description = $description;
    if(!$mail->send()) {
        echo 'Erreur, message non envoyé.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Le message a bien été envoyé !';
    }}

?>