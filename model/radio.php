<?php
require_once 'baseGet.abstract.php';

class Radio extends BaseGet {

  function getRadio($id) {
    $sql = "SELECT *
      FROM radio";
    $params = array(':id' => $id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }
}
