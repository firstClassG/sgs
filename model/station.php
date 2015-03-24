<?php
require_once 'baseGet.abstract.php';

class Station extends BaseGet {

  function getAllStation() {
    $sql = "SELECT gs.name AS gsName, latitude, longitude,
      sa.name AS saName
      FROM ground_station AS gs
      LEFT JOIN subauthority AS sa
        ON gs.subauthority_id = sa.id";
    return $this->getData(array('sql' => $sql, 'fetchType' => 'fetchAll'));
  }

  function getStation($id) {
    $sql = "SELECT gs.name AS gsName, latitude, longitude,
      sa.name AS saName
      FROM ground_station AS gs
      LEFT JOIN subauthority AS sa
        ON gs.subauthority_id = sa.id
      WHERE gs.id = :id";
    $params = array(':id'=>$id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }

}
