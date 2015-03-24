<?php
require_once 'baseGet.abstract.php';

class User extends BaseGet {

  function getAllUser() {
    $sql = "SELECT username, name
      FROM user";
    return $this->getData(array('sql' => $sql, 'fetchType' => 'fetchAll'));
  }

  function getUser($id) {
    $sql = "SELECT username, name
      FROM user
      WHERE id = :id";
    $params = array(':id' => $id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }

  function login($username, $password) {
    $sql = "SELECT username, name
      FROM user
      WHERE username = :username AND password = :password";
    $params = array(':username' => $username, ':password' => $password);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }
}
