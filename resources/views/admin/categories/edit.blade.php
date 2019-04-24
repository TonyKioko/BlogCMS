@extends('layouts.app')

@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Create a new Category</div>
    <br>

    <div class="panel-body">

    <form action="/categories/{{$category->id}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        {{ method_field('PATCH') }}


        <div class="form-group">
            <label for="name">Name</label>

            <input type="text" name="name" value="{{$category->name}}" class="form-control">
        </div>

        

        <div class="form-group">
                
            <button class="btn btn-success">Update</button>

        </div>
            
        </form>

    </div>

</div>


@endsection