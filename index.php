<?php
function exposant($val1, $val2) {
    $resultat = 1 ;
    for($i = 0 ; $i<$val2; $i ++) {
        $resultat = $resultat * $val1 ;
    }
    return $resultat ;
}

if(!empty($_POST)){

  
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

    $result = 0;

switch ($_POST['sign']) {
    case 'plus':
        $result = (intval($_POST['val1']) + intval($_POST['val2']));
        break;
    case 'moins':
        $result = (intval($_POST['val1']) - intval($_POST['val2']));
        break;
    case 'fois':
        $result = (intval($_POST['val1']) * intval($_POST['val2']));
        break;
    case 'divise':
        $result = (intval($_POST['val1']) / intval($_POST['val2']));
        break;
    case 'exposant':
        $result = exposant(intval($_POST['val1']), intval($_POST['val2']));
        break;
    default:
        echo 'WTF !?!';
        break;
}
echo $_POST['val1'].' '.$_POST['sign'].' '.$_POST['val2']. ' = '. $result;
}

//Initialise les variables

$val1 = '';
$val2 = '';
$sign = '';

//Les 2 lignes ci-desous servent à conserver le nombre dans la case.

if(!empty($_POST['val1'])) {
    $val1 = $_POST['val1'] ;
}
if(!empty($_POST['val2'])) {
    $val2 = $_POST['val2'] ;
}
if(!empty($_POST['sign'])) {
    $sign = $_POST['sign'] ;
}

?>

<form action="index.php" method="POST">
    <label for="val1">Val 1 </label>
    <input type="text" name="val1" id="val1" value="<?php echo $val1; ?>"/>
    <label for="sign">Sign </label>
    <select name="sign" id="sign" >
        <option <?php if($sign === 'plus') {echo 'selected';} ?>>plus</option>
        <option <?php if($sign === 'moins') {echo 'selected';} ?>>moins</option>
        <option <?php if($sign === 'fois') {echo 'selected';} ?>>fois</option>
        <option <?php if($sign === 'divise') {echo 'selected';} ?>>divise</option>
        <option <?php if($sign === 'exposant') {echo 'selected';} ?>>exposant</option>
    </select>
    <label for="val2">Val 2 </label>
    <input type="text" name="val2" id="val2" value="<?php echo $val2; ?>" />
    <input type="text" value="<?php echo $result ?>"/>
    <input type="submit" value="calcule" />
    <input type="text" disabled value="<?php echo $result; ?>">
</form>