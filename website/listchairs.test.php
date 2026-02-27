<?php
require_once('database.php'); require_once('chair.php');
$db = getDB(); $res = Chair::listAll($db);
echo "<h2>Chair Inventory Items</h2>";
while($r = $res->fetch_assoc()) {
    echo "<h3>ID: {$r['chair_id']} | Name: {$r['chair_name']} | Created: {$r['date_time_created']}</h3>";
}
?>