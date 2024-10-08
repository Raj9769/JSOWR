@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Musics
      </h1>
      <ol class="breadcrumb">
         <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Musics</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box">
               <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
               </div>
               <div class="row">
                  <div class="col-md-9">
                     <a href="{{route('admin.music.create')}}" class="bg-primary text-white text-decoration-none" style="padding:12px 12px;margin-left:20px"><i class="fa fa-plus editable" style="font-size:15px;">&nbsp;ADD</i></a>
                     <button style="padding:10px 20px;margin-left:10px;" class="btn btn-danger text-white delete_all" data-url="{{ url('mymusicsDeleteAll') }}">Delete</button>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="overflow-x:auto;margin-top:15px">
                  <table id="musictable" class="table table-bordered table-striped">
                     <thead class="bg-primary">
                        <tr>
                           <th width="50px"><input type="checkbox" id="master"></th>
                           <th>Action</th>
                           <th>Singer Name</th>
                           <th>Music Name</th>
                           <th>Music</th>
                           <th>Show</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($musics as $music)
                        <tr id="tr_{{$music->id}}">
                           <td><input type="checkbox" class="sub_chk" data-id="{{$music->id}}"></td>
                           <td>
                              <a href="{{route('admin.music.edit', $music->id)}}"><i class="fa fa-edit" style="color:white;font-size:15px;background-color:#0275d8;padding:8px;border-radius:200px;"></i></a>
                              <a href="{{route('admin.music.destroy', $music->id)}}" onclick="return confirm('Sure ! You want to delete ?');"><i class="fa fa-trash" style="color:white;font-size:15px;background-color:red;padding:8px;border-radius:200px;"></i></a>
                           </td>
                           <td>{{$music->s_name}}</td>
                           <td>{{$music->m_name}}</td>
                           <td>
                           <audio width="150" height="50" controls>
                            <source src="{{$music->file}}" type="audio/ogg">
                            <source src="{{$music->file}}" type="audio/mpeg">
                        </audio>
                           </td>
                           <td>
                              @if($music->is_show == 1)
                              <a href="/admin/music/active/{{$music->id}}" class="btn btn-success">Active</a>
                              @else
                              <a href="/admin/music/active/{{$music->id}}" class="btn btn-danger">De-active</a>
                              @endif
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <div class="row mt-4">
                     <div class="col-sm-12" style="display:flex;justify-content:center;">
                        {{$musics->links('pagination::bootstrap-4')}}
                     </div>
                  </div>
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

@section('script')
<script>
        $(function() {

         $("form[name='videoform']").validate({
                rules: {
                  file: {
                     required: true,
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
      });

</script>
@endsection
