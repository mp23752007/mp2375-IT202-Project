<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) {
    echo "<h2>Error: You must be logged in.</h2>";
    return;
}
require_once('database.php');
require_once('chair.php');
$db = getDB();
$res = Chair::listAll($db);

// Save results to an array
$chairs = [];
while ($row = $res->fetch_assoc()) {
    $chairs[] = $row;
}
?>
<h2>Chairs Inventory</h2>

<form action="index.php" method="get">
    <input type="hidden" name="content" value="updatechair">
    <select name="chairID">
        <?php foreach ($chairs as $row): ?>
            <option value="<?= $row['chair_id'] ?>"><?= $row['chair_name'] ?> - $<?= number_format($row['chair_sell_price'], 2) ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Select Chair">
</form>

<br>
<hr><br>

<table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%; text-align: left;">
    <tr style="background-color: #f2f2f2;">
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Material</th>
        <th>Style</th>
        <th>Sell Price</th>
    </tr>
    <?php foreach ($chairs as $row): ?>
        <tr>
            <td><?= $row['chair_id'] ?></td>
            <td><?= $row['chair_code'] ?></td>
            <td><?= $row['chair_name'] ?></td>
            <td><?= $row['chair_material'] ?></td>
            <td><?= $row['chair_style'] ?></td>
            <td>$<?= number_format($row['chair_sell_price'], 2) ?></td>
        </tr>
    <?php endforeach; ?>
</table>