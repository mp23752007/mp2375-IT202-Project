<?php
/* Name: Mahi Patel | Date: April 9, 2026 | Course: IT-202 | Phase 5 */
if (!isset($_SESSION['login'])) {
       exit();
}
require_once('database.php');
require_once('chair.php');

$db = getDB();
$id = filter_input(INPUT_GET, 'chairID', FILTER_VALIDATE_INT);

if (!$id) {
       echo "<h2>Error: Invalid Chair ID.</h2>";
       return;
}

$chair = Chair::find($db, $id);

if (!$chair) {
       echo "<h2>Error: Chair #$id not found.</h2>";
       return;
}
?>

<h2>Update Chair #<?= htmlspecialchars($id) ?></h2>

<form id="updateForm" action="index.php?content=changechair" method="post" onsubmit="return validateChairForm()">
       <input type="hidden" name="chair_id" value="<?= $id ?>">

       <p>Chair Name (3-100 chars):<br>
              <input type="text" id="chair_name" name="chair_name"
                     value="<?= htmlspecialchars($chair['chair_name']) ?>" style="width: 300px;">
       </p>

       <p>Sell Price ($0.01 - $9999.99):<br>
              <input type="number" step="0.01" id="sell_price" name="chair_sell_price"
                     value="<?= $chair['chair_sell_price'] ?>">
       </p>

       <input type="hidden" name="chair_code" value="<?= htmlspecialchars($chair['chair_code']) ?>">
       <input type="hidden" name="chair_description" value="<?= htmlspecialchars($chair['chair_description']) ?>">
       <input type="hidden" name="chair_type_id" value="<?= $chair['chair_type_id'] ?>">
       <input type="hidden" name="chair_buy_price" value="<?= $chair['chair_buy_price'] ?>">

       <button type="submit" name="action" value="Update Item">Update Item</button>
</form>

<script>
       function validateChairForm() {
              let name = document.getElementById('chair_name').value;
              let price = document.getElementById('sell_price').value;

              if (name.length < 3) {
                     alert("Chair name must be at least 3 characters!");
                     return false;
              }
              if (price <= 0) {
                     alert("Sell price must be greater than zero!");
                     return false;
              }
              return true;
       }
</script>