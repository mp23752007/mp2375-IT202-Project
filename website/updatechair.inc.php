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
$chairID = $_GET['chairID'] ?? '';

if (empty($chairID) || !is_numeric($chairID)) {
    echo "<h2>Error: Invalid or missing Chair ID. Please enter a valid number.</h2>";
    return;
}

$chair = Chair::find($db, $chairID);
if (!$chair) {
    echo "<h2>Error: Chair ID $chairID does not exist in the database.</h2>";
    return;
}
?>
<h2>Update Chair #<?= $chair['chair_id'] ?></h2>
<form action="index.php?content=changechair" method="post">
    <input type="hidden" name="chair_id" value="<?= $chair['chair_id'] ?>">
    <table>
        <tr><td><label>chair_code</label></td><td><input type="text" name="chair_code" value="<?= htmlspecialchars($chair['chair_code']) ?>" required></td></tr>
        <tr><td><label>chair_name</label></td><td><input type="text" name="chair_name" value="<?= htmlspecialchars($chair['chair_name']) ?>" required></td></tr>
        <tr><td><label>chair_description</label></td><td><textarea name="chair_description" required><?= htmlspecialchars($chair['chair_description']) ?></textarea></td></tr>
        <tr><td><label>chair_material</label></td><td><input type="text" name="chair_material" value="<?= htmlspecialchars($chair['chair_material']) ?>" required></td></tr>
        <tr><td><label>chair_style</label></td><td><input type="text" name="chair_style" value="<?= htmlspecialchars($chair['chair_style']) ?>" required></td></tr>
        <tr><td><label>chair_type_id</label></td><td><input type="number" name="chair_type_id" value="<?= $chair['chair_type_id'] ?>" required></td></tr>
        <tr><td><label>chair_buy_price</label></td><td><input type="number" step="0.01" name="chair_buy_price" value="<?= $chair['chair_buy_price'] ?>" required></td></tr>
        <tr><td><label>chair_sell_price</label></td><td><input type="number" step="0.01" name="chair_sell_price" value="<?= $chair['chair_sell_price'] ?>" required></td></tr>
    </table>
    <input type="submit" name="action" value="Update Item">
    <input type="submit" name="action" value="Cancel" formnovalidate>
</form>