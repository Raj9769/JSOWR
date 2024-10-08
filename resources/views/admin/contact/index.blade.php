@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Contact
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Contact</li>
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
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;margin-top:15px">
                  <table id="contacttable" class="table table-bordered table-striped">
                     <thead class="bg-primary">
                        <tr>
                           <th>Action</th>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Phone no</th>
                           <!-- <th>Subject</th> -->
                           <th>Message</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($contacts as $contact)
                        <tr id="tr_{{$contact->id}}">
                           <td>
                              <a href="{{route('admin.contact.destroy', $contact->id)}}" onclick="return confirm('Sure ! You want to delete ?');"><i class="fa fa-trash" style="color:white;font-size:15px;background-color:red;padding:8px;border-radius:200px;"></i></a>
                           </td>
                           <td>{{$contact->username}}</td>
                           <td>{{$contact->email}}</td>
                           <td>{{$contact->phone}}</td>
                           <!-- <td>{{$contact->subject}}</td> -->
                           <td>
                              @if(strlen($contact->fdetail) > 50)
                              {!!substr($contact->fdetail,0,50)!!}
                              <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                              <span class="read-more-content"> {{substr($contact->fdetail,50,strlen($contact->fdetail))}}
                                 <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                              @else
                              {{$contact->fdetail}}
                              @endif
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>

               </div>
               <!-- /.box-body -->
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
