@extends('layouts.app')

@section('content')

<div class="container">

    @if($tags->count() > 0)
    <h4 class="text-center">Tags</h4>

<div class="col-md-2"></div>


<table class="table table-striped">
<thead>
        <tr>

    <th>

Tag Name

    </th>
    <th>

Edit
        
        </th> <th>

Delete
        
            </th> 
        </tr>

</thead>
<tbody>
@foreach($tags as $tag)

<tr>
        <td>

    <a href="">

        {{$tag->tag}}

    </a>
    </td>

    <td>
        {{-- <span class="glyphicon glyphicon-pencil"></span> --}}
        <a href="/tags/{{$tag->id}}/edit" class="btn btn-xs btn-info">EDIT
        
        </a>
    </td>

    <td>
            <form action="{{route('tags.destroy',['id'=>$tag->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete</button>

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





</table>
@else

<h4 class="text-center">No Tags</h4>

@endif

<div class="col-md-2"></div>


</div>

@endsection