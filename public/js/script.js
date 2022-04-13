AOS.init({
  once: true,
  duration: 1000
});

$(function () {
  $('#one-to-two').on('click', function () {
    $('#pageOne').fadeOut(function () {
      $(this).css('display', 'none');
      $('#pageTwo').fadeIn(function () {
        $(this).css('display', 'block');
      });
    });
  });
  $('#two-to-one').on('click', function () {
    $('#pageTwo').fadeOut(function () {
      $(this).css('display', 'none');
      $('#pageOne').fadeIn(function () {
        $(this).css('display', 'block');
      });
    });
  });
  $('#two-to-three').on('click', function () {
    $('#pageTwo').fadeOut(function () {
      $(this).css('display', 'none');
      $('#pageThree').fadeIn(function () {
        $(this).css('display', 'block');
      });
    });
  });
  $('#three-to-two').on('click', function () {
    $('#pageThree').fadeOut(function () {
      $(this).css('display', 'none');
      $('#pageTwo').fadeIn(function () {
        $(this).css('display', 'block');
      });
    });
  });
});