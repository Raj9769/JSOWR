@extends('layouts.admin')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-11 mt-4">
         <div class="card border border-primary">
            <div class="card-header bg-primary text-white">
               <h5 class="mt-2">ADD Contacts</h5>
            </div>
            <div class="card-body">
               @if(session()->has('message'))
               <div class="alert text-white" style="background-color:#7EDD72">
                  {{ session()->get('message') }}
               </div>
               @endif               
               {!! Form::open(['method'=>'POST', 'action'=> 'AdminContactController@store','files'=>true]) !!}
               @csrf  
               <div class="row justify-content-center">
                  <div class="form-group col-md-8">
                     {!! Form::label('username', 'Username:') !!}
                     {!! Form::text('username', null, ['class'=>'form-control border border-dark mb-2','required' => 'required'])!!}
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="form-group col-md-8">
                     {!! Form::label('email', 'Email:') !!}
                     {!! Form::text('email', null, ['class'=>'form-control border border-dark mb-2','required' => 'required'])!!}
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="form-group col-md-8">
                     {!! Form::label('phone', 'Mobile no:') !!}
                     {!! Form::text('phone', null, ['class'=>'form-control border border-dark mb-2','required' => 'required'])!!}
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="form-group col-md-8">
                     {!! Form::label('detail', 'Details:') !!}
                     <textarea id="mytextarea" name="detail"></textarea>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="form-group col-md-2">
                     {!! Form::submit('Add', ['class'=>'btn btn-success text-white mt-3']) !!}
                  </div>
               </div>
               {!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection