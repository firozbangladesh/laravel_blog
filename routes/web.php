<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::get('/','PostController@Home');

Route::get('/AboutUs','HelloController@About')->name('about');
Route::get('/Newspaper','HelloController@News')->name('news');
Route::get('/BlogPost','HelloController@Blog')->name('blog');
Route::get('/ContactUs','HelloController@Contact')->name('contact');

//Category
Route::get('/AddCategory', 'HelloController@AddCategory')->name('add.category');
Route::post('/StoreCategory', 'HelloController@StoreCategory')->name('store.category');
Route::get('/AllCategory', 'HelloController@AllCategory')->name('all.category');
Route::get('view/category/{id}', 'HelloController@ViewCategory');
Route::get('delete/category/{id}', 'HelloController@DeleteCategory');
Route::get('edit/category/{id}', 'HelloController@EditCategory');
Route::post('update/category/{id}', 'HelloController@UpdateCategory');

//Posts
Route::get('write/post','PostController@WritePost')->name('writepost');
Route::post('store/post','PostController@StorePost')->name('store.post');
Route::get('all/post','PostController@AllPost')->name('all.post');
Route::get('view/post/{id}', 'PostController@ViewPost');
Route::get('edit/post/{id}', 'PostController@EditPost');
Route::post('update/post/{id}', 'PostController@UpdatePost');
Route::get('delete/post/{id}', 'PostController@DeletePost');