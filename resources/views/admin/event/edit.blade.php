<?php

?>
@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Product
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Edit Product</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-danger">
               <div class="box-header">
                  @if($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
                  <h3 class="box-title"></h3>
               </div>
               {!! Form::model($event, ['method'=>'PATCH', 'action'=> ['AdminEventsController@update', $event->id],'files'=>true,'class'=>'form-horizontal']) !!}
               @csrf
               <div class="box-body">

                  <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Event Title</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Event name" value="{{$event->title}}" required>
                        @if($errors->has('title'))
                        <div class="error text-danger">{{ $errors->first('title') }}</div>
                        @endif
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="file" class="col-sm-2 control-label">Event Image</label>
                     <div class="col-sm-4">
                        <input type="file" name="file" id="file" class="form-control border border-dark mb-2" accept="image/*">
                        @if($errors->has('file'))
                        <div class="error text-danger">{{ $errors->first('file') }}</div>
                        @endif
                     </div>
                     <div class="form-group col-md-2">
                        <img height="50" src="{{$event->file ? $event->file : 'https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png'}}" alt="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="date" class="col-sm-2 control-label">Date</label>
                     <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" name="date" id="date" value="{{$event->date}}" required>
                        @if($errors->has('date'))
                        <div class="error text-danger">{{ $errors->first('date') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="location" class="col-sm-2 control-label">Location</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="location" id="location" value="{{$event->location}}" placeholder="Enter Location event" required>
                        @if($errors->has('location'))
                        <div class="error text-danger">{{ $errors->first('location') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="detail" class="col-sm-2 control-label">Event detail</label>
                     <div class="col-sm-4">
                        <textarea type="text" class="form-control" name="detail" id="detail" placeholder="Enter Event detail" required>{{$event->detail}}</textarea>
                        @if($errors->has('detail'))
                        <div class="error text-danger">{{ $errors->first('detail') }}</div>
                        @endif
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-3 col-sm-4 control-label">
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
