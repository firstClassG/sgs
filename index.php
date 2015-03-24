<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }

  require_once 'header.php';
?>

<div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#allGroundStationModal" onClick="loadAllGS()">
  All Ground Stations
</button>
</div>

<div class="modal fade" id="allGroundStationModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="model-title">All Ground Station</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="x-tmpl-mustache" id="gsModal">
<table class="table">
  <thead>
    <th>Name</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>SA Name</th>
  </thead>
  <tbody>
    {{#val}}
    <tr>
        <td>{{gsName}}</td>
        <td>{{latitude}}</td>
        <td>{{longitude}}</td>
        <td>{{saName}}</td>
    </tr>
    {{/val}}
  </tbody>
</table>
</script>

<?php
  require_once 'footer.php';
?>
