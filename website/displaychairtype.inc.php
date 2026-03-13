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
require_once('chairtype.php');
$db = getDB();
$typeID = $_GET['typeID'] ?? '';

if (empty($typeID) || !is_numeric($typeID)) {
    echo "<h2>Error: Invalid or missing Type ID. Please enter a valid number.</h2>";
    return;
}

$type = ChairType::find($db, $typeID);
if (!$type) {
    echo "<h2>Error: Category Type ID $typeID was not found.</h2>";
    return;
}
?>
<h2>Category Details</h2>
<p><strong>Name:</strong> <?= $type['chair_type_name'] ?> (Code: <?= $type['chair_type_code'] ?>)</p>
<p><strong>Aisle Number:</strong> <?= $type['chair_aisle_number'] ?></p>

<hr>
<h3>Items inside this Category</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Chair ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Material</th>
        <th>Style</th>
        <th>Sell Price</th>
    </tr>
    <?php
    $stmt = $db->prepare("SELECT * FROM chairs WHERE chair_type_id = ?");
    $stmt->bind_param("i", $typeID);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
        echo "<tr><td colspan='6'>No chairs currently assigned to this category.</td></tr>";
    } else {
        while ($row = $res->fetch_assoc()):
    ?>
            <tr>
                <td><?= $row['chair_id'] ?></td>
                <td><?= $row['chair_code'] ?></td>
                <td><?= $row['chair_name'] ?></td>
                <td><?= $row['chair_material'] ?></td>
                <td><?= $row['chair_style'] ?></td>
                <td>$<?= number_format($row['chair_sell_price'], 2) ?></td>
            </tr>
    <?php
        endwhile;
    }
    ?>
</table>