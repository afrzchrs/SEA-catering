<?php
session_start();

// Koneksi database (gunakan MySQLi secara konsisten)
$host = "localhost";
$user = "root";
$password = "";
$database = "catering";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function getDataFromPhp($file, $params = []) {
    global $conn; 
    
    extract($params); 
    ob_start();
    include __DIR__ . '/' . $file;
    $output = ob_get_clean();
    return json_decode($output, true);
}


$dateStart = isset($_GET['dateStart']) ? $_GET['dateStart'] : date('Y-m-01');
$dateEnd = isset($_GET['dateEnd']) ? $_GET['dateEnd'] : date('Y-m-d');

$allSubs = getDataFromPhp('get_new_subscriptions.php');
$activeSubs = getDataFromPhp('get_active_subscriptions.php');
$monthlyRevenue = getDataFromPhp('get_monthly_revenue.php', [
    'dateStart' => $dateStart,
    'dateEnd' => $dateEnd
]);
$reactivations = getDataFromPhp('get_reactivations.php', [
    'dateStart' => $dateStart,
    'dateEnd' => $dateEnd
]);

// Ambil data pelanggan
$customers = [];
$customersQuery = "
    SELECT u.id, u.username, u.email, d.no_telp AS phone, d.status
    FROM users u
    LEFT JOIN data_subscription d ON u.id = d.user_id
    WHERE u.role = 'user'
    ORDER BY u.id DESC
    LIMIT 10
";
$customersResult = $conn->query($customersQuery);
if ($customersResult) {
    $customers = $customersResult->fetch_all(MYSQLI_ASSOC);
}

$status = $_GET['status'] ?? 'all';
$subscriptions = [];

$subQuery = "SELECT s.*, u.username AS customer_name 
             FROM data_subscription s 
             JOIN users u ON s.user_id = u.id";
if ($status !== 'all') {
    $subQuery .= " WHERE s.status = '" . $conn->real_escape_string($status) . "'";
}
$subQuery .= " ORDER BY s.subs_date DESC";
$subsResult = $conn->query($subQuery);
if ($subsResult) {
    $subscriptions = $subsResult->fetch_all(MYSQLI_ASSOC);
}
