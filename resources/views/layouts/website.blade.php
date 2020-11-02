<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Durbar-IT</title>
    <link rel="icon" href="{{asset('public/frontend')}}/images/fav.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/all.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/owl.carousel.min.css">
     <link rel="stylesheet" href="{{asset('public/frontend')}}/css/modal-video.min.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/responsive.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/career.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/team.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/contact.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/auth.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/mixitup.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/product.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/product_detail.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/cart.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('public/frontend')}}/css/user.css">
   
   
</head>

<body>
    <!---start preloader area-->
    <div class="preloader">
        <div id="global">
            <div id="top" class="mask">
                <div class="plane"></div>
            </div>

            <div id="middle" class="mask">
                <div class="plane"></div>
            </div>

            <div id="bottom" class="mask">
                <div class="plane"></div>
            </div>

            <p><b>DIT</b></p>
        </div>
    </div>

    <!--- End Preloader Area -->
    <!--- header top part start -->
    @include('frontend.include.headertop')
     <!--- header top part end -->
    <!--- mobile header -->
    @include('frontend.include.mainheader')

    <!--- header part end -->
    <!--- banner part start -->
    @yield('content')
    <!--- client part end -->
    
    <!--- footer part start -->
    @include('frontend.include.footer')
    <!--- footer part end -->
 
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{asset('public/frontend')}}/js/owl.carousel.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('public/frontend')}}/js/wow.min.js"></script>
      <script src="{{asset('public/frontend')}}/js/jquery-modal-video.min.js" type="text/javascript"></script>
    <script src="{{asset('public/frontend')}}/js/mixitup.min.js" type="text/javascript"></script>
    <script src="{{asset('public/frontend')}}/js/active.js" type="text/javascript"></script>
    <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
  <script>

        @if (Session:: has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>








    <script src="{{asset('public/frontend')}}/js/custom.js"></script>
    <script>
    
 
       $('.openbtn').on('click',function(){
    $('#mySidebar').toggleClass('menu_show');
});
$('.closebtn').on('click',function(){
    $('#mySidebar').toggleClass('menu_show');
});
//modal video

    $(".js-modal-btn").modalVideo();
 
        // // Select all links with hashes
        // $('a[href*="#"]')
        //     // Remove links that don't actually link to anything
        //     .not('[href="#"]')
        //     .not('[href="#0"]')
        //     .click(function(event) {
        //         // On-page links
        //         if (
        //             location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
        //             location.hostname == this.hostname
        //         ) {
        //             // Figure out element to scroll to
        //             var target = $(this.hash);
        //             target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        //             // Does a scroll target exist?
        //             if (target.length) {
        //                 // Only prevent default if animation is actually gonna happen
        //                 event.preventDefault();
        //                 $('html, body').animate({
        //                     scrollTop: target.offset().top
        //                 }, 1000, function() {
        //                     // Callback after animation
        //                     // Must change focus!
        //                     var $target = $(target);
        //                     $target.focus();
        //                     if ($target.is(":focus")) { // Checking if the target was focused
        //                         return false;
        //                     } else {
        //                         $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
        //                         $target.focus(); // Set focus again
        //                     };
        //                 });
        //             }
        //         }
        //     });
        //     //isotope filter

    

    </script>

  



</body>

</html>