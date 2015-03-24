<?php
require_once 'baseGet.abstract.php';

class Pipeline extends BaseGet {
  function getAllPipeline() {
    $sql = "SELECT *
      FROM pipeline";
    return $this->getData(array('sql' => $sql, 'fetchType' => 'fetchAll'));
  }

  function getPipeline($id) {
    $sql = "SELECT *
      FROM pipeline
      WHERE id = :id";
      $params = array(':id'=>$id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }
}
