$(document).ready(function(){
    $('#testmonials').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        rtl: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    $('#slide').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        rtl: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $('#about').owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        rtl: true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1300:{
                items:4
            }
        }
    });
    $('#videos').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        rtl: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
       // scroll up
	$('.scroll').click(function () {
        $("html, body").animate({scrollTop: 0}, 800);
        return false;
    });
    // proload
    $(window).on('load', function () {
        $('body').css("overflow","auto")
        $('.loading-over').fadeOut('slow', function () {
            $(this).remove();
        });
    });    
 $('.carousel').carousel({
    loop:true
 })

    $('.Program').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        rtl: true,
        navText: [
            "<i class='fa fa-angle-right'></i>",
            "<i class='fa fa-angle-left'></i>"
          ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
      })
  });
  $('#myTab a').on('click', function (event) {
    event.preventDefault()
    $(this).tab('show')
  })
  $('#newTab a').on('click', function (event) {
    event.preventDefault()
    $(this).tab('show')
  })

  /*=========  start counter  =========*/	  	  
  $('.count').each(function () {
    $(this).prop('Counter', 0).animate({
        counter: $(this).text()
    }, {
        delay:10,
        time:800,
        duration: 7000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
}); 
/*=========  END counter  =========*/
  
  
 
