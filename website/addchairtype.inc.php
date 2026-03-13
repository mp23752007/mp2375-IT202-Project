<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) { echo "<h2>Error: You must be logged in.</h2>"; return; }
require_once('database.php'); require_once('chairtype.php');
$db = getDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c = new ChairType($_POST['chair_type_id'], $_POST['chair_type_code'], $_POST['chair_type_name'], $_POST['chair_aisle_number']);
    $c->save($db);
    echo "<h2>New Category #{$_POST['chair_type_id']} successfully added</h2>";
}
?>