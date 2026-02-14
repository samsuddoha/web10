<?php include "includes/header.php"; ?>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="mb-2">Welcome</h3>
        <p class="text-muted mb-4">
          Submit a complaint and receive a token. Use that token later to track whether your issue is Pending or Resolved.
        </p>

        <div class="d-flex gap-2">
          <a class="btn btn-primary" href="create.php">Create Complaint</a>
          <a class="btn btn-success" href="track.php">Track Complaint</a>
        </div>

        <hr>
        <p class="mb-0"><b>Admin?</b> Login to view and resolve complaints.</p>
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>
