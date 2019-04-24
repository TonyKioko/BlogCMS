@extends('layouts.app')

@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Edit Tag</div>
    <br>

    <div class="panel-body">

    <form action="/tags/{{$tag->id}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        {{ method_field('PATCH') }}


        <div class="form-group">
            <label for="tag">Name</label>

            <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
        </div>

        

        <div class="form-group">
                
            <button class="btn btn-success">Update</button>

        </div>
            
        </form>

    </div>

</div>


@endsection