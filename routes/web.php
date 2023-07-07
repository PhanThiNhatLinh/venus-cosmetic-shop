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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/no-permission', function () {
    return view('no_permission');
});
// Route::get('/template-cream', function () {
//     return view('template1');
// });

// Route::get('/slider', function () {
//     return view('admin.pages.slider.index');
// });

/* -------------------------------- ADMIN ---------------------------------- */
Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    //SLIDER
    $prefix = 'slider';
    Route::middleware(['auth', 'second'])->group(function () {
        
    });
    // Route::prefix($prefix)->group(function () {
    Route::group(['prefix' => $prefix, 'middleware' => ['permission.admin','permission.super.admin']],function () {  
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
    Route::prefix($prefix)->middleware(['permission.admin','permission.super.admin'])->group(function () {
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
     Route::prefix($prefix)->middleware('permission.admin')->middleware('permission.super.admin')->group(function () {
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
     Route::prefix($prefix)->middleware(['permission.admin','permission.super.admin'])->group(function () {
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
     Route::prefix($prefix)->middleware(['permission.admin','permission.super.admin'])->group(function () {
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
      Route::prefix($prefix)->middleware(['permission.admin','permission.super.admin'])->group(function () {
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

      //User
      $prefix = 'user';
      Route::prefix($prefix)->middleware('permission.super.admin')->group(function () {
          $controllerName = 'user';
          $controller = ucfirst($controllerName).'Controller@';
          Route::get('/', $controller.'index')->name($controllerName.'.index');
          Route::get('/profile', $controller.'showProfile')->name($controllerName.'.profile');
          Route::get('/form', $controller.'showFormAdd')->name($controllerName.'.form_add');
          Route::get('/edit/{id}', $controller.'showFormEdit')->name($controllerName.'.form_edit');
          Route::post('/form/{id?}', $controller.'save')->name($controllerName.'.save');
          Route::get('/delete/{id}', $controller.'delete')->name($controllerName.'.delete');
          Route::post('/change-password', $controller.'changePassword')->name($controllerName.'.change-password');
          Route::get('/change-status-{status?}/{id?}', $controller.'changeStatus')->name($controllerName.'.status')
              ->where(['id' => '[0-9]+', 'status' => '[a-z]+']);
          Route::get('/change-level-{level?}/{id?}', $controller.'changeLevel')->name($controllerName.'.level')
              ->where(['id' => '[0-9]+', 'level' => '[a-z]+']);
              
      });
});

/* -------------------------------- FRONTEND ---------------------------------- */
Route::prefix('')->namespace('Frontend')->group(function () {
    $controllerName = 'home';
    $controller = ucfirst($controllerName).'Controller@';
    Route::get('/trang-chu', $controller.'index')->name($controllerName.'.index');

    //Product
    
    $prefix = 'san-pham';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'product';
        $controller = ucfirst($controllerName).'Controller@';
        // Route::get('', $controller.'showAll')->name($controllerName.'.index');
        Route::get('/chi-tiet/{id}.html', $controller.'showDetail')->name($controllerName.'.detail')
                ->where(['id' => '[0-9]+', 'display' => '[a-z]+']);
    });    

    $prefix = 'danh-muc';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'category';
        $controller = ucfirst($controllerName).'Controller@';
        // Route::get('', $controller.'showAll')->name($controllerName.'.index');
        Route::get('/chi-tiet/{id}.html', $controller.'showDetail')->name($controllerName.'.detail')
                ->where(['id' => '[0-9]+', 'display' => '[a-z]+']);
    });    
});



// Route::get('/dang-nhap', [App\Http\Controllers\LoginController::class, 'index'])->name('login_form');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


