$(document).ready(function () {
  $('#keyword').on('keyup', function () {
    $('#container').load('ajax/manga.php?keyword=' + $('#keyword').val());
  })
})