<?php

if(!empty($_POST)){

    echo $_POST['val1'].' '.$_POST['sign'].' '.$_POST['val2'] . ' = ';
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
switch ($_POST['sign']) {
    case 'plus':
        echo(intval($_POST['val1']) + intval($_POST['val2']));
        break;
    case 'moins':
        echo(intval($_POST['val1']) - intval($_POST['val2']));
        break;
    case 'fois':
        echo(intval($_POST['val1']) * intval($_POST['val2']));
        break;
    case 'divise':
        echo(intval($_POST['val1']) / intval($_POST['val2']));
        break;
    default:
        echo 'WTF !?!';
        break;
}

}
?>
<form action="index.php" method="POST">
    <label for="val1">Val 1 </label>
    <input type="text" name="val1" id="val1" />
    <label for="sign">Sign </label>
    <select name="sign" id="sign" >
        <option>plus</option>
        <option>moins</option>
        <option>fois</option>
        <option>divise</option>
        <option>exposant</option>
    </select>
    <label for="val2">Val 2 </label>
    <input type="text" name="val2" id="val2" />
    <input type="submit" value="calcule" />
</form>