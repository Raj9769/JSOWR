@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Client List
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Client List</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">

               </div>
               <div class="row">
                  <div class="col-md-7">
                     <!--<a href="{{route('admin.client.create')}}" class="bg-primary text-white text-decoration-none" style="padding:12px 12px;margin-left:20px"><i class="fa fa-plus editable" style="font-size:15px;">&nbsp;ADD</i></a>-->
                  </div>
                  <div class="col-md-5">

                  </div>
               </div>
               @if(count($clients)>0)
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;margin-top:15px">
                  <table id="clienttable" class="table table-bordered table-striped">
                     <thead class="bg-primary">
                        <tr>
                           <th>Action</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Password</th>
                           <th>Approved</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($clients as $client)
                        <tr>
                           <td>
                              <!-- <a href="{{route('admin.client.edit', $client->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a> -->
                              <a href="{{route('admin.client.destroy', $client->id)}}" onclick="return confirm('Sure ! You want to delete ?');"><i class="fa fa-trash" style="color:white;font-size:15px;background-color:red;padding:8px;border-radius:200px;"></i></a>
                           </td>
                           <td>{{$client->name}}</td>
                           <td>{{$client->email}}</td>
                           <td>{{$client->phone}}</td>
                           <td>
                               <input id="pass_log_id{{$client->id}}" class="pass" type="password" value="{{$client->password}}" disabled>
                                <button onclick="showpassword(this.id)" id="{{$client->id}}" class="fa fa-eye field_icon toggle-password"></button>
                           </td>
                           <td>
                              @if($client->is_approve == 0)
                              <a href="/admin/client/active/{{$client->id}}/1" class="btn btn-success">Approve</a>
                              <a href="/admin/client/active/{{$client->id}}/0" class="btn btn-danger">Decline</a>
                              @else
                              <a href="/admin/client/active/{{$client->id}}/0" class="btn btn-danger">Decline</a>
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

<script>

function showpassword(cli_id){

const showpass = document.getElementById("pass_log_id"+cli_id);
showpass.classList.add("show");

$(this).toggleClass("fa-eye fa-eye-slash");

var input = $(".show");
input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password');
showpass.classList.remove("show");

}
</script>

@endsection
