<?php
/* Name: Mahi Patel | IT-202-004 | Phase 5 */
if (!isset($_SESSION['login'])) { exit(); }
require_once('database.php'); 
require_once('chairtype.php');

$db = getDB();
$typeID = filter_input(INPUT_GET, 'ChairTypeID', FILTER_VALIDATE_INT);

if ($typeID) {
    ChairType::remove($db, $typeID);
    echo "<h2>Success</h2>";
    echo "<p>Category #$typeID successfully removed.</p>";
    echo "<p><a href='index.php?content=listchairtypes'>Return to Categories</a></p>";
} else {
    echo "<h2>Error</h2><p>No Category ID provided.</p>";
}
?>