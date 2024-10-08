@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Client
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Add Client</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- right column -->
         <div class="col-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
               <div class="box-header with-border">
               @if (\Session::has('alert'))
               <div class="alert alert-danger">
                     {!! \Session::get('alert') !!}
               </div>
               @endif
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               {!! Form::open(['method'=>'POST', 'action'=> 'AdminClientController@store','files'=>true,'class'=>'form-horizontal']) !!}
               @csrf
               <div class="box-body">
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Client Name</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                        @if($errors->has('name'))
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                        @endif
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="email" class="col-sm-2 control-label">Email</label>
                     <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                        @if($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="phone" class="col-sm-2 control-label">phone</label>
                     <div class="col-sm-4">
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter phone" required>
                        @if($errors->has('phone'))
                        <div class="error text-danger">{{ $errors->first('phone') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="password" class="col-sm-2 control-label">Password</label>
                     <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        @if($errors->has('password'))
                        <div class="error text-danger">{{ $errors->first('password') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3 col-sm-2 control-label">
                        {!! Form::submit('Add', ['class'=>'btn btn-success text-white mt-1']) !!}
                     </div>
                  </div>
               </div>
               {!! Form::close() !!}
            </div>
            <!-- /.box -->
         </div>
         <!--/.col (right) -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
@endsection
