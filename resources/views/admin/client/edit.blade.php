<?php

?>
@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Client
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Edit Client</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-danger">
               <div class="box-header">
                  <h3 class="box-title"></h3>
                  @if (\Session::has('alert'))
                  <div class="alert alert-danger">
                     {!! \Session::get('alert') !!}
                  </div>
                  @endif
               </div>
               {!! Form::model($client, ['method'=>'PATCH', 'action'=> ['AdminClientController@update', $client->id],'files'=>true,'class'=>'form-horizontal']) !!}
               @csrf
               <div class="box-body">
                  <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Client Name</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$client->name}}" required>
                        @if($errors->has('name'))
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                        @endif
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="email" class="col-sm-2 control-label">Email</label>
                     <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{$client->email}}" required>
                        @if($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="phone" class="col-sm-2 control-label">phone</label>
                     <div class="col-sm-4">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter username" value="{{$client->phone}}" required>
                        @if($errors->has('phone'))
                        <div class="error text-danger">{{ $errors->first('phone') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="password" class="col-sm-2 control-label">Password</label>
                     <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" value="{{$client->password}}" required>
                        @if($errors->has('password'))
                        <div class="error text-danger">{{ $errors->first('password') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3 col-sm-2 control-label">
                        {!! Form::submit('Update', ['class'=>'btn btn-success text-white mt-1']) !!}
                     </div>
                  </div>
               </div>
               {!! Form::close() !!}
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col (left) -->
         <!-- /.col (right) -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
@endsection
@section('script')
<script>
   function addappdata(cli_id){
           $("#show"+cli_id).show();
       }

   function addappdataedit(cli_id){
      $("#showsolddetails"+cli_id).show();
   }
</script>

<script>
   $(document).ready(function () {
            $('#category').on('change',function(e){
            // console.log(e);
            var cat_id = e.target.value;
            console.log(cat_id);
            //ajax
            $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
                //success data
               console.log(data);
                var subcat =  $('#subcategory').empty();
                $.each(data,function(create,subcatObj){
                    var option = $('<option/>', {id:create, value:subcatObj});
                    subcat.append('<option value ="'+subcatObj.id+'">'+subcatObj.subcatname+'</option>');
                });
            });
        });
    });
</script>
@endsection
