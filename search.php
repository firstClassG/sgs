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
    <div class="col-md-5" id="selectSatellite">
    </div>
  </div>
  <div class="form-group">
    <label for="onDate" class="col-md-2 control-label">Pick Date</label>
    <div class="input-group date form_date col-md-5" data-date="" data-link-field="onDate">
      <input class="form-control" size="16" type="text" value="" readonly>
      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <input type="hidden" id="onDate" name="onDate" value="" /><br/>
  </div>
  <div class="form-group">
    <label for="startTime" class="col-md-2 control-label">Start Time</label>
    <div class="input-group date form_time col-md-5" data-date="" data-link-field="startTime">
      <input class="form-control" size="16" type="text" value="" readonly>
      <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
    </div>
    <input type="hidden" id="startTime" name="startTime" value="" /><br/>
  </div>
  <div class="form-group">
    <label for="dtp_input3" class="col-md-2 control-label">End Time</label>
    <div class="input-group date form_time col-md-5" data-date="" data-link-field="endTime">
      <input class="form-control" size="16" type="text" value="" readonly>
      <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
    </div>
    <input type="hidden" id="endTime" name="endTime" value="" /><br/>
  </div>
  <div class="text-center">
    <input type="submit" name="search" class="btn btn-lg btn-primary" value="Search">
  </div>
</form>

<script type="x-tmpl-mustache" id="pickSatellite">
<select name="satellite" class="form-control">
  {{#satellites}}
  <option vale="{{id}}">{{name}}</option>
  {{/satellites}}
</select>
</script>

<?php
  require_once 'footer.php';
?>
