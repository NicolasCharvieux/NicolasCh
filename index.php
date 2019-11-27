<?php

include 'header.html' ;

/*

    if($_POST['sign'] === 'plus') {
        echo(intval($_POST['val1']) + intval($_POST['val2']));

    } elseif($_POST['sign'] === 'moins') {
        echo(intval($_POST['val1']) - intval($_POST['val2']));

    } elseif($_POST['sign'] === 'fois') {
        echo(intval($_POST['val1']) * intval($_POST['val2']));

    } elseif($_POST['sign'] === 'divise') {
        echo(intval($_POST['val1']) / intval($_POST['val2']));

    } elseif($_POST['sign'] === 'exposant') {
        //boucle
        $val1 = intval($_POST['val1']);
        $val2 = intval($_POST['val2']);
        $resultat = 1 ;
        for($i = 0; $i<$val2; $i++) {
            $resultat *= $val1;
            // $resultat = $resultat * $val1 ;
        }
        echo $resultat;

    } else {
        echo 'WTF !?!';
    }
*/
  /* case 'exposant':
        //boucle
        $val1 = intval($_POST['val1']);
        $val2 = intval($_POST['val2']);
        $resultat = 1 ;
        for($i = 0; $i<$val2; $i++) {
            $resultat *= $val1;
            // $resultat = $resultat * $val1 ;
        }
        echo $resultat;
            break;   */



//Initialise les variables
$result = '';

$val1 = '';
$val2 = '';
$sign = '';

//Les 2 lignes ci-desous servent à conserver le nombre dans la case.


$options = ['plus', 'moins', 'fois', 'divise', 'exposant'];


if(!empty($_POST)){
    include 'traitement.php' ;
}

?>

<form action="index.php" method="POST">
    <label for="val1">Val 1 </label>
    <input type="text" name="val1" id="val1" value="<?php echo $val1; ?>"/>
    <label for="sign">Sign </label>
    <select name="sign" id="sign" >

        <?php
        for($i=0; $i<count($options); $i++) {
            echo '<option ';
            if($sign === $options[$i]) {
                echo 'selected';
            }
            echo ">".$options[$i]."</option>";
        }
        ?>
            
    </select>
    <label for="val2">Val 2 </label>
    <input type="text" name="val2" id="val2" value="<?php echo $val2; ?>" />
    <input type="submit" value="calcule" />
    <input type="text" disabled value="<?php echo $result; ?>">
</form>

<?php

include 'footer.html' ;

?>