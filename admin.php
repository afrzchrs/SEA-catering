<?php 
include __DIR__ . '/forms/customer.php';
include __DIR__ . '/forms/subsdata.php';
include __DIR__ . '/forms/feedback.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SEA Catering Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets\css\admin.css">
</head>
<body>
  <nav class="sidebar">
    <div class="sidebar-header">
      <h2>SEA Catering</h2>
      <div class="version">v2.1.0</div>
    </div>
    
    <div class="sidebar-menu">
      <div class="menu-title">Main</div>
      <a href="#dashboard-header" class="active">
        <i class="bi bi-speedometer2"></i>
        <span>Dashboard</span>
      </a>
      <a href="#customers-section">
        <i class="bi bi-people"></i>
        <span>Customers</span>
      </a>
      <a href="#subscribers-section">
        <i class="bi bi-calendar3"></i>
        <span>Subscribers</span>
      </a>
      <a href="#ratings-section">
        <i class="bi bi-credit-card"></i>
        <span>Ratings & Comments</span>
      </a>

      <a data-bs-toggle="modal" data-bs-target="#editProfileModal">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
      <a href="#">
        <i class="bi bi-question-circle"></i>
        <span>Support</span>
      </a>
    </div>
  </nav>

  <main>
    <!-- Dashboard Overview Section -->
    <div class="dashboard-header" id="dashboard-header">
      <h1>Dashboard Overview</h1>

        <!-- Profile Secetion -->  
        <div class="user-profile">
            <?php if (isset($_SESSION['user_id'])) { ?>  
            <a><img src="assets/img/testimonials/<?= htmlspecialchars($_SESSION['profile_image'] ?? 'default.jpg') ?>" 
              width="32" height="32" class="rounded-circle shadow">
              <span class="d-none d-sm-inline"><?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span> 
              <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul> 
              <li><a href="forms/logout.php">
                    <img src="assets/img/power-off.png" width="20" height="20">
                    <span>Logout</span>
                  </a>
              </li>
            </ul> 
            <?php }?>
        </div><!-- END Profile Secetion --> 
      </div>
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
    </div><!-- END Edit Profile Modal -->
    
    <!-- Date Filter Section -->
    <form method="GET" action="" class="mb-4">
      <div class="date-range-filter d-flex flex-wrap align-items-center gap-2">
        <label for="dateStart" class="form-label mb-0">Date Range:</label>
        <input type="date" id="dateStart" name="dateStart" class="form-control" value="<?= htmlspecialchars($dateStart) ?>">
        <span class="fw-semibold text-secondary">to</span>
        <input type="date" id="dateEnd" name="dateEnd" class="form-control" value="<?= htmlspecialchars($dateEnd) ?>">
        
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-funnel"></i> Filter
        </button>
        <a href="admin.php" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-counterclockwise"></i> Reset
        </a>
      </div>
    </form>
    <!-- END Date Filter Section -->
 

    <!-- Dashboard Data Section -->
    <!-- All Subscriptions Data Card -->
    <section class="dashboard-grid d-grid gap-4" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
      <div class="card card-metric">
        <div class="card-body d-flex align-items-center">
          <div class="card-icon bg-accent">
              <i class="bi bi-person-plus"></i>
          </div>
          <div>
            <div class="metric-label">New Subscriptions</div>
            <div class="metric-number">
              <?= $allSubs['count'] ?? '--' ?>
            </div>
            <div class="metric-subtext">
                <?= $activeSubs['subtext'] ?? 'Total semua subscription yang masuk' ?>
            </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Active Subscriptions Revenue Card -->
      <div class="card card-metric">
        <div class="card-body d-flex align-items-center">
          <div class="card-icon bg-success">
            <i class="bi bi-currency-dollar"></i>
          </div>
          <div>
          <div class="metric-label">Monthly Revenue</div>
          <div class="metric-number">
              <?= $monthlyRevenue['revenue'] ?? '--' ?>
          </div>
          <div class="metric-subtext">
              <?= $monthlyRevenue['subtext'] ?? 'Period: ' . date('M Y') ?>
          </div>
          </div>
        </div>
      </div>

      <!-- Reactivation Card -->
      <div class="card card-metric">
        <div class="card-body d-flex align-items-center">
          <div class="card-icon bg-warning">
            <i class="bi bi-arrow-repeat"></i>
          </div>
          <div>
          <div class="metric-label">Reactivations</div>
          <div class="metric-number">
              <?= $reactivations['count'] ?? '--' ?>
          </div>
          <div class="metric-subtext">
              <?= $reactivations['subtext'] ?? 'Period: ' . date('M j') . ' - ' . date('M j') ?>
          </div>
          </div>
        </div>
      </div>

      <!-- Active Subscriptions Card -->
        <div class="card card-metric">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon bg-primary">
                     <i class="bi bi-graph-up"></i>
                </div>
                <div>
                    <div class="metric-label">Active Subscriptions</div>
                    <div class="metric-number"><?= $activeSubs['count'] ?? '--' ?></div>
                    <div class="metric-subtext">
                        <span>Total active subscriptions</span>
                        <span class="trend-indicator <?= $activeSubs['growth'] >= 0 ? 'trend-up' : 'trend-down' ?>">
                            <i class="bi bi-arrow-<?= $activeSubs['growth'] >= 0 ? 'up' : 'down' ?>"></i> <?= abs($activeSubs['growth']) ?>%
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Dashboard Data Section -->

    <!-- Subscriptin Griwth Data Section -->
    <div class="chart-container">
      <div class="chart-header">
        <h3>Subscription Growth</h3>
          <div class="btn-group">
            <button class="btn btn-sm btn-outline-secondary active" data-range="7">7 Days</button>
            <button class="btn btn-sm btn-outline-secondary" data-range="30">30 Days</button>
            <button class="btn btn-sm btn-outline-secondary" data-range="90">90 Days</button>
            <button class="btn btn-sm btn-outline-secondary" data-range="365">1 Year</button>
          </div>
      </div>
      <canvas id="subscriptionChart" height="120"></canvas>
    </div><!-- END Subscriptin Griwth Data Section -->

    <!-- Customers Table Section -->
    <section id="customers-section" class="mt-5">
      <div class="section-header d-flex justify-content-between align-items-center mb-4">
        <h2>Registered Customers</h2>
        <div>
        <a href="register.php" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> Add Customer
        </a>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customers as $customer): ?>
                  <tr>
                    <td><?= htmlspecialchars($customer['id']) ?></td>
                    <td><?= htmlspecialchars($customer['username']) ?></td>
                    <td><?= htmlspecialchars($customer['email']) ?></td>
                    <td><?= htmlspecialchars($customer['phone'] ?? '-') ?></td>
                    <td>
                      <span class="badge bg-<?= ($customer['status'] ?? 'Inactive') === 'Active' ? 'success' : 'secondary' ?>">
                        <?= htmlspecialchars($customer['status'] ?? 'Inactive') ?>
                      </span>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-outline-primary me-1 view-customer" 
                              data-id="<?= $customer['id'] ?>">
                        <i class="bi bi-eye"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-danger delete-customer" 
                              data-id="<?= $customer['id'] ?>">
                        <i class="bi bi-trash"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>

                <?php if (empty($customers)): ?>
                  <tr>
                    <td colspan="6" class="text-center py-4">No customers found</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- Subscribers Table Section -->
    <section id="subscribers-section" class="mt-5">
      <div class="section-header d-flex justify-content-between align-items-center mb-4">
        <h2>Subscriptions</h2>
        <div class="btn-group">
          <a href="?status=all" class="btn btn-outline-secondary <?= $status === 'all' ? 'active' : '' ?>">All</a>
          <a href="?status=active" class="btn btn-outline-secondary <?= $status === 'active' ? 'active' : '' ?>">Active</a>
          <a href="?status=expired" class="btn btn-outline-secondary <?= $status === 'paused' ? 'active' : '' ?>">Paused</a>
          <a href="?status=pending" class="btn btn-outline-secondary <?= $status === 'cancelled' ? 'active' : '' ?>">cancelled</a>
        </div>
      </div>
      
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Subscription ID</th>
                  <th>Customer</th>
                  <th>Plan</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Amount</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($subscriptions as $sub): ?>
                <tr>
                  <td>SUB-<?= $sub['id'] ?></td>
                  <td><?= htmlspecialchars($sub['customer_name']) ?></td>
                  <td>
                    <span class="badge bg-<?= 
                      $sub['plan'] === 'Premium' ? 'primary' : 
                      ($sub['plan'] === 'Standard' ? 'success' : 'secondary')
                    ?>">
                      <?= $sub['plan'] ?>
                    </span>
                  </td>
                  <td><?= date('Y-m-d', strtotime($sub['start_date'])) ?></td>
                  <td><?= date('Y-m-d', strtotime($sub['end_date'])) ?></td>
                  <td>
                    <span class="badge bg-<?= 
                      $sub['status'] === 'active' ? 'success' : 
                      ($sub['status'] === 'pending' ? 'info' : 
                      ($sub['status'] === 'expired' ? 'danger' : 'warning'))
                    ?>">
                      <?= ucfirst($sub['status']) ?>
                    </span>
                  </td>
                  <td>$<?= number_format($sub['amount'], 2) ?></td>
                  <td>
                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                    <button class="btn btn-sm btn-outline-danger" 
                            onclick="updateSubscriptionStatus(<?= $sub['id'] ?>)">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
                
    <!-- Ratings & Comments Section -->
    <section id="ratings-section" class="mt-5">
      <div class="section-header d-flex justify-content-between align-items-center mb-4">
        <h2>Customer Feedback</h2>
        <div class="btn-group">
          <a href="?filter=all" class="btn btn-outline-secondary <?= $filter === 'all' ? 'active' : '' ?>">All</a>
          <a href="?filter=5" class="btn btn-outline-secondary <?= $filter === '5' ? 'active' : '' ?>">5 Stars</a>
          <a href="?filter=4" class="btn btn-outline-secondary <?= $filter === '4' ? 'active' : '' ?>">4 Stars</a>
          <a href="?filter=1-3" class="btn btn-outline-secondary <?= $filter === '1-3' ? 'active' : '' ?>">1–3 Stars</a>
        </div>
      </div>
      
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Customer</th>
                  <th>Rating</th>
                  <th>Comment</th>
                  <th>Date</th>
                </tr>
              </thead>
                <tbody>
                  <?php if (empty($feedbacks)): ?>
                    <tr>
                      <td colspan="5" class="text-center py-4">No feedbacks found.</td>
                    </tr>
                  <?php else: ?>
                    <?php foreach ($feedbacks as $fb): ?>
                      <tr>
                        <td><?= $fb['id'] ?></td>
                        <td><?= htmlspecialchars($fb['name']) ?></td>
                        <td>
                          <?php for ($i = 0; $i < $fb['rating']; $i++): ?>
                            ⭐
                          <?php endfor; ?>
                        </td>
                        <td><?= htmlspecialchars($fb['message']) ?></td>
                        <td>-</td> <!-- Karena tidak ada kolom created_at -->
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

  </main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let chartData = {
        labels: [],
        data: []
    };

    // Load initial data (7 days)
    fetch('forms/get_subscription_growth.php?range=7')
        .then(res => res.json())
        .then(json => {
            chartData.labels = json.map(e => e.date);
            chartData.data = json.map(e => e.count);
            initCharts(); // Initialize charts after data is loaded
        });
</script>
<script src="assets/js/charts.js"></script>

</body>
</html>