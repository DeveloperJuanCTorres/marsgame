function onSubmit(token) {
  document.getElementById("form1").submit();
  console.log('paso por aqui');
}

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

  // WATSAPP

  popupWhatsApp = () => {
  
    let btnClosePopup = document.querySelector('.closePopup');
    let btnOpenPopup = document.querySelector('.whatsapp-button');
    let popup = document.querySelector('.popup-whatsapp');
    let sendBtn = document.getElementById('send-btn');
  
    btnClosePopup.addEventListener("click",  () => {
      popup.classList.toggle('is-active-whatsapp-popup')
    })
    
    btnOpenPopup.addEventListener("click",  () => {
      popup.classList.toggle('is-active-whatsapp-popup')
       popup.style.animation = "fadeIn .60s 0.0s both";
    })
    
    sendBtn.addEventListener("click", () => {
    let msg = document.getElementById('whats-in').value;
    let relmsg = msg.replace(/ /g,"%20");
      //just change the numbers "1515551234567" for your number. Don't use +001-(555)1234567     
     window.open('https://wa.me/51908808485?text='+relmsg, '_blank'); 
    
    });
  
    setTimeout(() => {
      popup.classList.toggle('is-active-whatsapp-popup');
    }, 3000);
  }
  
  popupWhatsApp();

  // FIN WHATSAPP