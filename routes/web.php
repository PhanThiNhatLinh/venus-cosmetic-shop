<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/trang-chu', function () {
    return view('frontend.pages.home.index');
});
Route::get('/template-cream', function () {
    return view('template1');
});

Route::get('/slider', function () {
    return view('admin.pages.slider.index');
});

// Route::prefix('admin')->group(function () {
//     Route::get('/user/profile',[UserProfileController::class, 'show'])->name('profile');
//     Route::prefix('slider')->group(function () {
//         Route::get('/', 'UserController@index')->name('user');
//     });
// });