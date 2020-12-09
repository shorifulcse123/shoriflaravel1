<?php

use Illuminate\Support\Facades\Route;




//Route::get('home', function () {
    //return view('index');
//});

Route::get('/','App\Http\Controllers\helloController@index')->name('index');

Route::get('contact/page','App\Http\Controllers\helloController@contact')->name('contact');

/*categorie post route....... */



Route::get('add/post/page','App\Http\Controllers\helloController@add')->name('add.categories');


/*categorie insert route....... */
Route::post('dataInsert/post/page','App\Http\Controllers\categorieController@insert')->name('store.categorie');

/*categorie view route....... */
Route::get('view/post/page','App\Http\Controllers\categorieController@view')->name('view.categories');

/*categorie single view route....... */

Route::get('single/post{id}','App\Http\Controllers\categorieController@viewSingel');


/*categorie single edite route....... */

Route::get('edit/post{id}','App\Http\Controllers\categorieController@editSingel');

/*categorie single edit route....... */
Route::post('update/post{id}','App\Http\Controllers\categorieController@UpdatePost');

/*categorie single Delete route....... */
Route::get('Delete/post{id}','App\Http\Controllers\categorieController@DeletePost');

/*categorie posts crud route....... */
Route::post('dataInsert/posts/page','App\Http\Controllers\PostController@insertPosts')->name('store.post.posts');
Route::get('write/post/page','App\Http\Controllers\PostController@write')->name('write.post');
Route::get('allview/post/page','App\Http\Controllers\PostController@allview')->name('allview.categories');

Route::get('view/single/post{id}','App\Http\Controllers\categorieController@ViewSinglePost');
Route::get('view/edit/post{id}','App\Http\Controllers\PostController@EditeImagePost');
Route::post('update/Image/post/{id}','App\Http\Controllers\PostController@updateImagePost');

Route::get('Delete/image/post{id}','App\Http\Controllers\PostController@deleteImagePost');







