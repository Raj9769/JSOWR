@extends('layouts.front')
@section('content')

<!-- page title start -->
<section class="page-title-area gray-bg-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="page-title">
                    <h1><span>Do</span><span>na</span><span>ti</span><span>on</span></h1>
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Donation</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page title end -->

<!-- our rules start -->
<section class="our-mission management criteria ptb" style="background: #fff;">
    @if (Session::has('alert'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Thank you',
            text: 'Your Donation Send succesfully',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    <div class="container">
        <div class="section-title text-center wow fadeInUp col-lg-12 col-md-12" data-wow-delay=".2s">
            <h2>Donation</h2>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="contact-form gray-bg mb-40">
                    <form method="post" action="/donation/store" id="donation_form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Enter Your name" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email ID</label>
                                <input type="email" name="email" id="email" placeholder="Enter Email Address" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Mobile No.:</label>
                                <input type="tel" name="phone" id="phone" placeholder="Mobile No." required>
                            </div>
                            <div class="col-lg-12">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" placeholder="Enter Amount" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="message">Comment</label>
                                <textarea type="text" name="message" id="message" cols="50" rows="30" placeholder="Your Massage" required></textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact-form-btn text-center">
                                    <button class="thm-btn thm-btn-2" type="submit">Donate</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- our rules end -->

@endsection
