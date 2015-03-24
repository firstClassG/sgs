<?php
require_once 'baseGet.abstract.php';

class Equipment extends BaseGet {

  function getAllEquipment() {
    $sql = "SELECT *
      FROM equipment";
    return $this->getData(array('sql' => $sql, 'fetchType' => 'fetchAll'));
  }

  function getEquipment($id) {
    $sql = "SELECT groundStationId, antennaId, preampId, radioId,
      ampId, ioDigitalId, ioAnalogId, powerControllerId, cpuId,
      virtualMachineId, environmentParametersId
      FROM equipment
      WHERE equipmentId = :id";
    $params = array(':id'=>$id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }

  function getAmp($id) {
    $sql = "SELECT currentGain, currentPowerStatus, health, healthCode,
      minGain, maxGain, controllable
      FROM amp
      WHERE ampId = :id";
    $params = array(':id'=>$id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }

  function getPreamp($id) {
    $sql = "SELECT currentGain, currentPowerStatus, health,
      healthCode, minGain, maxGain, controllable
      FROM preamp
      WHERE preampId = :id";
    $params = array(':id'=>$id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }

  function getRadio($id) {
    $sql = "SELECT frequency, mode.name AS modeType,
      powerLevel, attenuation, squelch, freqLBW?, modLBW?, autoGainControlLevel,
      e.encodingName AS encodingName, prnSequence, useDiffEncode, useViterbi, viterbiRate,
      useReedSolomon, reedSolomonN,
      reedSolomonK, useTurboCode, llp.protocolName AS protocolName,
      mod.modulationName AS modulationName, baud,
      filterBandwidth, intermediateFrequencyBandwith, acquisitionRange, rssi,
      snr
      FROM radio AS r
      LEFT JOIN radio_mode AS mode
        ON r.modeId = mode.modeId
      LEFT JOIN modulation AS mod
        ON r.modulationId = mod.modulationId
      LEFT JOIN link_layer_protocol AS llp
        ON r.linkLayerProtocolId = llp.protocolId
      LEFT JOIN encoding AS e
        ON r.encodingId = e.encodingId
      WHERE radioId = :id";
    $params = array(':id'=>$id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }

  function getCpu($id) {
    $sql = "SELECT status, uptime, numProcessesTotal, processRunning,
      loadAve, diskUsage, diskFree, ramUsage, ramFree, bytesIn, bytesOut
      FROM cpu
      WHERE cpuId = :id";
    $params = array(':id'=>$id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }

  function getAntenna($id) {
    $sql = "SELECT antennaId, p.name AS polarizationType, azimuth, elevaton,
      minAzimuth, maxAzimuth, minElevation, maxElevation, azimuthSlewRate,
      elevationSlewRate, minAzimuthSlewRate, maxAzimuthSlewRate,
      minElevationSlewRate, maxElevationSlewRate, health, healthCode,
      controllable
      FROM antenna AS a
      LEFT JOIN polarization_type AS p
        ON a.polarizationType = p.typeId
      WHERE antennaId = :id";
    $params = array(':id'=>$id);
    return $this->getData(array('sql' => $sql, 'params' => $params));
  }

}
