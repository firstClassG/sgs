<?php
if (file_exists('vendor/autoload.php')) {
  require_once 'vendor/autoload.php';
} else {
  require 'vendor/Slim/Slim.php';
  \Slim\Slim::registerAutoloader();
}

require_once 'db_connect.php';
require_once 'model/station.php';
require_once 'model/equipment.php';
require_once 'model/user.php';
require_once 'model/search.php';
require_once 'model/pipeline.php';
require_once 'model/radio.php';

$station = new station($db);
$equipment = new equipment($db);
$radio = new radio($db);
$user = new user($db);

$privateKey = "thisissecure";

$app = new \Slim\Slim(array(
  'mode' => 'development',
));

$app->configureMode('production', function () use ($app) {
  $app->config(array(
    'log.enable' => true,
    'debug' => false
  ));
});

$app->configureMode('development', function() use ($app) {
  $app->config(array(
    'log.enable' => false,
    'debug' => true
  ));
});

$app->response->header('Connection', 'close');

/* ROUTES */
$app->get('/station', function () use ($station) {
  echo $station->getAllStation();
});

$app->get('/station/:id', function ($id) use ($station) {
  echo $station->getStation($id);
});

$app->get('/equipment', function () use ($equipment) {
  echo $equipment->getAllEquipment();
});

$app->get('/equipment/:id', function ($id) use ($equipment) {
  echo $equipment->getEquipment($id);
});

$app->get('/radio/:id', function($id) use ($radio) {
  echo $radio->getRadio($id);
});

$app->post('/user', function() use ($user, $app) {
  $json = $app->request->getBody();
  $data = json_decode($json, true);
  $key = $data['key'];
  $id = isset($data['id']) ? $data['id'] : 0;
  if ($key == $privateKey) {
    if ($id == 0) {
      echo $user->getAllUser();
    } else {
      echo $user->getUser($id);
    }
  } else {
    echo "No Access";
  }
});

$app->post('/user/satellites', function() use ($user, $app) {
  $json = $app->request->getBody();
  $data = json_decode($json, true);
  if (isset($data['user_id'])) {
    echo $user->getUserSatellites($data['user_id']);
  } else {
    $app->response()->status(400);
  }
});

$app->post('/user/satellite', function() use ($user, $app) {
  $json = $app->request->getBody();
  $data = json_decode($json, true);
  if (isset($data['satellite_id'])) {
    echo $user->getUserSatellite($data['satellite_id']);
  } else {
    $app->response()->status(400);
  }
});

$app->post('/login', function() use ($user, $app) {
  $json = $app->request->getBody();
  $data = json_decode($json, true);
  $username = $data['username'];
  $password = $data['password'];
  $response = $user->login($username, $password);
  if ($response == 'false') {
    echo "Incorrect username or password.";
  } else {
    echo $response;
  }
});

$app->run();
