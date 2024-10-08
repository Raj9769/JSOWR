@extends('layouts.front')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<style>
    .details {
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        width: 50%;
        margin-top: 10px;
    }

    .details .txt2 {
        font-size: 15px;
        border-bottom: 1px solid #000;
    }
    body {
        font-family: "Open Sans", sans-serif;
    }
</style>
@endsection

@section('content')


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('assets/img/img-01.webp')}}" alt="IMG">
            </div>
            <form action="{{route('logincheck')}}" method="POST" class="login100-form validate-form">
            @csrf
                <span class="login100-form-title">
                    Member Login
                </span>
                @if (\Session::has('alert'))
                    <div class="alert alert-danger">
                        {!! \Session::get('alert') !!}
                    </div>
                    @endif
                <label for="email">Email</label>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <label for="password">Password</label>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
                <div class="text-center details p-t-136">
                    <a class="txt2" href="{{URL::to('/site/signup')}}">
                        Sign Up
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>

<script src="{{asset('assets/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

<script src="{{asset('assets/js/main.js')}}"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7f2515807fa7f3a1","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.7.0","si":100}' crossorigin="anonymous"></script>

@endsection
