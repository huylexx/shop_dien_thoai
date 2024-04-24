function electronics_appliances_openNav() {
  jQuery(".sidenav").addClass('show');
}
function electronics_appliances_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function electronics_appliances_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const electronics_appliances_nav = document.querySelector( '.sidenav' );

      if ( ! electronics_appliances_nav || ! electronics_appliances_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...electronics_appliances_nav.querySelectorAll( 'input, a, button' )],
        electronics_appliances_lastEl = elements[ elements.length - 1 ],
        electronics_appliances_firstEl = elements[0],
        electronics_appliances_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && electronics_appliances_lastEl === electronics_appliances_activeEl ) {
        e.preventDefault();
        electronics_appliances_firstEl.focus();
      }

      if ( shiftKey && tabKey && electronics_appliances_firstEl === electronics_appliances_activeEl ) {
        e.preventDefault();
        electronics_appliances_lastEl.focus();
      }
    } );
  }
  electronics_appliances_keepFocusInMenu();
} )( window, document );

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
  var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      // autoHeight: true,
      loop: true,
      dots:false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1024: {
          items: 1
      }
    }
  })
})

jQuery(document).ready(function() {
  var owl = jQuery('.services-sec .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      // autoHeight: true,
      loop: true,
      dots:false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1024: {
          items: 4
      }
    }
  })
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.header-navigation').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.header-navigation').addClass("stick_header");
    } else {
      jQuery('.header-navigation').removeClass("stick_header");
    }
  }
});