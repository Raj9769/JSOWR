@extends('layouts.front')
@section('content')

<!-- page title start -->
<section class="page-title-area gray-bg-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="page-title">
                    <h1><span>Co</span><span>nt</span><span>a</span><span>ct</span> <span>Us</span></h1>
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page title end -->

<!-- contact info start -->
<section class="contact-info-area fix ptb">
    <div class="container">
        <div class="section-title text-center wow fadeInUp col-lg-12 col-md-12" data-wow-delay=".2s">
            <h2>Contact Us</h2>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="contact-box-wrapper">
                    <div class="single-contact mb-30">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Email Adress</h4>
                            <p><a href="mailto:info@jsowrcanada.com">info@jsowrcanada.org</a></p>
                        </div>
                    </div>
                    <div class="single-contact mb-30">
                        <div class="contact-icon contact-icon-2">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Phone Number</h4>
                            <p><a href="tel:+1 647 283 3645">+1 (647)-283-3645</a></p>
                        </div>
                    </div>
                    <div class="single-contact mb-30">
                        <div class="contact-icon contact-icon-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Our Location</h4>
                            <p>1441 old zellar dr., Kitchener ON N2A 4M8 Canada
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 offset-xl-1 col-lg-7">
                <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2896.4417949986578!2d-80.40973282409412!3d43.45137296546142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b8b9c490f668f%3A0xa7ebb2346d1329a6!2s1441%20Old%20Zeller%20Dr%2C%20Kitchener%2C%20ON%20N2A%204M8!5e0!3m2!1sen!2sca!4v1691445088395!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact info end -->

<!-- contact form start -->
<section class="contact-form-area pb-80">
    @if (Session::has('alert'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Thank you',
            text: 'Your message Send succesfully',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    <div class="container">
        <div class="row">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <div class="col-12">
                <div class="contact-form gray-bg mb-40">
                    <form method="post" action="/contact/store" id="contact_form" class="contact-form query-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="username">Full Name :</label>
                                <input type="text" name="username" id="username" placeholder="Full Name*" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Id :</label>
                                <input type="email" name="email" id="email" placeholder="Type your email*" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone / Mobile No. :</label>
                                <input type="tel" name="phone" id="phone" placeholder="Type your  number*" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="fdetail">Message :</label>
                                <textarea name="fdetail" id="fdetail" cols="30" rows="10" placeholder="Type your massage*" required></textarea>
                            </div>
                            <div class="contact-form-btn text-center">
                                <button class="thm-btn thm-btn-2" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact form end -->

@endsection
