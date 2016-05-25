<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use \App\FetchProduct\Fetch;

Route::get('/', function () {
    return view('welcome');
});

Route::get('foo',function(){
    File::put(__DIR__.'/file.txt', 'Lorem ipsum');
});

Route::get('fetch',function(Request $request){

    $fetch = (new Fetch())->get($request->fetch);
    return $fetch;

});

//Route::get('posts','PostsController@index');
//Route::get('posts/{id}','PostsController@show');

Route::resource('posts','PostsController');
Route::get('logins', 'LoginController@index');
Route::get('users', 'UsersController@index');
Route::resource('photos', 'PhotosController');
Route::resource('sessions','SessionsController');

Route::get('/admin',['middleware'=>'auth',function()
{
    return "<h1>Admin Area</h1>";
}]);

Route::get("login",function(){
    return view('sessions.new');
});

Route::get('register',function(){
   return view('register');
});

Route::post('register',function(Request $request){
   \App\User::create($request->all());

    return Redirect::to('login')
        ->with('message', 'You may now sign in!');
});








