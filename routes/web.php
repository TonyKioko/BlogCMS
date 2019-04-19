<?php

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/post/{slug}', 'FrontEndController@singlePost')->name('post.single');

Route::get('/category/{id}', 'FrontEndController@category')->name('category.single');


Route::get('/tag/{id}', 'FrontEndController@tag')->name('tag.single');


Route::post('/subscribe', function(){
    $email = request('email');

    Newsletter::subscribe($email);

    Session::flash('subscribed', 'Successfully subscribed.');
    return redirect()->back();
});


Route::get('/results', function () {
    $posts = \App\Post::where('title','like', '%' . request('query').'%')->get();
    return view('results')->with('posts', $posts)
                              ->with('title', 'Search results : ' . request('query'))
                              ->with('settings', \App\Setting::first())
                              ->with('categories', \App\Category::take(5)->get())
                              ->with('query', request('query'));

});

//  {


    // return App\Profile::findOrFail(1)->user;
    // return App\User::findOrFail(1)->profile;

// });

Route::get('/test', function () {
    return App\Profile::findOrFail(1)->user;
    // return App\User::findOrFail(1)->profile;

});


Route::get('/admin/posts/trashed', 'PostsController@trashed');
Route::get('/admin/posts/kill/{id}', 'PostsController@kill')->name('post.kill');
Route::get('/admin/posts/restore/{id}', 'PostsController@restore')->name('post.restore');

Route::get('/users/admin/{id}', 'UsersController@admin')->name('user.make_admin')->middleware('admin');


Route::get('/admin/users/not_admin/{id}', 'UsersController@not_admin')->name('user.not_admin');


// Route::get('/admin/settings', 'SettingsController@index')->name('admin.settings')->middleware('admin');

// Route::post('/admin/settings/update', 'SettingsController@update')->name('admin.settings.update')->middleware('admin');





Route::group(['prefix'=>'admin'],function(){

    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::resource('users', 'UsersController');
    Route::resource('profiles', 'ProfilesController');
    Route::resource('settings', 'SettingsController');






    
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
