<?php 
/* Name: Mahi Patel 
   Date: April 3, 2026 
   Course: IT-202-004 
   Assignment: Phase 4
   Email: mp2375@njit.edu 
*/
if (!isset($_SESSION['login'])) { exit(); }
require_once('database.php'); 
require_once('chairtype.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'chair_type_id', FILTER_VALIDATE_INT);
    $aisle = filter_input(INPUT_POST, 'chair_aisle_number', FILTER_VALIDATE_INT);
    
    $code = htmlspecialchars($_POST['chair_type_code']);
    $name = htmlspecialchars($_POST['chair_type_name']);

    if (is_int($id) && is_int($aisle)) {
        $db = getDB();
        $c = new ChairType($id, $code, $name, $aisle);
        $c->save($db);
        echo "<h2>Success</h2><p>Category " . $name . " successfully added!</p>";
    } else {
        echo "<h2>Error</h2><p>Numeric validation failed. ID and Aisle must be whole numbers.</p>";
    }
}
?>