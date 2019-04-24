@extends('layouts.app')

@section('content')

<div class="container">
        @if($posts->count() > 0)


    <h2>Trashed Posts</h2>

<div class="col-md-2"></div>

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

                    Restore
                            
                                </th> 

                                <th>

Delete                                                
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
            <form action="{{route('post.restore',['id'=>$post->id])}}" method="GET">
                    @csrf
                <button class="btn btn-warning" type="submit">Restore</button>

                   </form>
            
    </td>

    <td>
            <form action="{{route('post.kill',['id'=>$post->id])}}" method="GET">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">DELETE</button>

                   </form>
            
    </td>




</tr>
@endforeach


</tbody>
</table>





</table>

<div class="col-md-2"></div>

@else

<h4 class="text-center">No trashed Posts</h4>

@endif


</div>

@endsection