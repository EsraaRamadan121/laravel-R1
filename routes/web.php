<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Newscontroller;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get('/', function () {
    return view('welcome');
});
*/
/**Route::get('test', function () {
    return "welcom my route";
});

Route::get('user/{name}/{age?}', function ($name , $age=0) {
    if($age==0){
         return "welcom my name : ". $name ;
    }else{
            return "welcom my name : ". $name . " and age is: " . $age ;

    }
})->whereIn('name',['esraa','hager','manar']);

Route::prefix('myfamily')->group(function(){
    Route::get('/', function () {
    return 'myfamily';
});
Route::get('dad', function () {
    return 'baba';
});*/
/**Route::get('mom', function () {
    return 'mama';
});**
/**Route::get('borther', function () {
    return 'mahmoud';
});*/
/**Route::get('sister', function () {
    return 'mona';
});
});*/
/**Route::get('cv', function () {
    return view('cv');
});*/

/**Route::get('login', function () {
    return view('login');
});*/
/**Route::post('receive', function () {
    return 'data receive';
})->name('receive');*/

//Route::get('test1',[LoginController::class,'test1']);

/**Route::get('addCar', function () {
    return view('addCar');
});*/
Route::get('/', function () {
    return view('welcome');
});
Route::post('receive',[ExampleController::class, 'received'])->name('receive');

Route::get('test1',[ExampleController::class, 'test1']);

Route::get('showUpload',[ExampleController::class, 'showUpload']);

Route::post('upload',[ExampleController::class, 'upload'])->name('upload');



Route::get('trashed',[CarController::class, 'trashed']);
Route::get('restoreCar/{id}',[CarController::class, 'restore']);

Route::get('cars', [CarController::class, 'index']);

Route::get('deleteCar/{id}', [CarController::class, 'destroy']);

Route::get('carDetails/{id}', [CarController::class, 'show'])->name('carDetails');

Route::get('editCar/{id}', [CarController::class, 'edit']);
Route::put('updateCar/{id}', [CarController::class, 'update'])->name('updateCar');



       
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(
[
'prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');
Route::get('addCar',[CarController::class, 'create']);
});