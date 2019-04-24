@extends('layouts.app')

@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Edit Your Profile</div>
    <br>

    <div class="panel-body">

    <form action="/profiles/{{$user->id}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="name">Username</label>

        <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group">
                <label for="email">Email</label>
    
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>

            <div class="form-group">
                    <label for="about">About You</label>
            <textarea name="about" id="about" cols="60" rows="5" class="form-control">{{$user->profile->about}}</textarea>
                </div>


            <div class="form-group">
                    <label for="password">New Password</label>
        
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                        <label for="avatar">New Avatar</label>
            
                        <input type="file" name="avatar" class="form-control">
                    </div>

                    <div class="form-group">
                            <label for="facebook">Facebook Profile</label>
                
                            <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
                        </div>


                        <div class="form-group">
                                <label for="youtube">Youtube Profile</label>
                    
                        <input type="text" name="youtube" class="form-control" value="{{$user->profile->youtube}}">
                            </div>
        

        <div class="form-group">
                
            <button class="btn btn-success">Update Profile</button>

        </div>
            
        </form>

    </div>

</div>


@endsection