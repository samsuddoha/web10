<?php
include "includes/db.php";
include "includes/header.php";

function generate_token($len = 10) {
  $chars = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
  $t = "";
  for ($i=0; $i<$len; $i++){
    $t .= $chars[random_int(0, strlen($chars)-1)];
  }
  return $t;
}

$errors = [];
$success_token = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = trim($_POST['name'] ?? "");
  $email   = trim($_POST['email'] ?? "");
  $subject = trim($_POST['subject'] ?? "");
  $details = trim($_POST['details'] ?? "");

  if ($name==="" || $email==="" || $subject==="" || $details==="") {
    $errors[] = "All fields are required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email.";
  }

  if (!$errors) {

    // generate a unique token
    do {
      $token = generate_token(10);
      $sql="SELECT id FROM complaints WHERE token='$token'";
      $check = $conn->query($sql);
      $exists = ($check && $check->num_rows > 0); //shorter version of if else
    } while ($exists);

    $sql_insert = "INSERT INTO complaints (token, name, email, subject, details)
            VALUES ('$token', '$name', '$email', '$subject', '$details')";
    if ($conn->query($sql_insert)) {
      $success_token = $token;
    } else {
      $errors[] = "Failed to submit complaint.";
    }
  }
}
?>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-3">Create Complaint</h4>

        <?php if ($errors): ?>
          <div class="alert alert-danger">
            <ul class="mb-0">
              <?php foreach ($errors as $e): ?><li><?php echo htmlspecialchars($e); ?></li><?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if ($success_token): ?>
          <div class="alert alert-success">
            <h5 class="mb-2">Complaint Submitted.</h5>
            <p class="mb-1">Your token is:</p>
            <div class="fs-4 fw-bold"><?php echo htmlspecialchars($success_token); ?></div>
            <p class="mt-2 mb-0">Save it to track status from <a href="track.php">Track</a>.</p>
          </div>
        <?php else: ?>
          <form method="post" class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Your Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-12">
              <label class="form-label">Subject</label>
              <input type="text" name="subject" class="form-control" required>
            </div>
            <div class="col-12">
              <label class="form-label">Details</label>
              <textarea name="details" class="form-control" rows="5" required></textarea>
            </div>
            <div class="col-12 d-flex gap-2">
              <button class="btn btn-primary">Submit</button>
              <a class="btn btn-secondary" href="index.php">Back</a>
            </div>
          </form>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>
