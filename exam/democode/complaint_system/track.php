<?php
include "includes/db.php";
include "includes/header.php";

$token = trim($_GET['token'] ?? "");
$data = null;
$error = "";

if ($token !== "") {

  $sql = "SELECT token, subject, status, created_at, resolved_at
          FROM complaints
          WHERE token='$token'";

  $q = $conn->query($sql);

  if ($q && $q->num_rows > 0) {
    $data = $q->fetch_assoc();
  } else {
    $error = "No complaint found for this token.";
  }
}
?>

<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-3">Track Complaint</h4>

        <form class="d-flex gap-2" method="get">
          <input type="text" name="token" class="form-control" placeholder="Enter your token"
                 value="<?php echo htmlspecialchars($token); ?>" required>
          <button class="btn btn-success">Check</button>
        </form>

        <?php if ($error): ?>
          <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($data): ?>
          <div class="alert mt-3 <?php echo ($data['status'] === 'Resolved') ? 'alert-success' : 'alert-warning'; ?>">
            <div><b>Token:</b> <?php echo htmlspecialchars($data['token']); ?></div>
            <div><b>Subject:</b> <?php echo htmlspecialchars($data['subject']); ?></div>
            <div><b>Status:</b> <?php echo htmlspecialchars($data['status']); ?></div>
            <hr class="my-2">
            <small><b>Created:</b> <?php echo htmlspecialchars($data['created_at']); ?></small><br>

            <?php if (!empty($data['resolved_at'])): ?>
              <small><b>Resolved:</b> <?php echo htmlspecialchars($data['resolved_at']); ?></small>
            <?php endif; ?>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>
