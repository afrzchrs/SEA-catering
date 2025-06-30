<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $start = $_POST['start_date'];
  $end = $_POST['end_date'];

  $conn = new mysqli("localhost", "root", "", "catering");
  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  $sql = "UPDATE data_subscription SET status='Paused', pause_start=?, pause_end=? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $start, $end, $id);

  if ($stmt->execute()) {
    header("Location: dashboard.php");
  } else {
    echo "Gagal menjeda: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
