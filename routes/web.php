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

// Route::get('/template-cream', function () {
//     return view('template1');
// });

// Route::get('/slider', function () {
//     return view('admin.pages.slider.index');
// });

/* -------------------------------- ADMIN ---------------------------------- */
Route::prefix('admin')->namespace('Admin')->group(function () {
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

    //BLOG
    $prefix = 'blog';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'blog';
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

     //Product
     $prefix = 'product';
     Route::prefix($prefix)->group(function () {
         $controllerName = 'product';
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
     //BRAND
     $prefix = 'brand';
     Route::prefix($prefix)->group(function () {
         $controllerName = 'brand';
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

     //Category
     $prefix = 'category';
     Route::prefix($prefix)->group(function () {
         $controllerName = 'category';
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

      //Country
      $prefix = 'country';
      Route::prefix($prefix)->group(function () {
          $controllerName = 'country';
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

/* -------------------------------- FRONTEND ---------------------------------- */
Route::prefix('')->namespace('Frontend')->group(function () {
    $controllerName = 'home';
    $controller = ucfirst($controllerName).'Controller@';
    Route::get('/trang-chu', $controller.'index')->name($controllerName.'.index');
});