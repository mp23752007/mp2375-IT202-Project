<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
require_once('database.php'); require_once('chairtype.php');
$db = getDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c = new ChairType($_POST['ChairTypeID'], $_POST['ChairTypeCode'], $_POST['ChairTypeName'], $_POST['ChairAisleNumber']);
    $c->update($db);
    echo "<h2>Category #{$_POST['ChairTypeID']} successfully updated</h2>";
}
?>