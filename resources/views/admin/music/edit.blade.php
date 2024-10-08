@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Music
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Edit Music</li>
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
               {!! Form::model($music, ['method'=>'PATCH', 'action'=> ['AdminMusicsController@update', $music->id],'files'=>true,'class'=>'form-horizontal']) !!}
               @csrf
               <div class="box-body">
                  <div class="form-group">
                     <label for="s_name" class="col-sm-2 control-label">Singer Name</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="s_name" id="s_name" value="{{$music->s_name}}" placeholder="Enter singer name">
                        @if($errors->has('s_name'))
                        <div class="error text-danger">{{ $errors->first('s_name') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="m_name" class="col-sm-2 control-label">Music name</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="m_name" id="m_name" value="{{$music->m_name}}" placeholder="Enter music name">
                        @if($errors->has('m_name'))
                        <div class="error text-danger">{{ $errors->first('m_name') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="file" class="col-sm-2 control-label">Music</label>
                     <div class="col-sm-4">
                        <input type="file" class="form-control" name="file" id="file" accept="audio/mp3">
                        @if($errors->has('file'))
                        <div class="error text-danger">{{ $errors->first('file') }}</div>
                        @endif
                        <audio width="150" height="50" controls>
                            <source src="{{$music->file}}" type="audio/ogg">
                            <source src="{{$music->file}}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>
                     </div>
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
