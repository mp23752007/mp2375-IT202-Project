<?php
/* Name: Mahi Patel | IT-202-004 | Phase 5 */
if (!isset($_SESSION['login'])) {
    exit();
}
require_once('database.php');
require_once('chairtype.php');

$db = getDB();
$res = ChairType::listAll($db);
$types = [];
while ($row = $res->fetch_assoc()) {
    $types[] = $row;
}
?>

<h2>Chair Categories</h2>
<table border="1" cellpadding="10" style="width:100%; border-collapse: collapse; background:#FDF5F6;">
    <tr style="background:#F5ADB6; color:#1E1309;">
        <th>Type ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Aisle</th>
        <th>Actions (JS)</th>
    </tr>
    <?php foreach ($types as $row): ?>
        <tr>
            <td><?= $row['chair_type_id'] ?></td>
            <td><?= htmlspecialchars($row['chair_type_code']) ?></td>
            <td><?= htmlspecialchars($row['chair_type_name']) ?></td>
            <td><?= $row['chair_aisle_number'] ?></td>
            <td>
                <button onclick="viewType(<?= $row['chair_type_id'] ?>)">View</button>
                <button onclick="updateType(<?= $row['chair_type_id'] ?>)">Update</button>
                <button onclick="confirmDeleteType(<?= $row['chair_type_id'] ?>, '<?= htmlspecialchars($row['chair_type_name']) ?>')" style="background-color: #A56258;">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
    function viewType(id) {
        window.location.href = 'index.php?content=displaychairtype&typeID=' + id;
    }

    function updateType(id) {
        window.location.href = 'index.php?content=updatechairtype&typeID=' + id;
    }

    function confirmDeleteType(id, name) {
        if (confirm("Are you sure you want to delete the category: " + name + "?")) {
            window.location.href = 'index.php?content=removechairtype.test&ChairTypeID=' + id;
        }
    }
</script>