


<div class="panel panel-default">
    <div class="panel-heading">Profiles</div>
    <div class="panel-body">
        <a href="/admin/newuser">Add User</a>
    </div>


    @foreach($searchCourses as $c)
        <div class="panel-body">
            {{$c->name}}, {{$c->email}}
            <form action ="{{route('adminview', ['idedit' => $c->id])}}">
            {{ csrf_field() }}
            <button  formmethod="post"   class="btn btn-primary pull-right"  name = "idedit{{$c->id}}" value = "{{$c->id}}"> View Course Info </button> </form>
    @endforeach
        </div>
</div>
