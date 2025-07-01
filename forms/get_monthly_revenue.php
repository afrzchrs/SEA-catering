<?php
global $conn;

$dateStart = isset($dateStart) ? $dateStart : date('Y-m-01');
$dateEnd = isset($dateEnd) ? $dateEnd : date('Y-m-d');

// Gunakan subs_date dan total_harga (bukan total_barga)
$query = "SELECT SUM(total_harga) as revenue FROM data_subscription 
          WHERE subs_date BETWEEN ? AND ? AND status = 'Active'";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $dateStart, $dateEnd);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo json_encode([
    'revenue' => number_format($row['revenue']),
    'subtext' => "Period: " . date('M Y', strtotime($dateStart))
]);
?>