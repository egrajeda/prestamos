$(document).ready(function() {
  $('.input').focus(function() {
    $(this).addClass('input-highlight');
  });
  $('.input').blur(function() {
    $(this).removeClass('input-highlight');
  });
  $('.submit').click(function() {
    $('#form').submit();
  });
});
