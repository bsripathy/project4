@extends('layouts.app') 
 
 
 @section('content')
 <div class='view_parent_image2'>
 <div class="container">
     <div class="col-lg-4 col-lg-offset-4">
         <div class="form-group">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <input type="text" id="search-input" class="form-control" placeholder="search" onkeydown="down()" onkeyup="up()">
         </div>

         {{--<div class="col-lg-12" id="search-results">--}}

         {{--</div>--}}

     </div>
     <div class="row">
         <div class="col-md-10 col-md-offset-1"  id="search-results">

             <div class="panel panel-default">
                <div class="panel-heading">Profiles</div>
 				<div class="panel-body">
 				<a href="/admin/newuser">Add User</a>
 				</div>

 				@foreach (App\Course::all() as $user)
 					<div class="panel-body">
                     {{$user->name}}, {{$user->email}}
 					<form action ="{{route('adminview', ['idedit' => $user->id])}}">
 					{{ csrf_field() }}
 					<button  method = "POST"   class="btn btn-primary pull-right"  name = "idedit{{$user->id}}" value = "{{$user->id}}"> View Course Info </button> </form>


                 </div>
 				@endforeach
             </div>
         </div>
     </div>
 </div>

</div>
 @endsection 


