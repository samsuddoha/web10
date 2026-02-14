<?php
include "includes/auth.php";
include "includes/db.php";

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
  header("Location: dashboard.php");
  exit;
}

$sql = "UPDATE complaints
        SET status='Resolved', resolved_at=NOW()
        WHERE id=$id";

if ($conn->query($sql)) {
  $_SESSION['msg'] = "Marked as Resolved.";
} else {
  $_SESSION['msg'] = "Failed to update status.";
}

header("Location: dashboard.php");
exit;
