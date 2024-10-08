<!doctype html>
<html>

<head>
   @include('includes.head')
</head>

<body>

   <?php if (request()->segment(1) == '') {?>
      <div id="preloader">
         <div class="preloader">
            <span></span>
            <span></span>
         </div>
      </div>
   <?php }?>

   <!-- header area start -->
   <header>
      @include('includes.header')
   </header>
   <!-- header area end here -->

   <!-- slide-bar start -->
   <aside class="slide-bar">
      <div class="close-mobile-menu">
         <a href="javascript:void(0);"><i class="ti-close"></i></a>
      </div>

      <!-- side-mobile-menu start -->
      <nav class="side-mobile-menu">
         <ul id="mobile-menu-active">
            <li><a style="font-family: Open Sans;" class="{{ (request()->segment(1) == '') ? 'active' : '' }}" href="{{URL::to('/')}}">Home</a>
            </li>
            <li><a class="{{ (request()->segment(2) == 'about') ? 'active' : '' }}" href="{{URL::to('/site/about')}}">About us</a></li>
            <li><a class="{{ (request()->segment(2) == 'event') ? 'active' : '' }}" href="{{URL::to('/site/event')}}">Event</a></li>
            <li><a class="{{ (request()->segment(2) == 'donation') ? 'active' : '' }}" href="{{URL::to('/site/donation')}}">Donation</a></li>
            <li><a class="{{ (request()->segment(2) == 'contact') ? 'active' : '' }}" href="{{URL::to('/site/contact')}}">Contact Us</a></li>
         </ul>
      </nav>
      <!-- side-mobile-menu end -->
   </aside>

   <div class="body-overlay"></div>
   <!-- slide-bar end -->

   <main>
      @yield('content')
   </main>

   <footer>
      @include('includes.footer')
   </footer>

   <!-- JS here -->
   <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
   <script src="{{asset('assets/js/modernizr-3.8.0.min.js')}}"></script>
   <script src="{{asset('assets/js/popper.min.js')}}"></script>
   <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
   <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
   <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
   <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
   <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
   <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
   <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
   <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
   <script src="{{asset('assets/js/wow.min.js')}}"></script>
   <script src="{{asset('assets/js/plugins.js')}}"></script>
   <script src="{{asset('assets/js/main.js')}}"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

   <script>
      var targetDiv = document.getElementById("displayhide");
      $(document).on('click', '#hidAlert', function() {
         targetDiv.style.display = "none";
      });
   </script>
   <script>
      $(document).ready(function() {
         $("#contact_form").validate();
         $("#donation_form").validate();
         $("#participan_form").validate();
      });
   </script>
   @yield('script')
</body>

</html>