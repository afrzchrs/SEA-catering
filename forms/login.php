<?php
session_start();

function sanitize($data) {
  return htmlspecialchars(strip_tags(trim($data)));
}

$identity = sanitize($_POST['identity'] ?? '');
$password = $_POST['password'] ?? '';

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "catering");
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah input adalah email atau username
if (filter_var($identity, FILTER_VALIDATE_EMAIL)) {
  $query = "SELECT id, username, password, role FROM users WHERE email = ?";
} else {
  $query = "SELECT id, username, password, role FROM users WHERE username = ?";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $identity);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Hash password input (dengan SHA-256 untuk mencocokkan)
$hashedInput = hash('sha256', $password);

if ($user && $hashedInput === $user['password']) {
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['role'] = $user['role'];
  
  // Regenerate session ID untuk mencegah session fixation
  session_regenerate_id(true);
  
  header("Location: ../index.php?login=success");
  exit();
} else {
  header("Location: ../auth.php?error=login");
  exit();
}
?>