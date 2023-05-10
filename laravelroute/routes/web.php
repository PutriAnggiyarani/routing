<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//routing untuk mengakses halman route
Route::get('/routing',function(){
    return view('routing');
});

//routing untuk mengakses halaman basic routing
Route::get('/basic_routing', function() {
    return 'Hello World';
});

//routing untuk mengakses halaman view route
Route::view ('/view_route','/view_route');
Route::view ('/view_route','/view_route',['name' => 'Giaaa']);//variabel name disini adalah sebuah value 

//routing untuk mengakses halaman controller route
Route::get('/controller_route',[RouteController::class, 'index']);

//routing untuk redirect ke halaman routing
Route::redirect('/','routing');

//routing untuk mengakses required parameter
Route::get('/user/{id}', function($id) {
    return "User Id: ".$id;
});
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Post Id: ".$postId.", Comment Id: ".$commentId;
});

//routing untuk mengakses halaman optional parameter
Route::get('username/{name?}', function($name = null) {
    return 'Username: '.$name;
});

//routing untuk mengakses halaman with regular expression
Route::get('/title/{title}', function($title) {
    return "Title: ".$title;
})->where('title', '[A-Za-z]+');

//routing untuk mengakses halaman named route
Route::get('/profile/{profileId}', [RouteController::class, 'profile'])->name('profileRouteName');

//Routing untuk mengakses halaman route priority
Route::get('/route_priority/{rpId}', function($rpId) {
    return "This is Route One";
});
Route::get('/route_priority/user', function() {
    return "This is Route 1";
});
Route::get('/route_priority/user', function() {
    return "This is Route 2";
});

//routing untuk fallback route
Route::fallback(function() {
    return 'This is Fallback Route';
});

//route groups (prefixes and named prefixes)
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return "This is admin dashboard";
    })->name('dashboard');
    Route::get('/users', function() {
        return "This is user data on admin page";
    })->name('users');
    Route::get('/items', function() {
        return "This is item data on admin page";
    })->name('items');
});

//routing untuk mengakses halaman cloning bootstrap
Route::get('/bootstrap',function(){
    return view ('bootstrap');



});

