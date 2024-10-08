@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Donation List
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Donation List</li>
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
                  <div class="col-md-4">
                     <!-- <a href="{{route('admin.donation.create')}}" class="bg-primary text-white text-decoration-none" style="padding:12px 12px;margin-left:20px"><i class="fa fa-plus editable" style="font-size:15px;">&nbsp;ADD</i></a> -->
                     <button style="padding:10px 20px;margin-left:10px;" class="btn btn-danger text-white delete_all" data-url="{{ url('mydonationDeleteAll') }}">Delete</button>
                  </div>
               </div>
               @if(count($donations)>0)
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;margin-top:15px">
                  <table id="donationtable" class="table table-bordered table-striped">
                     <thead class="bg-primary">
                        <tr>
                        <th width="50px"><input type="checkbox" id="master"></th>
                           <th>Action</th>
                           <th>User Name</th>
                           <th>User Email</th>
                           <th>Mobile</th>
                           <th>Amount</th>
                           <th>Message</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($donations as $donation)
                        <tr id="tr_{{$donation->id}}">
                        <td><input type="checkbox" class="sub_chk" data-id="{{$donation->id}}"></td>
                           <td>
                              <!-- <a href="{{route('admin.donation.edit', $donation->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a> -->
                              <a href="{{route('admin.donation.destroy', $donation->id)}}" onclick="return confirm('Sure ! You want to delete ?');"><i class="fa fa-trash" style="color:white;font-size:15px;background-color:red;padding:8px;border-radius:200px;"></i></a>
                           </td>
                           <td>{{$donation->username}}</td>
                           <td>{{$donation->email}}</td>
                           <td>{{$donation->phone}}</td>
                           <td>{{$donation->amount}}</td>
                           <td>{{$donation->message}}</td>
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
