
$(function () {
  "use strict";
  $('#dateStart').bootstrapMaterialDatePicker({
    time: false,
    format: 'YYYY-MM-DD'
  });
  $('#timeStart').bootstrapMaterialDatePicker({
    date: false,
    format: 'HH:mm'
  });
  $('#timeEnded').bootstrapMaterialDatePicker({
    date: false,
    format: 'HH:mm'
  });
});

$(function () {
  $('.attendanceButton').on('click', function () {
    var presenceId = $(this).attr('data-presence-id');
    $('#attendanceForm').attr('action', "/onPresence/" + presenceId)
  })
})