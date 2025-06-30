<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];

  $conn = new mysqli("localhost", "root", "", "catering");
  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  $sql = "UPDATE data_subscription SET status='Cancelled' WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: dashboard.php");
  } else {
    echo "Gagal membatalkan: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
