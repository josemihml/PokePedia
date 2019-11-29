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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/','IndexController@index');
Auth::routes();


Route::resource('pokemon', 'PokemonController');


Route::resource('Ability', 'AbilityController');


Route::resource('post', 'PostController');


Route::resource('Comment', 'CommentController');


Route::resource('AbilityPokemon', 'AbilityPokemonController');


Route::get('subirDragDrop/', 'FileUploadDragDropController@subir');

Route::post('uploadDragDrop/', 'FileUploadDragDropController@upload');

Route::get('verDragDrop/{archivo}', 'FileUploadDragDropController@ver');