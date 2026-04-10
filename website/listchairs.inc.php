<?php
/* Name: Mahi Patel | IT-202-004 | Phase 5 */
if (!isset($_SESSION['login'])) { exit(); }
require_once('database.php');
require_once('chair.php');

$db = getDB();
$res = Chair::listAll($db);
$chairs = [];
while ($row = $res->fetch_assoc()) { $chairs[] = $row; }
?>

<h2>Chairs Inventory</h2>
<table border="1" cellpadding="10" style="width:100%; border-collapse: collapse; background-color: #FDF5F6;">
    <tr style="background-color: #F5ADB6; color: #1E1309;">
        <th>ID</th><th>Name</th><th>Price</th><th>Actions</th>
    </tr>
    <?php foreach ($chairs as $row): ?>
    <tr>
        <td><?= $row['chair_id'] ?></td>
        <td><?= htmlspecialchars($row['chair_name']) ?></td>
        <td>$<?= number_format($row['chair_sell_price'], 2) ?></td>
        <td>
            <button onclick="location.href='index.php?content=updatechair&chairID=<?= $row['chair_id'] ?>'">View/Update</button>
            <button onclick="confirmDelete(<?= $row['chair_id'] ?>, '<?= htmlspecialchars($row['chair_name']) ?>')" style="background:#A56258;">Delete</button>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
function confirmDelete(id, name) {
    if (confirm("Are you sure you want to delete " + name + " (ID: " + id + ")?")) {
        window.location.href = 'index.php?content=removechair.test&ChairID=' + id;
    }
}
</script>