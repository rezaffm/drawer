<?php

use App\Category;
use Illuminate\Support\Facades\Route;

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

/*Route::get('{locale}', function ($locale) {
    app()->setLocale($locale);
    dd(Category::find(1)->title);
});*/

$segment = request()->segment(1);
app()->setLocale($segment);

Route::prefix('en')->group(function() {

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('posts.translations', 'PostTranslationController')->parameters([
       'translations' => 'locale'
    ]);
});
