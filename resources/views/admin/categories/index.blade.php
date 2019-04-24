@extends('layouts.app')

@section('content')

<div class="container">

    @if($categories->count() > 0)
    <h4 class="text-center">Categories</h4>

<div class="col-md-2"></div>


<table class="table table-striped">
<thead>
        <tr>

    <th>

Category Name

    </th>
    <th>

Editing
        
        </th> <th>

Delete
        
            </th> 
        </tr>

</thead>
<tbody>
@foreach($categories as $category)

<tr>
        <td>

    <a href="">

        {{$category->name}}

    </a>
    </td>

    <td>
        {{-- <span class="glyphicon glyphicon-pencil"></span> --}}
        <a href="/categories/{{$category->id}}/edit" class="btn btn-xs btn-info">EDIT
        
        </a>
    </td>

    <td>
            <form action="{{route('categories.destroy',['id'=>$category->id])}}" method="POST">
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

<h4 class="text-center">No Categories</h4>

@endif

<div class="col-md-2"></div>


</div>

@endsection