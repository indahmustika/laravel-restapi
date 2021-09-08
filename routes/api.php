<?php
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api')->get('/user', function(Request $request){
	return $request->user();
});

Route::get('/article', 'ArticleController@index');
Route::post('article', 'ArticleController@create');
Route::put('/article/{id}', 'ArticleController@update');
Route::delete('/article/{id}', 'ArticleController@delete');