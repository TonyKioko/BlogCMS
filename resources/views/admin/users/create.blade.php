@extends('layouts.app')

@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Create a new user</div>
    <br>

    <div class="panel-body">

        <form action="/users" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>

            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
                <label for="email">Email</label>
    
                <input type="email" name="email" class="form-control">
            </div>

        

        <div class="form-group">
                
            <button class="btn btn-success">Create User</button>

        </div>
            
        </form>

    </div>

</div>


@endsection