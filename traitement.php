<?php

require 'librairie.php';

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

$val1 = $_POST['val1'];
$val2 = $_POST['val2'];
$sign = $_POST['sign'];

?>