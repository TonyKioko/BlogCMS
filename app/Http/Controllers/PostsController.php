<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

use Auth;

use Session;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }


    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();


        if($categories->count() == 0 || $tags->count() == 0){

            Session::flash('info','You must have categories or tags before attempting to creat a post');
            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'featured'=>'required|image',
            'category_id'=>'required',
            'tags'=>'required',




        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts',$featured_new_name);
        
        $post=Post::create([

            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'featured'=>'uploads/posts/'.$featured_new_name,
            'slug'=>str_slug($request->title),
            'user_id'=>Auth::id(),

        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','Post created successfully');

        return redirect('/admin/posts');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::all();

        $categories=Category::all();

        return view('admin.posts.edit')->with('post',$post)->with('categories',$categories)->with('tags',$tags);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);
        $post = Post::findOrFail($id);

        if($request->hasFile('featured')){

            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
    
            $featured->move('uploads/posts',$featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title=request('title');
        $post->content=request('content');
        $post->category_id=request('category_id');
        $post->save();

        $post->tags()->sync($request->tags);


        // $post->body=request('body');
        // $post->cover_image=$fileNameToStore;
        Session::flash('success','Post Updated successfully');


        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('success','Post deleted');

        return redirect('/admin/posts');
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        //  return $posts;
        return view('admin.posts.trashed',compact('posts'));

    }

    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        //  return $posts;

        $post->forceDelete();
        Session::flash('success','Post deleted');

        return redirect()->back();

    }


    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        //  return $posts;

        $post->restore();
        Session::flash('success','Post restored');

        return redirect('/admin/posts');

    }


}
