<?php
include 'header.html';
?>

<h1>Livre d'Or</h1>

<form action="" method="POST">
    <label for="text">Votre message :</label>
    <textarea name="text" id="text" cols="100" rows="2"></textarea>
    <input type="submit" value="Envoyer" id="bouton">
</form>

<?php

session_start();

if(empty($_SESSION['messages'])) {
    $_SESSION['messages'] = [] ;
}

if(!empty($_POST['text'])){
    $m =[
        "message" => $_POST['text'],
        "date" => strftime ('%d-%m-%Y %X')
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
                <div class="card-footer"><?php echo $text['date']; ?></div>
            </li>
        <?php endforeach ; ?>
    </ul>
<?php
endif
?>