$(function() {
  window.loadAllGS = function() {
    $.get('api.php/station', function(data) {
      var template = $('#gsModal').html();
      Mustache.parse(template);
      var rendered = Mustache.render(template, {val: JSON.parse(data)});
      console.log(data);
      $('#allGroundStationModal .modal-body').html(rendered);
    });
  };

  if ($('#selectSatellite').length > 0) {
    $.ajax({
      type: 'POST',
      url: 'api.php/user/satellites',
      data: JSON.stringify({"user_id": 1}),
      contentType: 'application/json; charset=utf-8',
      dataType: 'json',
      success: function(data) {
        var template = $('#pickSatellite').html();
        Mustache.parse(template);
        var rendered = Mustache.render(template, {satellites: data});
        $('#selectSatellite').html(rendered);
      },
      failure: function(errMsg) {
      }
    });
  }

  $('.form_date').datetimepicker({
    format: 'MM dd yyyy',
    startDate: new Date(),
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 1
  });

  $('.form_time').datetimepicker({
    format: 'hh:ii',
    weekStart: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 1
  });
});
