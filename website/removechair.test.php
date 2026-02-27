<?php
require_once('database.php'); require_once('chair.php');
$db = getDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Chair::remove($db, $_POST['ChairID']);
    echo "<h2>Chair #{$_POST['ChairID']} successfully removed</h2>";
}
?>