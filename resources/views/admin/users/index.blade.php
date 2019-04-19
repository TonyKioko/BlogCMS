@extends('layouts.app')

@section('content')

<div class="container">
    Users

<div class="col-md-2"></div>

@if($users->count() > 0)

<table class="table table-striped">
<thead>
        <tr>

    <th>

Id

    </th>
    <th>

            Image
            
                </th>
    <th>

Name
        
        </th> <th>

Permissions        
            </th> 

            <th>

                    Delete
                            
                                </th> 
        </tr>

</thead>
<tbody>
@foreach($users as $user)

<tr style="line-height: 300%;">

    <td>
        {{$user->id}}
    </td>
        <td>

    <a href="">
    <img src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" class="rounded-circle" width="50px" height="50px">

    </a>
    </td>

    <td>

            <a href="">
                {{$user->name}}
        
            </a>
            </td>

    <td>
        
        @if($user->admin)

        <a href="{{route('user.not_admin',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Remove Admin</a>
        @else

    <a href="{{route('user.make_admin',['id'=>$user->id])}}" class="btn btn-xs btn-success">Make Admin</a>
        
        @endif
    </td>

    <td>
        @if(Auth::id() !== $user->id)


        <form action="{{route('users.destroy',['id'=>$user->id])}}" method="POST">
                @method('DELETE')
                @csrf
            <button class="btn btn-danger" type="submit">Delete</button>

               </form> 

        @else


        @endif



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

<h4 class="text-center">No Users</h4>

@endif






<div class="col-md-2"></div>


</div>

@endsection