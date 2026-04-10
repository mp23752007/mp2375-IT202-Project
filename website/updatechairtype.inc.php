<?php
/* Name: Mahi Patel | IT-202-004 | Phase 5 */
if (!isset($_SESSION['login'])) {
    exit();
}
require_once('database.php');
require_once('chairtype.php');

$db = getDB();
$id = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
$type = ChairType::find($db, $id);

if (!$type) {
    echo "<h2>Error: Category #$id not found.</h2>";
    return;
}
?>

<h2>Update Category #<?= htmlspecialchars($id) ?></h2>
<form id="updateTypeForm" action="index.php?content=changechairtype.test" method="post" onsubmit="return validateTypeForm()">
    <input type="hidden" name="ChairTypeID" value="<?= $id ?>">

    <p>Category Code (2-10 chars):<br>
        <input type="text" id="type_code" name="ChairTypeCode" value="<?= htmlspecialchars($type['chair_type_code']) ?>" required>
    </p>

    <p>Category Name (2-100 chars):<br>
        <input type="text" id="type_name" name="ChairTypeName" value="<?= htmlspecialchars($type['chair_type_name']) ?>" required>
    </p>

    <p>Aisle Number (1-100):<br>
        <input type="number" id="aisle_num" name="ChairAisleNumber" value="<?= $type['chair_aisle_number'] ?>" required>
    </p>

    <input type="submit" value="Update Category">
</form>

<script>
    function validateTypeForm() {
        let name = document.getElementById('type_name').value;
        let aisle = document.getElementById('aisle_num').value;

        if (name.length < 2) {
            alert("Category name must be at least 2 characters!");
            return false;
        }
        if (aisle < 1 || aisle > 100) {
            alert("Aisle number must be between 1 and 100!");
            return false;
        }
        return true;
    }
</script>