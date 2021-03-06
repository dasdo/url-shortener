<?php

use App\Urls;

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
})->name('home');

Route::get('/api-documentation', 'DocumentationController@index')->name('api-doc');

Route::get('/{code}', function ($code) {
    //Urls::redirect($code);
    $url = Urls::where('code', $code)->first();
    if (!$url) {
        return redirect()->to('/?url=none');
    }
    $url->hits++;
    $url->save();
    return redirect()->away($url->url);
});

Auth::routes();
