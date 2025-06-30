<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "catering";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil semua langganan aktif
$sql = "SELECT * FROM data_subscription WHERE status != 'Cancelled'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard - SEA Catering</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet"> 
</head>
<body>
<div class="container my-5">
  <h2 class="mb-4">📋 Your Subscriptions</h2>

  <?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($row['plan']) ?> Plan</h5>
          <p><strong>Meal Types:</strong> <?= htmlspecialchars($row['meal_type']) ?></p>
          <p><strong>Delivery Days:</strong> <?= htmlspecialchars($row['delivery_days']) ?></p>
          <p><strong>Total Price:</strong> Rp <?= number_format($row['total_harga']) ?></p>
          <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>

          <?php if ($row['status'] === 'Paused'): ?>
            <p class="text-warning"><strong>Paused:</strong> <?= $row['pause_start'] ?> to <?= $row['pause_end'] ?></p>
          <?php endif; ?>

          <form action="forms\pause.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="date" name="start_date" required>
            <input type="date" name="end_date" required>
            <button type="submit" class="btn btn-warning btn-sm">Pause</button>
          </form>

          <form action="forms\cancel.php" method="POST" class="d-inline ms-2">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to cancel this subscription?')">Cancel</button>
          </form>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <div class="alert alert-info">You have no active subscriptions.</div>
  <?php endif; ?>

</div>
</body>
</html>

<?php $conn->close(); ?>
