<?php
/* Name: Mahi Patel 
   Date: April 3, 2026 
   Course: IT-202-004 
   Assignment: Phase 4
   Email: mp2375@njit.edu 
*/
if (!isset($_SESSION['login'])) {
    exit();
}
require_once('database.php');
require_once('chair.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['chair_id'];
    $type_id = $_POST['chair_type_id'];
    $code = $_POST['chair_code'];
    $name = htmlspecialchars($_POST['chair_name']);
    $desc = htmlspecialchars($_POST['chair_description']);
    $buy = $_POST['chair_buy_price'];
    $sell = $_POST['chair_sell_price'];

    if (!empty($id) && !empty($name)) {
        try {
            $db = getDB();
            $c = new Chair($id, $code, $name, $desc, "Wood", "Standard", $type_id, $buy, $sell);

            if ($c->save($db)) {
                echo "<h2>Update Success</h2>";
                echo "<p>Chair <strong>$name</strong> added!</p>";
                echo "<p><a href='index.php?content=listchairs'>Go to Inventory</a></p>";
            } else {
                echo "<h2>Error</h2><p>Database rejected the save. Use a unique ID like 999.</p>";
            }
        } catch (Exception $e) {
            echo "<h2>Database Error</h2><p>" . $e->getMessage() . "</p>";
        }
    } else {
        echo "<h2>Input Error</h2><p>Data was missing. Please try again.</p>";
    }
} else {
    echo "<h2>Direct access denied</h2>";
}
