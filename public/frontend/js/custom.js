
//mobile nav toggle
$(document).ready(function () {
  $(".mob_bar").click(function () {
      $(".sidenav").toggle();
  });
  new WOW().init();
});
$('.play').click(function() {
  $('.modal').addClass('open');
});
   //Preloader
  jQuery(window).on('load', function() {
    jQuery("#global").delay(50).fadeOut();
    jQuery(".preloader").delay(50).fadeOut("slow");
});

//owl carousel
$('.banner_slider').owlCarousel({
  loop: true,
  dot: true,
  nav: false,
  autoplayTimeout: 5000,
  smartSpeed: 1000,
  autoplay: true,
  // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  responsive: {
      0: {
          items: 1
      },
      600: {
          items: 1
      },
      1000: {
          items: 1
      }
  }
});



$('.testimonial_slider').owlCarousel({
  loop: true,
  margin: 30,
  nav: false,
  navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
  ],
  smartSpeed: 1000,
  autoplay: true,
  mouseDrag: true,
  autoplayTimeout: 8000,
  responsive: {
      0: {
          items: 1
      },
      576: {
          items: 1
      },
      768: {
          items: 1,
      },
      992: {
          items: 1
      },
      1000: {
          items: 1
      }
  }
});



$('.icon_slider').owlCarousel({
  loop: true,
  nav: false,
  dot: false,
  smartSpeed: 1000,
  autoplay: true,
  mouseDrag: true,
  navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
  ],
  autoplayTimeout: 5000,

  responsive: {
      0: {
          items: 2
      },
      600: {
          items: 3
      },
      1000: {
          items: 5
      }
  }
})

//Back to top
$('.top_Arrow').on("click", function(){
  $("html, body").animate({ scrollTop: 0 }, 1200);
  return false;
});

 //sticky menu
 $(window).on('scroll', function() {
  var scroll = $(window).scrollTop();
  if (scroll >= 200) {
      $(".navbar_header").addClass("sticky");

  } else {
      $(".navbar_header").removeClass("sticky");
  }

});
//sticky menu mobile
$(window).on('scroll', function() {
  var scroll = $(window).scrollTop();
  if (scroll >= 200) {
      $(".mob_navbar_header").addClass("sticky");

  } else {
      $(".mob_navbar_header").removeClass("sticky");
  }

});

//   // Select all links with hashes
//   $('a[href*="#"]')
//   // Remove links that don't actually link to anything
//   .not('[href="#"]')
//   .not('[href="#0"]')
//   .click(function(event) {
//       // On-page links
//       if (
//           location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
//           location.hostname == this.hostname
//       ) {
//           // Figure out element to scroll to
//           var target = $(this.hash);
//           target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//           // Does a scroll target exist?
//           if (target.length) {
//               // Only prevent default if animation is actually gonna happen
//               event.preventDefault();
//               $('html, body').animate({
//                   scrollTop: target.offset().top
//               }, 1000, function() {
//                   // Callback after animation
//                   // Must change focus!
//                   var $target = $(target);
//                   $target.focus();
//                   if ($target.is(":focus")) { // Checking if the target was focused
//                       return false;
//                   } else {
//                       $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
//                       $target.focus(); // Set focus again
//                   };
//               });
//           }
//       }
//   });

// $('.login-form').find('input, textarea').on('keyup blur focus', function (e) {

//   var $this = $(this),
//       label = $this.prev('label');

// 	  if (e.type === 'keyup') {
// 			if ($this.val() === '') {
//           label.removeClass('active highlight');
//         } else {
//           label.addClass('active highlight');
//         }
//     } else if (e.type === 'blur') {
//     	if( $this.val() === '' ) {
//     		label.removeClass('active highlight');
// 			} else {
// 		    label.removeClass('highlight');
// 			}
//     } else if (e.type === 'focus') {

//       if( $this.val() === '' ) {
//     		label.removeClass('highlight');
// 			}
//       else if( $this.val() !== '' ) {
// 		    label.addClass('highlight');
// 			}
//     }

// });

// $('.login-tab a').on('click', function (e) {

//   e.preventDefault();

//   $(this).parent().addClass('active');
//   $(this).parent().siblings().removeClass('active');

//   target = $(this).attr('href');

//   $('.login-tab-content > div').not(target).hide();

//   $(target).fadeIn(600);

// });

  //lazyloader
  !function(window){
  var $q = function(q, res){
        if (document.querySelectorAll) {
          res = document.querySelectorAll(q);
        } else {
          var d=document
            , a=d.styleSheets[0] || d.createStyleSheet();
          a.addRule(q,'f:b');
          for(var l=d.all,b=0,c=[],f=l.length;b<f;b++)
            l[b].currentStyle.f && c.push(l[b]);

          a.removeRule(0);
          res = c;
        }
        return res;
      }
    , addEventListener = function(evt, fn){
        window.addEventListener
          ? this.addEventListener(evt, fn, false)
          : (window.attachEvent)
            ? this.attachEvent('on' + evt, fn)
            : this['on' + evt] = fn;
      }
    , _has = function(obj, key) {
        return Object.prototype.hasOwnProperty.call(obj, key);
      }
    ;

  function loadImage (el, fn) {
    var img = new Image()
      , src = el.getAttribute('data-src');
    img.onload = function() {
      if (!! el.parent)
        el.parent.replaceChild(img, el)
      else
        el.src = src;

      fn? fn() : null;
    }
    img.src = src;
  }

  function elementInViewport(el) {
    var rect = el.getBoundingClientRect()

    return (
       rect.top    >= 0
    && rect.left   >= 0
    && rect.top <= (window.innerHeight || document.documentElement.clientHeight)
    )
  }

    var images = new Array()
      , query = $q('img.lazy')
      , processScroll = function(){
          for (var i = 0; i < images.length; i++) {
            if (elementInViewport(images[i])) {
              loadImage(images[i], function () {
                images.splice(i, i);
              });
            }
          };
        }
      ;
    // Array.prototype.slice.call is not callable under our lovely IE8
    for (var i = 0; i < query.length; i++) {
      images.push(query[i]);
    };

    processScroll();
    addEventListener('scroll',processScroll);

}(this);


//progress
var delay = 500;
$(".progress-bar").each(function(i){
    $(this).delay( delay*i ).animate( { width: $(this).attr('aria-valuenow') + '%' }, delay );

    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: delay,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now)+'%');
        }
    });
});

    $(document).ready(function(){
      $(".icon").click(function(){
        $(".action_list").fadeToggle();

      });
    });

