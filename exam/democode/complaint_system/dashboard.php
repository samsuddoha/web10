<?php
include "includes/auth.php";
include "includes/db.php";
include "includes/header.php";

$res = $conn->query("SELECT * FROM complaints ORDER BY id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="mb-0">Admin Dashboard</h4>
  <span class="badge bg-secondary"><?php echo htmlspecialchars($_SESSION['admin_email'] ?? 'admin'); ?></span>
</div>

<?php if (!empty($_SESSION['msg'])): ?>
  <div class="alert alert-success">
    <?php echo htmlspecialchars($_SESSION['msg']); unset($_SESSION['msg']); ?>
  </div>
<?php endif; ?>

<div class="card shadow-sm">
  <div class="card-body table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Token</th>
          <th>Name</th>
          <th>Subject</th>
          <th>Status</th>
          <th>Created</th>
          <th style="width:200px;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($res && $res->num_rows > 0): ?>
          <?php while ($r = $res->fetch_assoc()): ?>
            <tr>
              <td><?php echo (int)$r['id']; ?></td>
              <td class="fw-bold"><?php echo htmlspecialchars($r['token']); ?></td>
              <td>
                <?php echo htmlspecialchars($r['name']); ?><br>
                <small><?php echo htmlspecialchars($r['email']); ?></small>
              </td>
              <td><?php echo htmlspecialchars($r['subject']); ?></td>
              <td>
                <span class="badge <?php echo ($r['status'] === 'Resolved') ? 'bg-success' : 'bg-warning text-dark'; ?>">
                  <?php echo htmlspecialchars($r['status']); ?>
                </span>
              </td>
              <td><small><?php echo htmlspecialchars($r['created_at']); ?></small></td>
              <td class="text-nowrap">
                <?php if ($r['status'] !== 'Resolved'): ?>
                  <a class="btn btn-sm btn-success"
                     href="resolve.php?id=<?php echo (int)$r['id']; ?>"
                     onclick="return confirm('Mark as Resolved?');">Resolve</a>
                <?php else: ?>
                  <button class="btn btn-sm btn-outline-success" disabled>Resolved</button>
                <?php endif; ?>

                <a class="btn btn-sm btn-danger"
                   href="delete.php?id=<?php echo (int)$r['id']; ?>"
                   onclick="return confirm('Delete this complaint?');">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="7" class="text-center">No complaints found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include "includes/footer.php"; ?>
