@extends('layouts.app')

@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Update Post</div>

    <div class="panel-body">

    <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="title">Title</label>

        <input type="text" name="title" class="form-control" value="{{$post->title}}">
        </div>

        <div class="form-group">
            <label for="category">Select Category</label>
            <select name="category_id" id="category" class="form-control">
                {{-- <option value="">Categories</option> --}}

                @foreach($categories as $category)

            <option value="{{$category->id}}"
                @if($post->category->id == $category->id)

                selected

                @endif
                
                >{{$category->name}}</option>

                @endforeach

            </select>

        </div>




        <div class="form-group">
                <label for="summernote">Content</label>
        <textarea name="content" id="summernote" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
    
            </div>

            <div class="form-group">
                    <label for="tags"></label>
                    <h5>Select Tags</h5>
                    @foreach($tags as $tag)
                   <div class="checkbox">
    
                   <label for=""><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                    
                    @foreach($post->tags as $t)

                        @if($tag->id == $t->id)

                            checked

                        @endif

                    @endforeach
                    
                    
                    >{{$tag->tag}}</label>
                   </div>
                   @endforeach
        
                </div>
    

            <div class="form-group">
                    <label for="featured">Featured</label>
        
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                        
                    <button class="btn btn-success">Publish</button>

                    </div>
            
        </form>

    </div>

</div>
@endsection





@section('scripts')




@endsection