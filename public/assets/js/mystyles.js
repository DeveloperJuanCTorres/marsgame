/* CARRUSEL */
$(() => {
    let position = 0;
    let max = $('.content').length - 1;
    
    $("#direction_left").click(() => {
      if ($("#direction_left").hasClass('disabled')) {
        return;
      }
  
      position--;
      
      checkPosition(position, max)
      move(position);
    });
  
    $("#direction_right").click(() => {
      if ($("#direction_right").hasClass('disabled')) {
        return;
      }
      
      position++;
      
      checkPosition(position, max)
      move(position);
    });
  });
  
  function move(pos) {
    $('#all_content').css({"left":`-${pos * 100}%`});
  }
  
  function checkPosition(pos, max) {
    if (pos >= max) {
      $("#direction_right").addClass('disabled');
    } else {
      $("#direction_right").removeClass('disabled');
    }
    
    if (pos <= 0) {
      $("#direction_left").addClass('disabled');
    } else {
      $("#direction_left").removeClass('disabled');
    }
  }
  /* FIN DE CARRUSEL */