$(document).ready(function() {
  $('.input').focus(function() {
    $(this).addClass('input-highlight');
  });
  $('.input').blur(function() {
    $(this).removeClass('input-highlight');
  });
});
