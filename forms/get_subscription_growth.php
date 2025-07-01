<?php
header('Content-Type: application/json');
$mysqli = new mysqli("localhost", "root", "", "catering");
if ($mysqli->connect_error) {
    die(json_encode(['error' => 'Koneksi gagal']));
}

$range = $_GET['range'] ?? '7';
$interval = match($range) {
    '30' => '30 DAY',
    '90' => '90 DAY',
    '365' => '365 DAY',
    default => '7 DAY'
};

$query = "
    SELECT DATE(subs_date) AS date, COUNT(*) AS count
    FROM data_subscription
    WHERE subs_date >= DATE_SUB(CURDATE(), INTERVAL $interval)
    GROUP BY DATE(subs_date)
    ORDER BY date ASC
";

$result = $mysqli->query($query);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'date' => $row['date'],
        'count' => (int)$row['count']
    ];
}

echo json_encode($data);
?>
