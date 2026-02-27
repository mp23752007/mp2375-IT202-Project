<?php
require_once('database.php'); require_once('chair.php');
$db = getDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c = new Chair($_POST['ChairID'], $_POST['ChairCode'], $_POST['ChairName'], $_POST['ChairDescription'], $_POST['ChairMaterial'], $_POST['ChairStyle'], $_POST['ChairTypeID'], $_POST['ChairBuyPrice'], $_POST['ChairSellPrice']);
    $c->save($db);
    echo "<h2>New Chair #{$_POST['ChairID']} successfully added</h2>";
}
?>