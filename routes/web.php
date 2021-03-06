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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes', 'RecipeController@index')->name('recipe.list');
Route::get('/recipes/{recipe}', 'RecipeController@show')->name('recipe.show');

Route::post('/webhooks/inbound-message', 'WebhooksController@inboundMessage')->name('webhooks.inbound');
Route::post('/webhooks/message-status', 'WebhooksController@messageStatus')->name('webhooks.status');
