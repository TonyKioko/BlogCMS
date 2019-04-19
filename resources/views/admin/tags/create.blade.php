@extends('layouts.app')

@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Create a new Tag</div>
    <br>

    <div class="panel-body">

        <form action="/admin/tags" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group">
            <label for="tag">Name</label>

            <input type="text" name="tag" class="form-control">
        </div>

        

        <div class="form-group">
                
            <button class="btn btn-success">Create</button>

        </div>
            
        </form>

    </div>

</div>


@endsection