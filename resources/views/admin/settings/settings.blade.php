@extends('layouts.app')

@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Edit Site Settings</div>
    <br>

    <div class="panel-body">

    <form action="/admin/settings/{{$setting->id}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="site_name">Site Name</label>

        <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
        </div>

        <div class="form-group">
                <label for="email">Email</label>
    
                <input type="email" name="contact_email" class="form-control" value="{{$setting->contact_email}}">
            </div>


            <div class="form-group">
                    <label for="email">Phone</label>
        
                    <input type="text" name="contact_number" class="form-control" value="{{$setting->contact_number}}">
                </div>

                <div class="form-group">
                        <label for="address">Address</label>
            
                        <input type="text" name="address" class="form-control" value="{{$setting->address}}">
                    </div>


            

        <div class="form-group">
                
            <button class="btn btn-success">Update Settings</button>

        </div>
            
        </form>

    </div>

</div>


@endsection