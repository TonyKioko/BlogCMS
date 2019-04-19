@extends('layouts.app')

@section('content')


<div class="row">

            <div class="col-md-3">
                <div class="card card-info">
                    <div class="card-header text-center bg-secondary">
                         POSTED
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $posts_count }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-danger">
                    <div class="card-header text-center bg-danger">
                        TRASHED POSTS
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $trashed_count }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card ">
                    <div class="card-header text-center bg-success">
                        USERS 
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $users_count }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card ">
                    <div class="card-header text-center bg-info">
                        CATEGORIES
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $categories_count }}</h1>
                    </div>
                </div>
            </div>

</div>
    
@endsection
