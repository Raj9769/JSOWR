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
                    <h1><span>E</span><span>v</span><span>e</span><span>n</span><span>t</span></h1>
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Event</li>
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
    <div class="container">
        <div class="row">
            <div class="section-title text-center wow fadeInUp col-lg-12 col-md-12" data-wow-delay=".2s">
                <h2>Our Events</h2>
            </div>
            <div class="col-lg-12">
                <div class="news-wrapper mb-40">
                    <article>
                        @foreach($events as $event)
                        <div class="post-item mb-30">
                            <div class="post-thumb">
                                <a href="{{URL::to('/site/event-detail',$event->id)}}">
                                    <img src="{{$event->file}}" alt="image_not_found">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="post-meta mb-10">
                                    @php
                                    date_default_timezone_set('Asia/Kolkata');
                                    $utcDateTime = $event->date;
                                    $dateTime = Carbon::parse($utcDateTime);
                                    @endphp
                                    <span>
                                        <a href="#"><i class="far fa-calendar-alt"></i>{{$dateTime->format('d-m-Y h:i A')}}</a>
                                    </span>
                                </div>
                                <h3 class="post-title"><a href="{{URL::to('/site/event-detail',$event->id)}}">{{$event->title}}</a></h3>
                                <div class="post-text mb-30">
                                    <p>@if(strlen($event->detail) > 100)
                                        {{substr($event->detail,0,100)}}
                                        @else
                                        {{$event->detail}}
                                        @endif
                                    </p>
                                </div>
                                <div class="post-btn">
                                    <a href="{{URL::to('/site/event-detail',$event->id)}}" class="thm-btn thm-btn-2">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news feeds end -->

@endsection
