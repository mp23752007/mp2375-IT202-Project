<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) { exit(); }
require_once('database.php'); require_once('chairtype.php');
$db = getDB(); 
$res = ChairType::listAll($db);
$types = [];
while($row = $res->fetch_assoc()) { $types[] = $row; }
?>
<h2>Chair Categories</h2>

<form action="index.php" method="get">
    <input type="hidden" name="content" value="displaychairtype">
    <strong>Select a Category:</strong> 
    <select name="typeID">
        <?php foreach($types as $row): ?>
            <option value="<?= $row['chair_type_id'] ?>">
                <?= htmlspecialchars($row['chair_type_name']) ?> (<?= htmlspecialchars($row['chair_type_code']) ?>)
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Select Category</button>
</form>

<br><hr><br>

<table border="1" cellpadding="10" style="width:100%; border-collapse: collapse; background:#FDF5F6;">
    <tr style="background:#F5ADB6; color:#1E1309;">
        <th>Type ID</th><th>Code</th><th>Name</th><th>Aisle</th>
    </tr>
    <?php foreach($types as $row): ?>
    <tr>
        <td><?= $row['chair_type_id'] ?></td>
        <td><?= htmlspecialchars($row['chair_type_code']) ?></td>
        <td><?= htmlspecialchars($row['chair_type_name']) ?></td>
        <td><?= $row['chair_aisle_number'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>