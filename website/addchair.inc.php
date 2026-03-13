<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) { echo "<h2>Error: You must be logged in.</h2>"; return; }
require_once('database.php'); require_once('chair.php');
$db = getDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c = new Chair($_POST['chair_id'], $_POST['chair_code'], $_POST['chair_name'], $_POST['chair_description'], $_POST['chair_material'], $_POST['chair_style'], $_POST['chair_type_id'], $_POST['chair_buy_price'], $_POST['chair_sell_price']);
    $c->save($db);
    echo "<h2>New Chair #{$_POST['chair_id']} successfully added</h2>";
}
?>