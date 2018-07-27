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
//     $threads=App\Thread::paginate(15);
//     return view('home.index',compact('threads'));
// });

// Route::get('thread/{thread}', 'ThreadController@show');
Route::get('user/{thread}', 'UserController@index');
Route::get('/profile/{user}', 'UserController@index')->name('user_profile')->middleware('auth');

Route::resource('/thread','ThreadController');
Route::get('/thread/{threads}','ThreadController@index')->name('opennotif');
Route::resource('/showprofile','UserController');
Route::resource('/user','UserController');

//route commnet
Route::resource('comment','CommentController',['only'=>['update','destroy']]);
Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');
Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');


Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});




Auth::routes();

Route::get('/many-to-many/{name?}', 'ThreadController@getManyToMany');

Route::get('/', 'ThreadController@index');

// Route::get('/home', function () {
//     return view('home.index');
// });

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/adminlte', function () {
    return view('adminlte');
});
Route::get('/profile', function () {
    return view('user.profile');
});
Route::get('/editprofile', function () {
    return view('user.editprofile');
});

Route::get('/insert', function () {
    return view('thread.input');
});
Route::get('/openthread', function () {
    return view('thread.open');
});
Route::get('/editthread', function () {
    return view('thread.edit');
});
// Route::get('/login', function () {
//     return view('user.login');
// });

Route::group(['prefix' => 'social-media', 'namespace' => 'Auth'], function(){
    Route::get('register/{provider}', 'SocialiteController@register');
    Route::get('registered/{provider}', 'SocialiteController@registered');
});





//route dengan menggunakan controller
//BlogController@index adalah BlogController = nama controller , dan @index = nama method
// Route::get('/blog', 'BlogController@index');
// Route::get('/blog/{id}', 'BlogController@show');


// //{id} disebuat dengan parameter
// Route::get('user/{id}/{name}', function ($id, $name) {
//     return 'ID :'.$id.'<br/>Name :' .$name;
// });


// //optional route
// Route::get('optional/{name?}', function ($name = null) {
//     return $name;
// });
// Route::get('optional/{name?}', function ($name = 'OnPHPID') {
//     return $name;
// });

// //belajar inheritance dan sistem templating laravel
// Route::get('/belajar', 'BelajarController@index');
// Route::get('/belajar/html', 'BelajarController@getPage');

// //belajar relasi one to one user ke profile
// Route::get('/one-to-one', 'BelajarController@getOne');
// //kebalikan relasi one to one profile ke user
// // Route::get('/profile/{nama}', 'BelajarController@hasOne');

// //relasi one to many dan many to one
// Route::get('/one-to-many', 'BelajarController@getOneMany');
// Route::get('/many-to-one', 'BelajarController@getManyOne');

// //relasi many to many
// Route::get('/many-to-many/{name?}', 'BelajarController@getManyToMany');

Auth::routes();

//url hanya bisa di akses oleh admin di kelompokan dalam satu group
// Route::group(['middleware'=>['role:super-admin','auth']],function(){
//     Route::resource('admin/permission', 'Admin\\PermissionController');
//     Route::resource('admin/role', 'Admin\\RoleController');
//     Route::resource('admin/user', 'Admin\\AdminUserController');
// });

// Route::group(['middleware'=>['auth']],function(){
//     Route::view('/admin','admin.dashboard');
//     Route::resource('admin/posts', 'Admin\\PostsController');

// });


Route::get('/home', 'HomeController@index')->name('home');


Route::resource('admin/permission', 'Admin\\PermissionController');

Route::resource('admin/role', 'Admin\\RoleController');
Route::resource('admin/user', 'Admin\\AdminUserController');