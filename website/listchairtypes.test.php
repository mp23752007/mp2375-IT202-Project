<?php
require_once('database.php'); require_once('chairtype.php');
$db = getDB(); $res = ChairType::listAll($db);
echo "<h2>Chair Categories</h2>";
while($r = $res->fetch_assoc()) {
    echo "<h3>ID: {$r['chair_type_id']} | Name: {$r['chair_type_name']} | Created: {$r['date_time_created']}</h3>";
}
?>