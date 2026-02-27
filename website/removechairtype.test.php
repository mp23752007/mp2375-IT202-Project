<?php
require_once('database.php'); require_once('chairtype.php');
$db = getDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ChairType::remove($db, $_POST['ChairTypeID']);
    echo "<h2>Category #{$_POST['ChairTypeID']} successfully removed</h2>";
}
?>