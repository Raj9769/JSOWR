@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Book
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Edit Book</li>
      </ol>
   </section>
   @if(session()->has('message'))
   <div class="alert text-white" style="background-color:#7EDD72">
      {{ session()->get('message') }}
   </div>
   @endif
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- right column -->
         <div class="col-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
               <div class="box-header with-border">
               @if($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               {!! Form::model($book, ['method'=>'PATCH', 'action'=> ['AdminBooksController@update', $book->id],'files'=>true,'class'=>'form-horizontal']) !!}
               @csrf
               <div class="box-body">
                  <div class="form-group">
                     <label for="a_name" class="col-sm-2 control-label">Singer Name</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="a_name" id="a_name" value="{{$book->a_name}}" placeholder="Enter Author name">
                        @if($errors->has('a_name'))
                        <div class="error text-danger">{{ $errors->first('a_name') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="b_name" class="col-sm-2 control-label">Book name</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="b_name" id="b_name" value="{{$book->b_name}}" placeholder="Enter Book name">
                        @if($errors->has('b_name'))
                        <div class="error text-danger">{{ $errors->first('b_name') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="file" class="col-sm-2 control-label">Book</label>
                     <div class="col-sm-4">
                        <input type="file" class="form-control" name="file" id="file" accept="application/pdf">
                        @if($errors->has('file'))
                        <div class="error text-danger">{{ $errors->first('file') }}</div>
                        @endif
                     </div>
                     <a href="{{$book->file}}" target="_blank"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3 col-sm-2 control-label">
                        {!! Form::submit('Update', ['class'=>'btn btn-success text-white mt-1']) !!}
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
