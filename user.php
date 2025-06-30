<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "catering";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

session_start();

// Ambil semua langganan aktif
$sql = "SELECT * FROM data_subscription WHERE status != 'Cancelled'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SEA - Catering App</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

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

<body class="index-page">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1 class="sitename">User Dashboard</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#akun">Akun Anda</a></li>
          <li><a href="#Subsciption">Subscription</a></li>
          <li><a href="#Rating">Rating Management</a></li>
          <li class="dropdown">
            <?php if (isset($_SESSION['user_id'])) { ?>  
            <a><img src="assets\img\testimonials\default.jpg" width="32" height="32" class="rounded-circle me-2">
              <span class="d-none d-sm-inline"><?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span> 
              <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul> 
              <li><a href="index.php">
                    <img src="assets\img\dashboard.png" width="20" height="20">
                    <span>Home Page</span>
                  </a>
              </li>
              <li><a href="forms/logout.php">
                    <img src="assets/img/power-off.png" width="20" height="20">
                    <span>Logout</span>
                  </a>
              </li>
            </ul> 
            <?php } ?>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <h1>Starter Page</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Starter Page</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
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

    </section><!-- /Starter Section Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Contact person</h4>
            <p>Brian</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+628123456789</span><br>
              <strong>Email:</strong> <span>Brian@mail.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Service Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 09PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Contact Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">SEA Catering </strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</html>
<?php $conn->close(); ?>