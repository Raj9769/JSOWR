<?php

use Carbon\Carbon;
?>

@extends('layouts.front')
@section('content')

<!-- page title start -->
<section class="page-title-area gray-bg-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="page-title">
                    <h1><span>e</span><span>ve</span><span>nt</span> <span>De</span><span>t</span><span>ai</span><span>ls</span></h1>
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Event Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page title end -->

<!-- news feeds start -->
<section class="news-feeds-area ptb">
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
            <div class="section-title text-center wow fadeInUp col-lg-12 col-md-12" data-wow-delay=".2s">
                <h2>Event Details</h2>
            </div>
            <div class="col-lg-12">
                <div class="news-wrapper full mb-40">
                    <article>
                        <div class="single-news-post mb-30">
                            <div class="post-thumb mb-30">
                                <img src="{{$event->file}}" alt="image_not_found">
                            </div>
                            <div class="post-content">
                                <div class="post-meta mb-10">
                                    @php
                                    date_default_timezone_set('Asia/Kolkata');
                                    $utcDateTime = $event->date;
                                    $dateTime = Carbon::parse($utcDateTime);
                                    @endphp
                                    <span><a href="#"><i class="far fa-calendar-alt"></i>{{$dateTime->format('d-m-Y h:i A')}}</a></span>
                                </div>
                                <h4 class="post-title">{{$event->title}}</h4>
                                <div class="text mb-30">
                                    <p>{{$event->detail}}</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <div class="post-comment-form pt-30 mb-40">
                        <div class="contact-form gray-bg mb-40">
                            <h3>Add Participants</h3>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form method="post" action="/participant/store" id="participan_form">
                                @csrf
                                <input type="hidden" name="clients_id" value="{{Session::get('client')['id']}}">
                                <input type="hidden" name="c_name" value="{{Session::get('client')['name']}}">
                                <input type="hidden" name="events_id" value="{{$event->id}}">
                                <input type="hidden" name="e_title" value="{{$event->title}}">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="number" name="kids" placeholder="Enter number of Kids" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="number" name="adults" placeholder="Enter number of Adults" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="contact-btn text-center">
                                        <button class="thm-btn" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news feeds end -->

@endsection
