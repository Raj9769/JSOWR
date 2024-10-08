@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @if ($donationunshow > 0)
      <a href="{{URL::to('/admin/donation')}}">
         <div class="alert alert-success">
            <h4><b>{{$donationunshow}}</b> New Donation</h4>
         </div>
      </a>
      @endif
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$clients}}</h3>

              <p>Clients</p>
            </div>
            <div class="icon">
            <i class="fa fa-check-square-o"></i>
            </div>
            <a href="{{URL::to('/admin/client')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
               <div class="inner">
                  <h3>{{$events}}</h3>
                  <p>Events</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="{{URL::to('/admin/event')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
               <div class="inner">
                  <h3>{{$gallerys}}</h3>
                  <p>Gallery</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="{{URL::to('/admin/galleryimage')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
               <div class="inner">
                  <h3>{{$musics}}</h3>
                  <p>Musics</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="{{URL::to('/admin/music')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-olive">
               <div class="inner">
                  <h3>{{$books}}</h3>
                  <p>Books</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="{{URL::to('/admin/book')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>


         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="inner">
                  <h3>{{$contacts}}</h3>
                  <p>Contact</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="{{URL::to('/admin/contact')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-navy">
               <div class="inner">
                  <h3>{{$donations}}</h3>
                  <p>Donations</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="{{URL::to('/admin/donation')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>

      </div>
      <!-- /.row -->
      
      <!-- <hr/ style="border:2px solid #000"> -->
      <h3>
         <center><b>Event Lists</b></center>
      </h3>
      <table class="table table-bordered table-striped">
         <thead class="bg-primary">
            <tr>
               <th>Event</th>
               <th>Date</th>
               <th>Total no of Kids</th>
               <th>Total no of Adults</th>
            </tr>
         </thead>
         <tbody>
            @foreach($eventlists as $eventlist)
            <tr>
               <td><b>{{$eventlist->title}}</b></td>
               @php

               $kids = \App\Models\Participant::where('events_id', $eventlist->id)->sum('kids');
               $adults = \App\Models\Participant::where('events_id', $eventlist->id)->sum('adults');
               date_default_timezone_set('Asia/Kolkata');
               $utcDateTime = $eventlist->date;
               $dateTime = Carbon\Carbon::parse($utcDateTime);
               @endphp
               <td>{{$dateTime->format('d-m-Y h:i A')}}</td>


               <td><b>{{$kids}}</b></td>
               <td><b>{{$adults}}</b></td>
            </tr>
            @endforeach
         </tbody>
      </table>

    </section>
    <!-- /.content -->
  </div>

  @endsection
