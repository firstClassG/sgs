<?php
// Basic Database Information
$host = "localhost";
$dbname = "satgroundstation";
$username = "satgroundstation";
$password = "satgroundstation";

// Other Settings
$charset = "utf8";

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  echo "Database is down!";
  exit();
}
