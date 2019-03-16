<?php

use Illuminate\Http\Request;
use App\Urls;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('urls', 'UrlsController@index');
Route::get('urls/best', 'UrlsController@best');
Route::get('urls/{id}', 'UrlsController@get');
Route::post('urls', 'UrlsController@store');

Route::delete('urls/{id}', function ($id) {
    Urls::find($id)->delete();
    return 204;
});
