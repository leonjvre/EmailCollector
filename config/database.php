<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'CollectionAdmin');
define('DB_PASS', 'StrongP@ss989');
define('DB_NAME', 'EmailCollectorMaster');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

