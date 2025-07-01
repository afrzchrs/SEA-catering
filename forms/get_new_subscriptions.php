<?php
global $conn;

// Ambil parameter
$dateStart = isset($dateStart) ? $dateStart : date('Y-m-01');
$dateEnd = isset($dateEnd) ? $dateEnd : date('Y-m-d');

$query = "SELECT COUNT(*) as count FROM data_subscription"; 

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo json_encode([
    'count' => $row['count'],
    'subtext' => "Period: " . date('M j', strtotime($dateStart)) . " - " . date('M j', strtotime($dateEnd))
]);
?>