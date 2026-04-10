<?php
/* Name: Mahi Patel | Date: April 9, 2026 | Course: IT-202 | Phase 5 */
require_once('database.php');
$db = getDB();

$typeCount = $db->query("SELECT COUNT(*) as total FROM chair_types")->fetch_assoc()['total'];
$itemCount = $db->query("SELECT COUNT(*) as total FROM chairs")->fetch_assoc()['total'];
$buyTotal  = $db->query("SELECT SUM(chair_buy_price) as total FROM chairs")->fetch_assoc()['total'] ?? 0;
$sellTotal = $db->query("SELECT SUM(chair_sell_price) as total FROM chairs")->fetch_assoc()['total'] ?? 0;

$stats = [
    'typeCount' => $typeCount,
    'itemCount' => $itemCount,
    'buyTotal'  => number_format($buyTotal, 2),
    'sellTotal' => number_format($sellTotal, 2)
];

header('Content-Type: application/json');
echo json_encode($stats);
?>