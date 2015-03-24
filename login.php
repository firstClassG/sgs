<?php
session_start();

function file_post_contents($url, $data) {
  $postData = http_build_query($data);
  $options = array('http' =>
    array(
      'method' => 'POST',
      'header' => 'Content-type: application/x-www-form-urlencoded',
      'content' => $postData
    )
  );
  $context = stream_context_create($options);
  return file_get_contents($url, false, $context);
}

function file_post_json($url, $data) {
  $jsonData = json_encode($data);
  $options = array('http' =>
    array(
      'method' => 'POST',
      'header' => 'Content-type: application/json\r\n' .
                  'Connection: Close',
      'content' => $jsonData
    )
  );
  $context = stream_context_create($options);
  return file_get_contents($url, false, $context);
}

$result = '';

if (isset($_POST['login'])) {
  $result = file_post_json(
    'http://localhost/sgs2/api.php/login',
    array('username' => $_POST['username'], 'password' => $_POST['password'])
  );
  if ($result != "Incorrect username or password.") {
    $_SESSION['user'] = json_decode($result, true);
    header('Location: index.php');
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
  <form name="loginForm" class="form-login" method="POST">
    <h2 class="form-login-heading">Ground Station CA</h2>
    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <?php echo $result; ?>
    <input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Sign in">
  </form>
</body>
</html>
