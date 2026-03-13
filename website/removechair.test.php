<?php
/* Name: Mahi Patel 
Date: Feb 12, 2026
Course: IT-202
Section: 004
Assignment: Phase 1
Email: mp2375
*/

require_once('database.php'); require_once('chair.php');
$db = getDB();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Chair::remove($db, $_POST['ChairID']);
    echo "<h2>Chair #{$_POST['ChairID']} successfully removed</h2>";
}
?>