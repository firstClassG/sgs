<?php
require_once 'baseGet.abstract.php';

class Search extends BaseGet {

  function findGroundStationMatch() {
    $sql = "";
    return $this->getData(array('sql' => $sql));
  }
}
