<div class="footer-area gray-bg-2">
    <div class="footer-bottom footer-bottom-2 pt-30 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="footer-left-widget mb-40">
                        <div class="footer-logo">
                            <img src="{{asset('assets/img/logo/logo.png')}}" alt="logo_not_found">
                        </div>
                        <p>Jain Society of Waterloo Region (JSOWR) was established in 1974 by a group of Individuals with the aim of promoting cultural and community services to Jain individuals who have come into the country.</p>
                        <div class="footer-social mt-30">
                            <a href="javascript::void(0);"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript::void(0);"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 offset-xl-1 col-lg-6 col-md-6">
                    <div class="footer-widget link mb-40">
                        <h3>The Institute</h3>
                        <ul class="footer-link">
                            <li><a class="{{ (request()->segment(1) == '') ? 'active' : '' }}" href="{{URL::to('/')}}">Home</a>
                            </li>
                            <li><a class="{{ (request()->segment(2) == 'about') ? 'active' : '' }}" href="{{URL::to('/site/about')}}">About us</a></li>
                            <li><a class="{{ (request()->segment(2) == 'event') ? 'active' : '' }}" href="{{URL::to('/site/event')}}">Event</a></li>
                            <li><a class="{{ (request()->segment(2) == 'donation') ? 'active' : '' }}" href="{{URL::to('/site/donation')}}">Donation</a></li>
                            <li><a class="{{ (request()->segment(2) == 'contact') ? 'active' : '' }}" href="{{URL::to('/site/contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 pr-0">
                    <div class="footer-widget footer-widget-space mb-40">
                        <h3>Contact With US</h3>
                        <ul class="footer-info">
                            <li>
                                <div class="footer-address">
                                    <span><i class="fas fa-map-marker-alt"></i></span>
                                    <p>1441 old zellar dr., Kitchener ON N2A 4M8 Canada</p>
                                </div>
                            </li>
                            <li>
                                <div class="footer-address">
                                    <span><i class="fas fa-phone-alt"></i></span>
                                    <p>
                                        <a href="tel:+1 647 283 3645">+1 (647)-283-3645</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="footer-address">
                                    <span><i class="fas fa-envelope-open-text"></i></span>
                                    <p><a href="mailto:info@jsowrcanada.com">info@jsowrcanada.org</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright-area pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="copyright-text text-center">
                    <p>Copyright &copy; 2023. All Right Reserved/ By <a href="#">Jain Society of Waterloo Region (JSOWR)</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
