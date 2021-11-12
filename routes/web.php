<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;



Route::get('/' , 'HomeController@index')->name('index');

Route::get('/blog', 'PageController@index')->name('blog');
Route::get('/timeline', 'PageController@timeline')->name('timeline');
Route::post('/mark-as-read', 'usersController@markNotification')->name('markNotification');
Route::post('/likes', 'usersController@likes')->name('likes');

Route::get('contact', 'PageController@contact');

Route::post('contact', 'PageController@Contactstore');
Route::get('about', 'PageController@about');
Route::get('clear-name', 'Pagecontroller@clearname');

Route::get('system-closed', function(){

  return "sorry we work only on monday......";

});


Route::put('contact', function(){

      echo "put done";

});

Route::get('users/{id?}/mail/{email?}/name/{name?}', function($id = null,$email = null, $name = null){
echo "this is the id ". $id. "and email is ". $email ."and name is : ".$name;

});

Auth::routes();

Route::resource('articles', 'ArticleController');

Route::any('/{name}', 'usersController@index')->name('userProfile');

Route::any('{username}/account', 'usersController@edit')->name('AccountUpdate');

Route::patch('{username}/account', 'usersController@update')->name('DataUpdate');

Route::post('{username}/account', 'usersController@updateProfileImage')->name('AvatarUpdate');

Route::post('comment/{article}' , 'CommentController@store')->name('comment');

Route::get('categories/web' , 'PageController@web')->name('web');
Route::get('categories/design', 'PageController@design')-> name('design');
Route::post('/follow/{username}' , 'usersController@followunfollow')->name('FollowUnfollow');
