<?php 
/* Name: Mahi Patel 
   Date: April 3, 2026 
   Course: IT-202-004 
   Assignment: Phase 4
*/
if (!isset($_SESSION['login'])) { exit(); }
require_once('database.php'); 
require_once('chair.php');

$db = getDB();
$id = filter_input(INPUT_GET, 'chairID', FILTER_VALIDATE_INT);
$chair = Chair::find($db, $id);

if (!$chair) { echo "<h2>Error: Chair #$id not found.</h2>"; return; }
?>
<h2>Update Chair #<?= htmlspecialchars($id) ?></h2>
<form action="index.php?content=changechair" method="post">
    <input type="hidden" name="chair_id" value="<?= $id ?>">
    
    <p>Chair Code (2-10 chars):<br>
    <input type="text" name="chair_code" value="<?= htmlspecialchars($chair['chair_code']) ?>" 
           minlength="2" maxlength="10" required></p>
    
    <p>Name (3-100 chars):<br>
    <input type="text" name="chair_name" value="<?= htmlspecialchars($chair['chair_name']) ?>" 
           minlength="3" maxlength="100" required></p>
    
    <p>Description (10-255 chars):<br>
    <textarea name="chair_description" minlength="10" maxlength="255" required 
              style="width: 300px; height: 60px;"><?= htmlspecialchars($chair['chair_description']) ?></textarea></p>

    <p>Category Type ID (1-100):<br>
    <input type="number" name="chair_type_id" value="<?= $chair['chair_type_id'] ?>" 
           min="1" max="100" required></p>

    <p>Buy Price ($0.01 - $5000.00):<br>
    <input type="number" step="0.01" name="chair_buy_price" value="<?= $chair['chair_buy_price'] ?>" 
           min="0.01" max="5000.00" required></p>

    <p>Sell Price ($0.01 - $9999.99):<br>
    <input type="number" step="0.01" name="chair_sell_price" value="<?= $chair['chair_sell_price'] ?>" 
           min="0.01" max="9999.99" required></p>

    <input type="submit" name="action" value="Update Item">
    <input type="submit" name="action" value="Cancel" formnovalidate>
</form>