<div class="header-area header-space transparent-header header-2 pl-100 pr-100">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="header-logo col-xl-4 col-lg-4 col-sm-4 col-xs-4">
            <div class="logo">
               <a href="{{URL::to('/')}}"><img src="{{asset('assets/img/logo/logo.png')}}" alt="logo_not_found"></a>
            </div>
         </div>
         <div class="col-xl-6 col-lg-6 d-none d-lg-block">
            <div class="main-menu">
               <nav id="mobile-menu">
                  <ul class="menu">
                     <li><a class="{{ (request()->segment(1) == '') ? 'active' : '' }}" href="{{URL::to('/')}}">Home</a>
                     </li>
                     <li><a class="{{ (request()->segment(2) == 'about') ? 'active' : '' }}" href="{{URL::to('/site/about')}}">About us</a></li>
                     <li><a class="{{ (request()->segment(2) == 'event') ? 'active' : '' }}" href="{{URL::to('/site/event')}}">Event</a></li>
                     <li><a class="{{ (request()->segment(2) == 'donation') ? 'active' : '' }}" href="{{URL::to('/site/donation')}}">Donation</a></li>
                     <li><a class="{{ (request()->segment(2) == 'contact') ? 'active' : '' }}" href="{{URL::to('/site/contact')}}">Contact Us</a></li>
                  </ul>
               </nav>
            </div>
         </div>
         <div class="col-xl-2 col-lg-2 col-sm-8 col-xs-8 header-right d-flex align-items-center justify-content-end">
            <div class="header-right">
            @if(Session::has('client'))
               <div class="header-btn f-right">
                  <a class="thm-btn thm-btn-2" href="{{URL::to('/site/userlogout')}}">Log out</a>
               </div>
               @else
               <div class="header-btn f-right">
                  <a class="thm-btn thm-btn-2" href="{{URL::to('/site/userlogin')}}">Log In</a>
               </div>
               @endif
            </div>
            <div class="hamburger-menu d-lg-none">
               <a href="javascript:void(0);" class="">
                  <i class="fas fa-bars"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
