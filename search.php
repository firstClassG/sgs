<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }

  require_once 'header.php';
?>

<div></div>

<?php
  require_once 'footer.php';
?>
