@extends('layouts.front')
@section('content')

<!-- page title start -->
<section class="page-title-area gray-bg-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="page-title">
                    <h1><span>Ab</span><span>ou</span><span>t</span> <span>us</span></h1>
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">About us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page title end -->

<!-- our mission start -->
<section class="our-mission ptb">
    <div class="container">
        <div class="section-title text-center wow fadeInUp col-lg-12 col-md-12" data-wow-delay=".2s">
            <h2>Welcome to the Jain Center</h2>
        </div>
        <div class="row">
            <div class="our-img col-lg-6 col-md-12">
                <img src="{{asset('assets/img/about/mission.jpg')}}" alt="mission">
            </div>
            <div class="our-block col-lg-6 col-md-12">
                <p>The Jain Society of Waterloo Region (JSOWR) was established in 1974 by a group of Individuals with the aim of promoting cultural and community services to Jain individuals who have come into the country.</p>
                <p>JSOT was registered as a non-profit organization in 1974, with one important mandate; to practice, promote and teach Jainism. JSOT is one of the first Jain organizations established in Canada and fifth in North America. Its mandate is not only to promote Jain principles and practice, but also to provide a place of worship for the Jain community in greater Toronto area.</p>
                <p>In 1983 JSOT bought its first home, a small community hall on Parklawn Ave, in Etobicoke for $110,000.00. Community hall was about 2000 sq.ft sufficient for the members at that time. There were 50-75 Jain families who helped pay for the community hall. Over the next few years the work of the community spread and the need for a bigger community hall arose.</p>
                <p>In 1992 JSOT acquired another Community Hall on 48 Rosemeade Ave for One million dollars. At the time of acquisition the membership was around 250 members. Once again the work of the Community guided by its core principals of welcoming everyone resulted in need of a bigger Community Hall. In 2012 Society acquired just over 4 acres of land and a unfinished building, from the Greek Community, in Scarborough.</p>
                <p>From humble beginnings stated by a few families in 1974, with a vision to have a common community center to promote ideas, teaching and a place to gather and provide social support to both the adults and children coming into the Country the Community has now grown to over 1200 families.</p>
            </div>
            <div class="our-block col-lg-12 col-md-12">
                <ul>
                    <li><i class="fa fa-chevron-down"></i>Hosted Jaina Convention in 1989 and 1997 with over 2000 and 7000 attendees respectively from all over the world. (Jaina convention brings Jain community of North America together )</li>
                    <li><i class="fa fa-chevron-down"></i>Raised funds to build a school, for the victims of 2000 earthquake in Kutch, India</li>
                    <li><i class="fa fa-chevron-down"></i>Showcased various pieces of Jain Art on the life of Bhagwan Mahavir at Toronto Harbour Front Center in celebration of 2600th Janma kalyanak of Bhagwan Mahavir,. The event was attended by over 15,000 Torontoians.</li>
                    <li><i class="fa fa-chevron-down"></i>Pathshala (“Sunday School”) was started to teach children about Jainism and the Jain way of life.</li>
                    <li><i class="fa fa-chevron-down"></i>Swadhyay classes every month teaching spiritual knowledge commenenced in 2003</li>
                    <li><i class="fa fa-chevron-down"></i>Seniors group started in 2007. Allowing seniors to gather in a common community place to socialize, discuss issues and provide resources to help.</li>
                    <li><i class="fa fa-chevron-down"></i>Youth clubs started in 1998. Events such as team sports, Ski camps, Ahimsa Camps commence annual in the aim of providing youths a safe place to gather and play.</li>
                    <li><i class="fa fa-chevron-down"></i>Women’s group started in 1995 with the aim of providing a supporting environment and to promote women leadership in the community.</li>
                    <li><i class="fa fa-chevron-down"></i>New Immigrants networking groups started in 2017 with the aim of providing a ‘Helping Hand” to new immigrants into the city.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- our mission end -->

@endsection
