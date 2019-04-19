@extends('layouts.app')

@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Create a new Category</div>
    <br>

    <div class="panel-body">

        <form action="/admin/categories" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>

            <input type="text" name="name" class="form-control">
        </div>

        

        <div class="form-group">
                
            <button class="btn btn-success">Create</button>

        </div>
            
        </form>

    </div>

</div>


@endsection