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
		
                <div class="panel-heading">Filter</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div id="search-input">Fetch Results By State:</div> 
<select name = "tagvalue" class="form-control" placeholder="search" onChange = "tryjava()" > 
<option value="" disabled selected>Select your option</option>    
<option value="Texas">Texas</option>
    <option value="Florida">Florida</option>
    <option value="Arizona">Arizona</option>
  </select>

<br>
<div id="table-container">
<?php
  $conn =pg_pconnect("host=localhost port=5432 dbname=project user=postgres password=postgres");
 $dbconn = pg_connect("host=localhost port=5432 dbname=project user=postgres password=postgres") or die("Could not connect");
  $stat = pg_connection_status($conn);
  if ($stat === PGSQL_CONNECTION_OK) {
      echo 'Connection status ok';
  } else {
      echo 'Connection status bad';
  }   
//$query="SELECT * FROM Course";
$output=pg_query($conn,"SELECT * FROM courses");
echo '<table border="1"';
    echo '<tr>';
      echo '<th>Name</th>';
     echo '<th>Address</th>';
      echo '<th>City</th>';
      echo '<th>State</th>';
      echo '<th>Zip</th>';
    echo '</tr>';
while($fetch = pg_fetch_assoc($output))
{
    
      echo '<tr>';
      echo '<td>'.$fetch['name'].'</td>';
      echo '<td>'.$fetch['address'].'</td>';
      echo '<td>'.$fetch['city'].'</td>';
      echo '<td>'.$fetch['state'].'</td>';
      echo '<td>'.$fetch['zip'].'</td>';
      echo '</tr>';
    
  };
echo '</table>';
?>
</div>
                  </div>
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

