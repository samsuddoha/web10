<?php
session_start();
include "includes/db.php";
include "includes/header.php";

$err = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $pass  = $_POST['password'] ?? '';

  $sql = "SELECT id, password FROM admins WHERE email='$email'";
  $q = $conn->query($sql);

  $admin = ($q && $q->num_rows > 0) ? $q->fetch_assoc() : null;

  if ($admin) {
    $_SESSION['admin_id'] = (int)$admin['id'];
    $_SESSION['admin_email'] = $email;
    header("Location: dashboard.php");
    exit;
  } else {
    $err = "Invalid admin credentials.";
  }
}
?>

<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-3">Admin Login</h4>

        <?php if ($err): ?>
          <div class="alert alert-danger"><?php echo htmlspecialchars($err); ?></div>
        <?php endif; ?>

        <form method="post">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button class="btn btn-warning w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>
