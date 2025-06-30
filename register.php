<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h4 class="text-center mb-4">Register to SEA Catering</h4>
    <form action="forms/registerUser.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password"
          pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!]).{8,}$"
          title="Minimum 8 characters, with at least 1 uppercase, 1 lowercase, 1 number, and 1 special character (@#$%^&+=!)"
          required>
        <div class="form-text">
          Minimum 8 characters. Must include uppercase, lowercase, number, and special character.
        </div>
      </div>
      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-success">Register</button>
      </div>
      <div class="text-center">
        <small class="text-muted">Already have an account? <a href="auth.php">Login</a></small>
      </div>
    </form>
  </div>

  <!-- Modal -->
  <?php if (isset($_GET['error']) || isset($_GET['success'])): ?>
    <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header <?= isset($_GET['success']) ? 'bg-success' : 'bg-danger' ?> text-white">
            <h5 class="modal-title">
              <?= isset($_GET['success']) ? 'Registrasi Berhasil' : 'Registrasi Gagal' ?>
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?= $_GET['error'] === 'validation' ? 'Format data tidak valid atau password tidak sesuai syarat.' :
                ($_GET['error'] === 'duplicate' ? 'Akun dengan email tersebut sudah terdaftar.' :
                (isset($_GET['success']) ? 'Akun berhasil dibuat! Silakan login.' : 'Terjadi kesalahan.')) ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <?php if (isset($_GET['error']) || isset($_GET['success'])): ?>
  <script>
    const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
    registerModal.show();
  </script>
  <?php endif; ?>
</body>
</html>
