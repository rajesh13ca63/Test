$(function(){
    $('#pop').click(function(){
       $('#popup').bPopup();
      });
});


$(function(){
    $('.slideDown').click(function(){
       // $('#popup').bPopup();
     
     $('.slideDownMsg').bPopup({
      easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 1050,
            transition: 'slideDown'
     });
    });
});



$(function(){
    $('.slideUp').click(function(){
       // $('#popup').bPopup();
     
     $('.slideUpMsg').bPopup({
      easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 1050,
            transition: 'slideUp'
     });
    });
});


$(function(){
    $('.slideLeft').click(function(){
       // $('#popup').bPopup();
     
     $('.slideLeftMsg').bPopup({
      easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 1050,
            transition: 'slideIn'
     });
    });
});


$(function(){
    $('.slideRight').click(function(){
       // $('#popup').bPopup();
     
     $('.slideRightMsg').bPopup({
      easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 1050,
            transition: 'slideBack'
     });
    });
});


$(function(){
    $('.slideUpDown').click(function(){
       // $('#popup').bPopup();
     
     $('.slideUpDownMsg').bPopup({
      easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 1050,
            transition: 'slideDown',
      transitionClose: 'slideUp'
     });
    });
});


$(function(){
    $('.slideUpDown').click(function(){
       // $('#popup').bPopup();
     
     $('.slideUpDownMsg').bPopup({
      easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 1050,
            transition: 'slideIn',
      transitionClose: 'slideBack'
     });
    });
});


$(function(){
    $('.slideLeftRight').click(function(){
       // $('#popup').bPopup();
     
     $('.slideLeftRightMsg').bPopup({
      easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 1050,
            transition: 'slideIn',
      transitionClose: 'slideBack'
     });
    });
});



$(function(){
    $('.slideLightAppear').click(function(){
       // $('#popup').bPopup();
     
     $('.slideLightAppearMsg').bPopup({
      easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 1050
         });
    });
});



$(function(){
    $('.loadImage').click(function(){
       // $('#popup').bPopup();
     
     $('.loadImageDisp').bPopup({
      content:'image', //'ajax', 'iframe' or 'image'
            easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 50
         });
    });
});


