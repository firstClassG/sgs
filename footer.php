<!--this is a test-->
<?php
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
}
?>

</body>
</html>
