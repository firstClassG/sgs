$(function() {
  window.loadAllGS = function() {
    $.get('api.php/station', function(data) {
      var template = $('#gsModal').html();
      Mustache.parse(template);
      var rendered = Mustache.render(template, {val: JSON.parse(data)});
      $('#allGroundStationModal .modal-body').html(rendered);
    });
  };
});
