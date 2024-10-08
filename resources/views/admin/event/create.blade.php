@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Event
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Add Event</li>
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
               {!! Form::open(['method'=>'POST', 'action'=> 'AdminEventsController@store','files'=>true,'class'=>'form-horizontal','name'=>'eventform']) !!}
               @csrf
               <div class="box-body">

                  <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Event Title</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Product name" required>
                        @if($errors->has('title'))
                        <div class="error text-danger">{{ $errors->first('title') }}</div>
                        @endif
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="file" class="col-sm-2 control-label">Event Image</label>
                     <div class="col-sm-4">
                        <input type="file" name="file" id="file" class="form-control border border-dark mb-2" accept="image/*" required>
                        @if($errors->has('file'))
                        <div class="error text-danger">{{ $errors->first('file') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2"></label>
                     <img id="blah_event" src="#" alt="your image" style="display:none;max-height: 150px;width:150px" />
                  </div>
                  <div class="form-group">
                     <label for="date" class="col-sm-2 control-label">Event date & time</label>
                     <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" name="date" id="date" required>
                        @if($errors->has('date'))
                        <div class="error text-danger">{{ $errors->first('date') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="location" class="col-sm-2 control-label">Location</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Enter Event Location" required>
                        @if($errors->has('location'))
                        <div class="error text-danger">{{ $errors->first('location') }}</div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="detail" class="col-sm-2 control-label">Product detail</label>
                     <div class="col-sm-4">
                        <textarea type="text" class="form-control" name="detail" id="detail" placeholder="Enter product detail" required></textarea>
                        @if($errors->has('detail'))
                        <div class="error text-danger">{{ $errors->first('detail') }}</div>
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

@section('script')
<script>
   $(function() {

      $("form[name='eventform']").validate({
         rules: {
            title: {
               required: true,
            },
            file: {
               required: true,
            },
            date: {
               required: true,
            },
            detail: {
               required: true,
            },
         },
         submitHandler: function(form) {
            form.submit();
         }
      });
   });

   $("#file").change(function() {
      let reader = new FileReader();
      reader.onload = (e) => {
         $("#blah_event").attr("src", e.target.result);
      };
      reader.readAsDataURL(this.files[0]);
      $("#blah_event").css("display", "block");
   });
</script>
@endsection
