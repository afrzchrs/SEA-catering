<?php
global $conn;

// Query untuk menghitung langganan aktif
$query = "SELECT COUNT(*) as count FROM data_subscription WHERE status = 'Active'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

// Hitung pertumbuhan - gunakan subs_date bukan created_at
$lastMonth = date('Y-m-01', strtotime('-1 month'));
$queryLast = "SELECT COUNT(*) as last_count FROM data_subscription 
              WHERE status = 'Active' AND subs_date <= '$lastMonth'";
$resultLast = $conn->query($queryLast);
$rowLast = $resultLast->fetch_assoc();

$growth = 0;
if ($rowLast['last_count'] > 0) {
    $growth = (($row['count'] - $rowLast['last_count']) / $rowLast['last_count']) * 100;
}

echo json_encode([
    'count' => $row['count'],
    'subtext' => "Total active subscriptions",
    'growth' => round($growth, 1)
]);
?>