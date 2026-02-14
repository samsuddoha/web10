<?php
include "includes/auth.php";
include "includes/db.php";

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
  header("Location: dashboard.php");
  exit;
}

$sql = "DELETE FROM complaints WHERE id=$id";

if ($conn->query($sql)) {
  $_SESSION['msg'] = "Complaint deleted.";
} else {
  $_SESSION['msg'] = "Failed to delete complaint.";
}

header("Location: dashboard.php");
exit;
