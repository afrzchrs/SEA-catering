<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "catering";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$status = $_GET['status'] ?? 'all';

$where = '';
if ($status === 'active') {
  $where = "WHERE status = 'active'";
} elseif ($status === 'paused') {
  $where = "WHERE status = 'paused'";
} elseif ($status === 'cancelled') {
  $where = "WHERE status = 'cancelled'";
}

$sql = "
  SELECT 
    id,
    name AS customer_name,
    plan,
    subs_date AS start_date,
    DATE_ADD(subs_date, INTERVAL 30 DAY) AS end_date,
    status,
    total_harga AS amount
  FROM data_subscription
  $where
  ORDER BY id DESC
";

$result = $conn->query($sql);
$subscriptions = [];

if ($result) {
  $subscriptions = $result->fetch_all(MYSQLI_ASSOC);
}

return $subscriptions;
?>
