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

$db = getDB(); 
$res = Chair::listAll($db);
$chairs = [];
while($row = $res->fetch_assoc()) { $chairs[] = $row; }
?>
<h2>Chairs Inventory</h2>

<form action="index.php" method="get">
    <input type="hidden" name="content" value="updatechair">
    <strong>Select an Item:</strong> 
    <select name="chairID" style="background-color: #FDF5F6 !important;">
        <?php foreach ($chairs as $row): ?>
            <option value="<?= $row['chair_id'] ?>">
                <?= htmlspecialchars($row['chair_name']) ?> - $<?= number_format($row['chair_sell_price'], 2) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Select Chair</button>
</form>

<br><hr><br>

<table border="1" cellpadding="10" style="width:100%; border-collapse: collapse; background-color: #FDF5F6;">
    <tr style="background-color: #F5ADB6; color: #1E1309;">
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach($chairs as $row): ?>
    <tr>
        <td><?= $row['chair_id'] ?></td>
        <td><?= htmlspecialchars($row['chair_name']) ?></td>
        <td>$<?= number_format($row['chair_sell_price'], 2) ?></td>
        <td>
            <a href="index.php?content=updatechair&chairID=<?= $row['chair_id'] ?>" 
               style="color: #A56258; font-weight: bold; text-decoration: underline;">Update</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>