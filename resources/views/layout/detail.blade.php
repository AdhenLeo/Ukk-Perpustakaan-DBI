
<!DOCTYPE html>
   <html lang="en">
   <head>
      {{-- <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href="{{ asset('front/assets/img/flaticon.png') }}" type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

      <link rel="stylesheet" href="{{ asset('front/landing/assets/css/swiper-bundle.min.css') }}">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="{{ asset('front/landing/assets/css/style.css') }}">

      {{-- new --}}

      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>DBI</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('front/landing/assets/css/css-extend/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('front/landing/assets/css/css-extend/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('front/landing/assets/css/css-extend/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('front/landing/assets/img/fevicon.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('front/landing/assets/css/css-extend/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets -->
      <link rel="stylesheet" href="{{ asset('front/landing/assets/css/css-extend/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/landing/assets/css/css-extend/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


      <title>Responsive book website - Bedimcode</title>
   </head>
   <body>
      <!-- ga kepake -->

      <!--==================== MAIN ====================-->
      @include('layout.landing.navbar')
        <!-- Header-->
        <!-- Section-->
        @yield('content')
        <!-- Footer-->
        @include('layout.landing.footer')


      <!--========== SCROLL UP ==========-->
      <a href="" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
      </a>

      <!--=============== SCROLLREVEAL ===============-->
      <script src=""></script>

      <!--=============== SWIPER JS ===============-->
      <script src="{{ asset('front/landing/assets/js/swiper-bundle.min.js') }}"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <!--=============== MAIN JS ===============-->
      <script src="{{ asset('front/landing/assets/js/main.js') }}"></script>

      <!-- Javascript files-->
      <script src="{{ asset('front/landing/assets/js/js-extend/jquery.min.js') }}"></script>
      <script src="{{ asset('front/landing/assets/js/js-extend/popper.min.js') }}"></script>
      <script src="{{ asset('front/landing/assets/js/js-extend/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('front/landing/assets/js/js-extend/jquery-3.0.0.min.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('front/landing/assets/js/js-extend/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('front/landing/assets/js/js-extend/custom.js') }}"></script>
      <!-- javascript -->
      <script src="{{ asset('front/landing/assets/js/js-extend/owl.carousel.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         $('#datepicker').datepicker({
             uiLibrary: 'bootstrap4'
         });
      </script>
   </body>
</html>
