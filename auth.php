<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h4 class="text-center mb-4">Login to SEA Catering</h4>
    <form action="forms/login.php" method="POST">
      <div class="mb-3">
        <label for="identity" class="form-label">Email atau Username</label>
        <input type="text" class="form-control" id="identity" name="identity"
          value="<?= htmlspecialchars($_GET['identity'] ?? '') ?>" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      <div class="text-center">
        <small class="text-muted">Don't have an account? <a href="register.php">Register</a></small>
      </div>
    </form>
  </div>

  <!-- Modal -->
  <?php if (isset($_GET['login']) || isset($_GET['error'])): ?>
  <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header <?= isset($_GET['login']) ? 'bg-success' : 'bg-danger' ?> text-white">
          <h5 class="modal-title">
            <?= isset($_GET['login']) ? 'Login Berhasil' : 'Login Gagal' ?>
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?= isset($_GET['login']) ? 'Selamat datang kembali!' : 'Email/Username atau Password salah.' ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <?php if (isset($_GET['login']) || isset($_GET['error'])): ?>
  <script>
    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    loginModal.show();
  </script>
  <?php endif; ?>
</body>
</html>
