<?php
global $conn;

$dateStart = isset($dateStart) ? $dateStart : date('Y-m-01');
$dateEnd = isset($dateEnd) ? $dateEnd : date('Y-m-d');

// Gunakan pause_end yang ada di tabel
$query = "SELECT COUNT(*) as count FROM data_subscription 
          WHERE status = 'Active' AND pause_end IS NOT NULL
          AND pause_end BETWEEN ? AND ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $dateStart, $dateEnd);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo json_encode([
    'count' => $row['count'],
    'subtext' => "Period: " . date('M j', strtotime($dateStart)) . " - " . date('M j', strtotime($dateEnd))
]);
?>