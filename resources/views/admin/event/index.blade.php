<?php
use Carbon\Carbon;
?>
@extends('layouts.admin')
@section('style')
<style type="text/css">
   .read-more-show {
      cursor: pointer;
      color: #ed8323;
   }

   .read-more-hide {
      cursor: pointer;
      color: #ed8323;
   }

   .hide_content {
      display: none;
   }
</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Events List
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Events List</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
               </div>
               <div class="row">
                  <div class="col-md-7">
                     <a href="{{route('admin.event.create')}}" class="bg-primary text-white text-decoration-none" style="padding:12px 12px;margin-left:20px"><i class="fa fa-plus editable" style="font-size:15px;">&nbsp;ADD</i></a>
                  </div>
               </div>
               @if(count($events)>0)
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;margin-top:15px">
                  <table id="eventtable" class="table table-bordered table-striped">
                     <thead class="bg-primary">
                        <tr>
                           <th>Action</th>
                           <th>Event Title</th>
                           <th>Image</th>
                           <th>Date</th>
                           <th>Location</th>
                           <th>Detail</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($events as $event)
                        <tr>
                           <td>
                              <a href="{{route('admin.event.edit', $event->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
                              <a href="{{route('admin.event.destroy', $event->id)}}" onclick="return confirm('Sure ! You want to delete ?');"><i class="fa fa-trash" style="color:white;font-size:15px;background-color:red;padding:8px;border-radius:200px;"></i></a>
                           </td>
                           <td>{{$event->title}}</td>
                           <td> <img height="50" src="{{$event->file ? $event->file : 'https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png'}}" alt=""></td>
                           @php
                           date_default_timezone_set('Asia/Kolkata');
                           $utcDateTime = $event->date;
                           $dateTime = Carbon::parse($utcDateTime);
                           @endphp
                           <td>{{$dateTime->format('d-m-Y h:i A')}}</td>
                           <td>{{$event->location}}</td>
                           <td>
                              @if(strlen($event->detail) > 100)
                              {{substr($event->detail,0,100)}}
                              <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                              <span class="read-more-content"> {{substr($event->detail,100,strlen($event->detail))}}
                                 <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                              @else
                              {{$event->detail}}
                              @endif
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <!-- /.box-body -->
               @else
               <center>
                  <h1>No Record found</h1>
               </center>
               @endif
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
   // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
   $('.read-more-content').addClass('hide_content')
   $('.read-more-show, .read-more-hide').removeClass('hide_content')

   // Set up the toggle effect:
   $('.read-more-show').on('click', function(e) {
      $(this).next('.read-more-content').removeClass('hide_content');
      $(this).addClass('hide_content');
      e.preventDefault();
   });

   // Changes contributed by @diego-rzg
   $('.read-more-hide').on('click', function(e) {
      var p = $(this).parent('.read-more-content');
      p.addClass('hide_content');
      p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
      e.preventDefault();
   });
</script>
@endsection
