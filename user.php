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

$user_id = $_SESSION['user_id']; 
$sql = "SELECT * FROM data_subscription WHERE status != 'Cancelled' AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id); 
$stmt->execute();
$result = $stmt->get_result();
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
          <li><a href="#Subscription">Subscription</a></li>
          <li class="dropdown">
            <?php if (isset($_SESSION['user_id'])) { ?>  
            <a><img src="assets/img/testimonials/<?= htmlspecialchars($_SESSION['profile_image'] ?? 'default.jpg') ?>" 
              width="32" height="32" class="rounded-circle shadow">
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
    <!-- Page Section -->
    <section id="akun" class="akun">
      <div class="page-title" data-aos="fade">
        <div class="container">
          <div class="profile-header d-flex flex-column flex-md-row align-items-center gap-4">
            <div class="profile-image">
              <img src="assets/img/testimonials/<?= htmlspecialchars($_SESSION['profile_image'] ?? 'default.jpg') ?>" 
              width="150" height="150" class="rounded-circle shadow">
            </div>
            <div class="profile-info">
              <h1 class="mb-2"><?= htmlspecialchars($_SESSION['username'] ?? 'John Doe') ?></h1>
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-envelope me-1"></i>
                <span><?= htmlspecialchars($_SESSION['email'] ?? 'john.doe@example.com') ?></span>
              </div>
              <div class="d-flex gap-2">
                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                  <i class="bi bi-pencil"></i> Edit Profile
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- subscription Section Section -->
    <section id="Subscription" class="starter-section section">
      <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="subscription-heading mb-0"><strong>My Subscriptions</strong></h2>
          <a href="index.php#book-a-table" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Subscription
          </a>
        </div>

        <?php if ($result && $result->num_rows > 0): ?>
          <div class="row g-4">
            <?php while ($row = $result->fetch_assoc()): ?>
              <div class="col-md-6">
                <div class="card subscription-card h-100 border-0 shadow-sm">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                      <div>
                        <span class="badge bg-<?= $row['status'] === 'Active' ? 'success' : 'warning' ?> mb-2">
                          <?= htmlspecialchars($row['status']) ?>
                        </span>
                        <h5 class="card-title mb-1 fw-bold">
                          <?= htmlspecialchars($row['plan']) ?> Plan
                        </h5>
                        <p class="text-muted small mb-2">Since <?= date('M d, Y', strtotime($row['created_at'] ?? 'now')) ?></p>
                      </div>
                    </div>

                    <div class="subscription-details mb-4">
                      <div class="row g-3">
                        <div class="col-6">
                          <div class="detail-item">
                            <i class="bi bi-egg-fried me-2 text-primary"></i>
                            <span>Meal Types:</span>
                            <strong><?= htmlspecialchars($row['meal_type']) ?></strong>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="detail-item">
                            <i class="bi bi-calendar-event me-2 text-primary"></i>
                            <span>Delivery Days:</span>
                            <strong><?= htmlspecialchars($row['delivery_days']) ?></strong>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="detail-item">
                            <i class="bi bi-cash-coin me-2 text-primary"></i>
                            <span>Total Price:</span>
                            <strong>Rp <?= number_format($row['total_harga']) ?></strong>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="detail-item">
                            <i class="bi bi-credit-card me-2 text-primary"></i>
                            <span>Payment:</span>
                            <strong><?= htmlspecialchars($row['payment_method']) ?></strong>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php if ($row['status'] === 'Paused'): ?>
                      <div class="alert alert-warning p-2 mb-3">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Paused:</strong> <?= $row['pause_start'] ?> to <?= $row['pause_end'] ?>
                      </div>
                    <?php endif; ?>

                    <button type="button" class="btn btn-warning btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#PauseModal-<?= $row['id'] ?>">
                      Pause Subscription
                    </button>
                    
                    <form action="forms\cancel.php" method="POST" class="d-inline ms-2">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to cancel this subscription?')">Cancel Subscription</button>
                    </form>

                  </div>
                </div>
              </div>
              <!-- Pause Modal -->
              <div class="modal fade" id="PauseModal-<?= $row['id'] ?>" aria-labelledby="PauseModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header border-0">
                              <h5 class="modal-title fw-bold">Pause Subscription #<?= $row['id'] ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="forms/pause.php" method="POST">
                              <div class="modal-body py-4">
                                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                  
                                  <div class="alert alert-info">
                                      <i class="bi bi-info-circle me-2"></i>
                                      You can pause your subscription for up to 30 days.
                                  </div>
                                  
                                  <div class="row g-3">
                                      <div class="col-md-6">
                                          <label for="start_date-<?= $row['id'] ?>" class="form-label fw-medium">Start Date</label>
                                          <input type="date" class="form-control" id="start_date-<?= $row['id'] ?>" 
                                                name="start_date" required min="<?= date('Y-m-d') ?>">
                                      </div>
                                      <div class="col-md-6">
                                          <label for="end_date-<?= $row['id'] ?>" class="form-label fw-medium">End Date</label>
                                          <input type="date" class="form-control" id="end_date-<?= $row['id'] ?>" 
                                                name="end_date" required>
                                      </div>
                                  </div>
                                  
                                  <div class="form-text mt-2">
                                      During the pause period, you won't be charged and won't receive meals.
                                  </div>
                              </div>
                              <div class="modal-footer border-0">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary">Confirm Pause</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php else: ?>
          <div class="empty-state text-center py-5">
            <div class="empty-state-icon mb-4">
              <i class="bi bi-emoji-frown display-4 text-muted"></i>
            </div>
            <h4 class="mb-3">No Active Subscriptions</h4>
            <p class="text-muted mb-4">You don't have any active subscriptions yet. Start by adding a new one.</p>
            <a href="index.php#book-a-table" class="btn btn-primary px-4">
              <i class="bi bi-plus-lg me-2"></i>Add Subscription
            </a>
          </div>
        <?php endif; ?>
      </div>
      <!-- Edit Profile Modal -->
      <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="forms\updateUser.php" method="POST" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <!-- Username -->
              <div class="mb-3">
                <label for="editUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="editUsername" name="username" required value="<?= htmlspecialchars($_SESSION['username'] ?? '') ?>">
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="editPassword" class="form-label">New Password <small class="text-muted">(leave blank if unchanged)</small></label>
                <input type="password" class="form-control" id="editPassword" name="password" placeholder="••••••••">
              </div>

              <!-- Profile Picture -->
              <div class="mb-3">
                <label for="editProfileImage" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="editProfileImage" name="profile_image" accept="image/*">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>

    </section>

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</html>
<?php $conn->close(); ?>