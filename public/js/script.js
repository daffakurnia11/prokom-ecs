
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