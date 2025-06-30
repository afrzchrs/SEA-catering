<?php
session_start();

function sanitize($data) {
  return htmlspecialchars(strip_tags(trim($data)));
}

$username = sanitize($_POST['username'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';

// Validasi password
$validPassword = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!]).{8,}$/', $password);

if (!$username || !$email || !$password || !$validPassword) {
  header("Location: register.html?error=validation");
  exit();
}

// Hash password dengan SHA-256
$hashedPassword = hash('sha256', $password); // GANTI dari password_hash()

$conn = new mysqli("localhost", "root", "", "catering");
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashedPassword);

if ($stmt->execute()) {
  header("Location: ../auth.php?register=success");
  exit();
} else {
  header("Location: ../register.php?error=duplicate");
}
exit();
?>
