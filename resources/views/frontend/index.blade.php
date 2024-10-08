<?php

use App\Models\Book;
use App\Models\Galleryimage;
use App\Models\Music;

$gallerys = Galleryimage::where('is_show', 1)->paginate(8);
$musics = Music::where('is_show', 1)->get();
$books = Book::where('is_show', 1)->get();

?>

@extends('layouts.front')
@section('style')
<style>
    .audio-player {
        --player-button-width: 3em;
        --sound-button-width: 2em;
        --space: .5em;
        width: 15rem;
        height: 15rem;
    }

    .icon-container {
        width: 100%;
        height: 100%;
        background-color: #DE5E97;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .audio-icon {
        width: 90%;
        height: 90%;
    }

    .controls {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
        margin-top: 10px;
    }

    .player-button {
        background-color: transparent;
        border: 0;
        width: var(--player-button-width);
        height: var(--player-button-width);
        cursor: pointer;
        padding: 0;
    }

    .timeline {
        -webkit-appearance: none;
        width: calc(100% - (var(--player-button-width) + var(--sound-button-width) + var(--space)));
        height: .5em;
        background-color: #e5e5e5;
        border-radius: 5px;
        background-size: 0% 100%;
        background-image: linear-gradient(#DE5E97, #DE5E97);
        background-repeat: no-repeat;
        margin-right: var(--space);
    }

    .timeline::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 1em;
        height: 1em;
        border-radius: 50%;
        cursor: pointer;
        opacity: 0;
        transition: all .1s;
        background-color: #a94672;
    }

    .timeline::-moz-range-thumb {
        -webkit-appearance: none;
        width: 1em;
        height: 1em;
        border-radius: 50%;
        cursor: pointer;
        opacity: 0;
        transition: all .1s;
        background-color: #a94672;
    }

    .timeline::-ms-thumb {
        -webkit-appearance: none;
        width: 1em;
        height: 1em;
        border-radius: 50%;
        cursor: pointer;
        opacity: 0;
        transition: all .1s;
        background-color: #a94672;
    }

    .timeline::-webkit-slider-thumb:hover {
        background-color: #943f65;
    }

    .timeline:hover::-webkit-slider-thumb {
        opacity: 1;
    }

    .timeline::-moz-range-thumb:hover {
        background-color: #943f65;
    }

    .timeline:hover::-moz-range-thumb {
        opacity: 1;
    }

    .timeline::-ms-thumb:hover {
        background-color: #943f65;
    }

    .timeline:hover::-ms-thumb {
        opacity: 1;
    }

    .timeline::-webkit-slider-runnable-track {
        -webkit-appearance: none;
        box-shadow: none;
        border: none;
        background: transparent;
    }

    .timeline::-moz-range-track {
        -webkit-appearance: none;
        box-shadow: none;
        border: none;
        background: transparent;
    }

    .timeline::-ms-track {
        -webkit-appearance: none;
        box-shadow: none;
        border: none;
        background: transparent;
    }

    .sound-button {
        background-color: transparent;
        border: 0;
        width: var(--sound-button-width);
        height: var(--sound-button-width);
        cursor: pointer;
        padding: 0;
    }
</style>
@endsection
@section('content')
@if (\Session::has('alert'))
<div class="alert alert-success" id="displayhide">
    {!! \Session::get('alert') !!}
    <button id="hidAlert">X</button>
</div>
@endif

<!-- banner start -->
<section class="banner-area hero-active banner-space banner-2 pl-100 pr-100 fix owl-carousel">
    <div class="hero-bg-image d-flex align-items-center banner-height">
        <div class="image-container">
            <img src="{{asset('assets/img/bg/banner1.jpg')}}">
        </div>
    </div>
    <div class="hero-bg-image d-flex align-items-center banner-height">
        <div class="image-container">
            <img src="{{asset('assets/img/bg/banner2.jpg')}}">
        </div>
    </div>
</section>
<!-- banner end -->

<!-- about start -->
<section class="about-area about-2 ptb fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-right mb-50">
                    <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                        <h2>Welcome to the Jain Center</h2>
                        <p>A non-profit religious organization to pursue a goal of practicing, promoting and preserving the Jain religion.</p>
                        <p>Jain Society of Waterloo Region (JSOWR) located in Scarborough, Toronto is a non-profit religious organization to pursue a goal of practicing, promoting and preserving the Jain religion. It is governed by a constitution and managed by Board of Directors and an Executive Committee consisting of President, Vice President, Secretary, Treasurer and 8 Members, who are elected by the members for a term of two years.</p>
                        <p>Various Events and On-going Activities are planned and organized by a number of sub-groups including Jain Seniors Group, Young Jains of Toronto (YJOT), Jain Professional and Cultural Association of Young Adults (JPCA). During the year Dignitaries from India and other parts of the world visit our center and hold lectures and discourses in Jainism.</p>
                        <p>We look forward to seeing you at the Jain Center!</p>
                    </div>

                    <div class="about-right-bottom d-flex flex-wrap clearfix mt-20">
                        <div class="about-btn f-left wow fadeInUp" data-wow-delay=".8s">
                            <a class="thm-btn" href="{{URL::to('/site/about')}}">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-12">
                <div class="about-left about-left-2 pos-rel mb-50 wow fadeInRight" data-wow-delay=".4s">
                    <div class="about-img-big">
                        <img src="{{asset('assets/img/about/about-img-big.jpg')}}" alt="image_not_found">
                    </div>
                    <div class="about-img-sml">
                        <img src="{{asset('assets/img/about/about-img-sml-02.jpg')}}" width="250" height="250" alt="image_not_found">
                    </div>
                    <!-- <div class="about-video-btn">
                                    <a class="popup-video video-icon" href="https://www.youtube.com/watch?v=cRXm1p-CNyk"><i class="fas fa-play"></i></a>
                                </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about end -->

<!-- gallery start -->
<section class="gallery-area ptb gray-bg">
    <div class="container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
            <h2>Photo Gallery</h2>
        </div>
        <div class="row grid text-center">
            @foreach($gallerys as $gallery)
            <div class="col-lg-4 col-md-6 grid-item mb-30 cat4 cat5 cat2">
                <div class="gallery">
                <a href="{{$gallery->file}}" download="download">
                    <div class="gallery-thumb">
                        <img src="{{$gallery->file}}" alt="image_not_found">
                    </div>
                    </a>
                    <!-- <div class="gallery-content">
                        <div class="content-view">
                            <a class="popup-image" href="{{$gallery->file}}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div> -->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- gallery end -->

<!-- gallery start -->
<section class="gallery-area video-area ptb">
    <div class="container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
            <h2>Books</h2>
        </div>

        <div class="row grid text-center">
            @foreach($books as $book)
            <div class="col-lg-4 col-md-6 grid-item mb-30 cat4 cat5 cat2">
                <div class="gallery">
                    <div class="gallery-thumb">
                        <a href="{{$book->file}}" target="_blank">
                            <img src="{{asset('assets/img/book.png')}}" alt="image_not_found">
                            <p style="font-size:20px;">{{$book->b_name}} &nbsp;&nbsp; by &nbsp;&nbsp; {{$book->a_name}}</p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- gallery end -->

<!-- gallery start -->
<section class="gallery-area audio-area ptb gray-bg">
    <div class="container">
        <div class="section-title text-center wow fadeInUp" data-wow-delay=".2s">
            <h2>Audio Gallery</h2>
        </div>
        <div class="row grid text-center">
            @foreach($musics as $music)
            <div class="col-lg-4 col-md-6 grid-item mb-30 cat4 cat5 cat2">
                <div class="gallery">
                    <div class="gallery-thumb">
                        <!-- <audio controls>
                            <source src="{{$music->file}}" type="audio/ogg">
                            <source src="{{$music->file}}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio> -->

                        <!-- https://codepen.io/shahednasser/pen/XWgbGBN -->

                        <div class="audio-player">
                            <div class="icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" class="audio-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                                </svg>
                            </div>
                            <audio src="{{$music->file}}"></audio>
                            <div class="controls">
                                <button class="player-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <input type="range" class="timeline" max="100" value="0">
                                <button class="sound-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                        <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                &nbsp;&nbsp;
                                <a href="{{$music->file}}" download="download"><i class="fa fa-download fa-2x" aria-hidden="true"></i></a>
                            </div>
                            <span>{{$music->m_name}} &nbsp;&nbsp; by &nbsp;&nbsp; {{$music->s_name}}</span>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- gallery end -->

@endsection

@section('script')
<script>
    const playerButton = document.querySelector('.player-button'),
        audio = document.querySelector('audio'),
        timeline = document.querySelector('.timeline'),
        soundButton = document.querySelector('.sound-button'),
        playIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
  </svg>
      `,
        pauseIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
</svg>
      `,
        soundIcon = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
  <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd" />
</svg>`,
        muteIcon = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
  <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd" />
</svg>`;

    function toggleAudio() {
        if (audio.paused) {
            audio.play();
            playerButton.innerHTML = pauseIcon;
        } else {
            audio.pause();
            playerButton.innerHTML = playIcon;
        }
    }

    playerButton.addEventListener('click', toggleAudio);

    function changeTimelinePosition() {
        const percentagePosition = (100 * audio.currentTime) / audio.duration;
        timeline.style.backgroundSize = `${percentagePosition}% 100%`;
        timeline.value = percentagePosition;
    }

    audio.ontimeupdate = changeTimelinePosition;

    function audioEnded() {
        playerButton.innerHTML = playIcon;
    }

    audio.onended = audioEnded;

    function changeSeek() {
        const time = (timeline.value * audio.duration) / 100;
        audio.currentTime = time;
    }

    timeline.addEventListener('change', changeSeek);

    function toggleSound() {
        audio.muted = !audio.muted;
        soundButton.innerHTML = audio.muted ? muteIcon : soundIcon;
    }

    soundButton.addEventListener('click', toggleSound);
</script>
@endsection
