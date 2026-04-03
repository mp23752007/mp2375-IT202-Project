<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) { exit(); }
require_once('database.php');
require_once('chair.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'chair_id', FILTER_VALIDATE_INT);
    
    if (isset($_POST['action']) && $_POST['action'] == "Cancel") {
        echo "<h2>Update Canceled</h2>";
        echo "<p style='color: #A56258; font-weight: bold;'>Sorry, no changes were made to Chair #" . htmlspecialchars($id) . ".</p>";
        echo "<p><a href='index.php?content=listchairs'>Return to Inventory</a></p>";
        return;
    }

    $type_id = filter_input(INPUT_POST, 'chair_type_id', FILTER_VALIDATE_INT);
    $buy = filter_input(INPUT_POST, 'chair_buy_price', FILTER_VALIDATE_FLOAT);
    $sell = filter_input(INPUT_POST, 'chair_sell_price', FILTER_VALIDATE_FLOAT);

    if (is_int($id) && is_int($type_id) && is_float($buy) && is_float($sell)) {
        $db = getDB();
        $code = htmlspecialchars($_POST['chair_code']);
        $name = htmlspecialchars($_POST['chair_name']);
        $desc = htmlspecialchars($_POST['chair_description']);
        
        $c = new Chair($id, $code, $name, $desc, "Standard", "Modern", $type_id, $buy, $sell);
        $c->update($db);
        
        echo "<h2>Update Success</h2>";
        echo "<p>Chair <strong>" . $name . "</strong> was successfully updated in the database.</p>";
        echo "<p><a href='index.php?content=listchairs'>View Updated Inventory</a></p>";
    } else {
        echo "<h2>Error</h2><p>Data validation failed. Please ensure prices are decimals and IDs are numbers.</p>";
    }
}
?>