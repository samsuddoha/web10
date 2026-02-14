<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Complaint System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Complaint System</a>
    <div class="ms-auto d-flex gap-2">
      <a class="btn btn-outline-light btn-sm" href="create.php">Create</a>
      <a class="btn btn-outline-light btn-sm" href="track.php">Track</a>
      <a class="btn btn-warning btn-sm" href="login.php">Admin</a>

      <?php if (!empty($_SESSION['admin_id'])): ?>
        <a class="btn btn-danger btn-sm" href="logout.php">Logout</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
<div class="container py-4">
