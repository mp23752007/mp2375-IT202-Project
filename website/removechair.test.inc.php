<?php
/* Name: Mahi Patel | IT-202-004 | Phase 5 */
if (!isset($_SESSION['login'])) { exit(); }
require_once('database.php'); 
require_once('chair.php');

$db = getDB();
$chairID = filter_input(INPUT_GET, 'ChairID', FILTER_VALIDATE_INT);

if ($chairID && Chair::remove($db, $chairID)) {
    echo "<h2>Success</h2>";
    echo "<p style='color: #A56258; font-weight: bold;'>Chair #$chairID has been successfully removed.</p>";
    echo "<p><a href='index.php?content=listchairs'>Return to Inventory List</a></p>";
} else {
    echo "<h2>Error</h2><p>Could not delete Chair #$chairID.</p>";
}
?>