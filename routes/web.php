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
// Route::get('/template-cream', function () {
//     return view('template1');
// });

// Route::get('/slider', function () {
//     return view('admin.pages.slider.index');
// });

//ADMIN
Route::prefix('admin')->group(function () {
    //SLIDER
    $prefix = 'slider';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'slider';
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')->name($controllerName.'.index');
        Route::get('/form', $controller.'showFormAdd')->name($controllerName.'.form_add');
        Route::get('/edit/{id}', $controller.'showFormEdit')->name($controllerName.'.form_edit');
        Route::post('/form/{id?}', $controller.'save')->name($controllerName.'.save');
        Route::get('/delete/{id}', $controller.'delete')->name($controllerName.'.delete');
        Route::get('/change-status-{status?}/{id?}', $controller.'changeStatus')->name($controllerName.'.status')
            ->where(['id' => '[0-9]+', 'status' => '[a-z]+']);
        Route::get('/change-display-{display?}/{id?}', $controller.'changeDisplay')->name($controllerName.'.display')
            ->where(['id' => '[0-9]+', 'display' => '[a-z]+']);
    });
});