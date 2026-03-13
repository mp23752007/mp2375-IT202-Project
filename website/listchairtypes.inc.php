<?php
/* Name: Mahi Patel 
Date: March 13, 2026
Course: IT-202
Section: 004
Assignment: Phase 3
Email: mp2375
*/
if (!isset($_SESSION['login'])) { echo "<h2>Error: You must be logged in.</h2>"; return; }
require_once('database.php'); 
require_once('chairtype.php');
$db = getDB(); 
$res = ChairType::listAll($db);
?>
<h2>Chair Categories</h2>

<table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%; text-align: left;">
    <tr style="background-color: #f2f2f2;">
        <th>Type ID</th>
        <th>Type Code</th>
        <th>Category Name</th>
        <th>Aisle Number</th>
    </tr>
    <?php while($row = $res->fetch_assoc()): ?>
    <tr>
        <td><?= $row['chair_type_id'] ?></td>
        <td><?= $row['chair_type_code'] ?></td>
        <td><?= $row['chair_type_name'] ?></td>
        <td><?= $row['chair_aisle_number'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>