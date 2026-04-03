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
    $type_id = filter_input(INPUT_POST, 'chair_type_id', FILTER_VALIDATE_INT);
    $buy = filter_input(INPUT_POST, 'chair_buy_price', FILTER_VALIDATE_FLOAT);
    $sell = filter_input(INPUT_POST, 'chair_sell_price', FILTER_VALIDATE_FLOAT);

    if ($id === false || $type_id === false || $buy === false || $sell === false) {
        echo "<h2>Error</h2><p>Validation failed. Please check your inputs.</p>";
    } else {
        try {
            $db = getDB();
            $name = htmlspecialchars($_POST['chair_name']);
            $c = new Chair($id, $_POST['chair_code'], $name, $_POST['chair_description'], 
                           "Wood", "Standard", $type_id, $buy, $sell);
            
            if ($c->save($db)) {
                echo "<h2>Success</h2><p>Chair <strong>" . $name . "</strong> has been added to the inventory.</p>";
            }
        } catch (PDOException $e) {
            echo "<h2>Error</h2><p>Database error: " . $e->getMessage() . "</p>";
        }
    }
}
?>