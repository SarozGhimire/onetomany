<?php

use App\Post;
use App\User;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function(){

	$user = User::findOrFail(1);

	// $post = new Post(['title'=>'My first post with Saroj', 'body'=>'I lOvE Laravel']);


	$user->posts()->save(new Post(['title'=>'My first post with Saroj2', 'body'=>'I lOvE Laravel22']));



});


Route::get('/read', function(){

	$user = User::findOrFail(1);

	foreach ($user->posts as $post) {
		
		echo $post->title . "<br>";
	}

});


Route::get('/update', function(){

	$user = User::findOrFail(1);

	$user->posts()->where('id','=',2)->update(['title'=>'I Love Laravel', 'body'=>'This is the update body part']);

});


Route::get('/delete', function(){

	$user = User::findOrFail(1);

	$user->posts()->whereId(1)->delete();

});