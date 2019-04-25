@extends('layouts.frontend')

@section('content')


<div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category : {{$category->name}}</h1>
        </div>
    </div>

    <div class="container">
            <div class="row medium-padding120">
                <main class="main">
                    
                    <div class="row">
                                <div class="case-item-wrap">
                                    @foreach($category->posts as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                            <img src="https://www.thestar.com.my/~/media/online/2018/09/21/11/01/bbstory2_tm_2.ashx/?w=620&h=413&crop=1&hash=69C3E6BE05EF1940604CB9D3C24DA0BADE7A3609" alt="our case">
                                            </div>
                                        <h6 class="case-item__title"><a href="{{route('post.single',['slug'=>$post->slug])}}">{{$post->title}}</a></h6>
                                        </div>
                                    </div>

                                    @endforeach
        
                                 
        
                                </div>
                    </div>
        
                    <!-- End Post Details -->
                    <br>
                    <br>
                    <br>
                    <!-- Sidebar-->
        
                   
        
                    <!-- End Sidebar-->
        
                </main>
            </div>
        </div>
  
@endsection