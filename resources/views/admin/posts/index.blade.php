@extends('layouts.app')

@section('content')

<div class="container">

<div class="col-md-2"></div>

@if($posts->count() > 0)

<table class="table table-striped">
<thead>
        <tr>

    <th>

Image

    </th>
    <th>

Title
        
        </th> <th>

Edit
        
            </th> 

            <th>

                    Trash
                            
                                </th> 
        </tr>

</thead>
<tbody>
@foreach($posts as $post)

<tr style="line-height: 300%;">
        <td>

    <a href="">
    <img src="{{$post->featured}}" alt="{{$post->title}}" class="rounded-circle" width="50px" height="50px">

    </a>
    </td>

    <td>

            <a href="">
                {{$post->title}}
        
            </a>
            </td>

    <td>
        {{-- <span class="glyphicon glyphicon-pencil"></span> --}}
        <a href="/posts/{{$post->id}}/edit" class="btn btn-xs btn-info">EDIT
        
        </a>
    </td>

    <td>
            <form action="{{route('posts.destroy',['id'=>$post->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Trash</button>

                   </form>
            {{-- <form action="/admin/categories/{{ $category->id }}" method="post">
                {{ method_field('delete') }}
                <button class="btn btn-default" type="submit">Delete</button>
            </form>
            <a href="{{route('categories.destroy',['id'=>$category->id])}}" class="btn btn-danger btn-xs">DELETE</a>   --}}

    </td>




</tr>
@endforeach


</tbody>
</table>

@else

<h4 class="text-center">No Posts</h4>

@endif






<div class="col-md-2"></div>


</div>

@endsection