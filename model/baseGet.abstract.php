<?php
/* Quick Snippet
return $this->getData(array('sql' => $sql));
return $this->getData(array('sql' => $sql, 'params' => $params));
return $this->getData(array('sql' => $sql, 'params' => $params,
  'fetchType' => 'fetchAll'));
*/

abstract class BaseGet {

  function __construct($db) {
    $this->db = $db;
  }

  function getData($config) {
    $stmt = $this->db->prepare($config['sql']);

    if (array_key_exists('params', $config)) {
      $stmt->execute($config['params']);
    } else {
      $stmt->execute();
    }

    if (!array_key_exists('fetchType', $config)) {
      $config['fetchType'] = 'fetch';
    }
    return json_encode($stmt->$config['fetchType'](PDO::FETCH_ASSOC));
  }

}
