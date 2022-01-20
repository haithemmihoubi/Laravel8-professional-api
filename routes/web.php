<?php

use App\Http\Controllers\PostController;
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

Route::get('/', static function () {
    return view('posts');
})->name('home');
Route::get('post', static function () {
    return view('post');
});
Route::get('users/{id}', static function ($id) {
    return $id;
})->where("id", "[0-9A-Za-z]+");
// alphabetic parameter first name and lastname
Route::get("user/{name}/{lastname}", static function ($name, $lastname) {
    return "hello  " . $name . $lastname;
})->whereAlpha(['name', 'lastname']);


/*Route::get('user/{id}/{name}', function ($id, $name) {
    return 'id:' . $id . ' ' . 'name : ' . $name;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-Z]+']);*/


Route::get('/user/{id}/{name}', static function ($id, $name) {
    //return "hello  " . $name . $id;
    return redirect()->route('home');

})->whereNumber('id')
    ->whereAlpha('name')
    ->name("useralphanumeric");


// the name must be alphanumeric
Route::get('/user/{name}', static function ($name) {
    return "this" . $name;
})->whereAlphaNumeric('name');

Route::get('/user/{id}', static function ($id) {
    return 'hello ' . $id;
})->whereUuid('id');
/* MiDDLEWARE ROUTE*/
// route protected with  a middleware group composed of  two middlewares
Route::middleware(['auth', 'isadmin'])->group(
    function () {
        //route 1
        Route::get('/user/{id}', static function ($id) {
            return 'hello ' . $id;
        })->whereUuid('id');
        // route 2
        Route::get('/user/{name}', static function ($name) {
            return "this" . $name;
        })->whereAlphaNumeric('name');

    }
);
/*TODO Route prefixes */
Route::prefix("v1")->group(function () {
    //route 1
    Route::get('/user/{id}', static function ($id) {
        return 'hello ' . $id;
    })->whereUuid('id');
    // route 2
    Route::get('/user/{name}', static function ($name) {
        return "this" . $name;
    })->whereAlphaNumeric('name');

});
// TODO Route definition with  controller */
Route::get("/post",[PostController::class,'index']) ;
