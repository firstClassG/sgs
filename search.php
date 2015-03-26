<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
  }

  require_once 'header.php';
?>

<form class="form-horizontal"  method="POST">
  <div class="form-group">
    <label for="satellite" class="col-md-2 control-label">Pick Satellite</label>
    <div class="input-group col-md-5" id="selectSatellite">
      <span class="button button-default input-group-addon pointer" data-toggle="modal" data-target="#satelliteModal"><span class="fa fa-question"></span></span>
    </div>
  </div>
  <div class="form-group">
    <label for="onDate" class="col-md-2 control-label">Pick Date</label>
    <div class="input-group date form_date col-md-5" data-link-field="onDate">
      <input class="form-control pointer" size="16" type="text" value="" readonly>
      <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
    </div>
    <input type="hidden" id="onDate" name="onDate" value="" /><br/>
  </div>
  <div class="form-group">
    <label for="startTime" class="col-md-2 control-label">Start Time</label>
    <div class="input-group date form_time col-md-5" data-link-field="startTime">
      <input class="form-control pointer" size="16" type="text" value="" readonly>
      <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
    </div>
    <input type="hidden" id="startTime" name="startTime" value="" /><br/>
  </div>
  <div class="form-group">
    <label for="dtp_input3" class="col-md-2 control-label">End Time</label>
    <div class="input-group date form_time col-md-5" data-link-field="endTime">
      <input class="form-control pointer" size="16" type="text" value="" readonly>
      <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
    </div>
    <input type="hidden" id="endTime" name="endTime" value="" /><br/>
  </div>
  <div class="text-center">
    <span name="search" class="btn btn-lg btn-primary">Search</span>
  </div>
</form>

<div class="modal fade" id="satelliteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="model-title">Satellite</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="searchResult"></div>


<script type="x-tmpl-mustache" id="pickSatellite">
<select name="satellite" class="form-control pointer">
  <option value="" disabled selected>Select a Satellite</option>
  {{#satellites}}
  <option value="{{id}}">{{name}}</option>
  {{/satellites}}
</select>
</script>

<script type="x-tmpl-mustache" id="aSatellite">
<table class="table">
  <thead>
    <th>Name</th>
  </thead>
  <tbody>
    {{#satellite}}
    <tr>
        <td>{{name}}</td>
    </tr>
    {{/satellite}}
  </tbody>
</table>
</script>

<script type="x-tmpl-mustache" id="result">
<table class="table">
  <thead>
    <th>Todo</th>
  </thead>
  <tbody>
    {{#todo}}
    <tr>
      <td>{{todo}}</td>
    </tr>
    {{/todo}}
  </tbody>
</table>
</script>

<?php
  require_once 'footer.php';
?>
