<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }

  function displayAdminLink() {
    if(isset($_SESSION['user']['admin'])) {
      echo '<li><a href="admin.php">Admin</a></li>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand">Satellite Ground Station</a>
      </div>
        <ul class="nav navbar-nav">
          <li><a>Dashboard</a></li>
          <li><a>Search</a></li>
          <?php displayAdminLink(); ?>
          <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
  </div>
  <div></div>
</body>
</html>
