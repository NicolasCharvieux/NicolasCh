<?php

if(!empty($_POST)){

    echo $_POST['val1'].' '.$_POST['sign'].' '.$_POST['val2'] . ' = ';

    if($_POST['sign'] === 'plus') {
        echo(intval($_POST['val1']) + intval($_POST['val2']));
    } elseif($_POST['sign'] === 'moins') {
        echo(intval($_POST['val1']) - intval($_POST['val2']));
    } elseif($_POST['sign'] === 'fois') {
        echo(intval($_POST['val1']) * intval($_POST['val2']));
    } elseif($_POST['sign'] === 'divise') {
        echo(intval($_POST['val1']) / intval($_POST['val2']));
    } else {
        echo 'WTF !?!';
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
    </select>
    <label for="val2">Val 2 </label>
    <input type="text" name="val2" id="val2" />
    <input type="submit" value="calcule" />
</form>