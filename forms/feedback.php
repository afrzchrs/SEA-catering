<?php
// Koneksi database (gunakan MySQLi secara konsisten)
$host = "localhost";
$user = "root";
$password = "";
$database = "catering";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil filter dari URL
$filter = $_GET['filter'] ?? 'all';
$whereClause = '';
$filterLabel = 'All Ratings';

switch ($filter) {
    case '5':
        $whereClause = 'WHERE rating = 5';
        $filterLabel = '5 Stars';
        break;
    case '4':
        $whereClause = 'WHERE rating = 4';
        $filterLabel = '4 Stars';
        break;
    case '1-3':
        $whereClause = 'WHERE rating BETWEEN 1 AND 3';
        $filterLabel = '1–3 Stars';
        break;
    default:
        $whereClause = ''; // All
        break;
}

// Pagination setup
$limit = 5;
$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($currentPage - 1) * $limit;

// Total count
$countQuery = "SELECT COUNT(*) AS total FROM testimonies $whereClause";
$totalResult = $conn->query($countQuery);
$totalRows = $totalResult->fetch_assoc()['total'] ?? 0;
$totalPages = ceil($totalRows / $limit);

// Ambil data feedback
$query = "SELECT * FROM testimonies $whereClause ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($query);
$feedbacks = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
