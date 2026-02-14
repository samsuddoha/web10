<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "complaint_system";

$conn = new mysqli($host, $user, $pass, $db);
if (!$conn) die("DB connection failed: " . mysqli_connect_error());

