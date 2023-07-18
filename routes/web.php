<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PermissionAdmin;
use App\Http\Middleware\PermissionSuperAdmin;
 
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

      //User
      $prefix = 'user';
      Route::prefix($prefix)->group(function () {
        $controllerName = 'user';         
          $controller = ucfirst($controllerName).'Controller@';
          Route::get('/profile', $controller.'showProfile')->name($controllerName.'.profile');
          Route::post('/form/{id?}', $controller.'save')->name($controllerName.'.save');
          Route::get('/', $controller.'index')->name($controllerName.'.index');
          Route::get('/form', $controller.'showFormAdd')->name($controllerName.'.form_add');
          Route::get('/edit/{id}', $controller.'showFormEdit')->name($controllerName.'.form_edit');
          Route::get('/delete/{id}', $controller.'delete')->name($controllerName.'.delete');
          Route::post('/change-password', $controller.'changePassword')->name($controllerName.'.change-password');
          Route::get('/change-status-{status?}/{id?}', $controller.'changeStatus')->name($controllerName.'.status')
              ->where(['id' => '[0-9]+', 'status' => '[a-z]+']);
          Route::get('/change-role-{role_id?}/{id?}', $controller.'changeRole')->name($controllerName.'.role')
              ->where(['id' => '[0-9]+', 'role_id' => '[0-9]+']);
              
      });

    //Permission
    $prefix = 'permission';
    Route::prefix($prefix)->group(function(){
        $controllerName = 'permission';         
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')->name($controllerName.'.index');
        Route::get('/form', $controller.'showFormAdd')->name($controllerName.'.form_add');
        Route::get('/edit/{id}', $controller.'showFormEdit')->name($controllerName.'.form_edit');
        Route::post('/form/{id?}', $controller.'save')->name($controllerName.'.save');
        Route::get('/delete/{id}', $controller.'delete')->name($controllerName.'.delete');
    });

    //Role
    $prefix = 'role';
    Route::prefix($prefix)->group(function(){
        $controllerName = 'role';         
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')->name($controllerName.'.index');
        Route::get('/form', $controller.'showFormAdd')->name($controllerName.'.form_add');
        Route::get('/edit/{id}', $controller.'showFormEdit')->name($controllerName.'.form_edit');
        Route::post('/form/{id?}', $controller.'save')->name($controllerName.'.save');
        Route::get('/delete/{id}', $controller.'delete')->name($controllerName.'.delete');
    });

    $prefix = 'order';
    Route::prefix($prefix)->group(function(){
        $controllerName = 'order';         
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')->name($controllerName.'.index');
        Route::post('/form/{id?}', $controller.'save')->name($controllerName.'.save');
        Route::get('/delete/{id}', $controller.'delete')->name($controllerName.'.delete');
        Route::get('/change-status-{status?}/{id?}', $controller.'changeStatus')->name($controllerName.'.status')
              ->where(['id' => '[0-9]+', 'status' => '[a-z]+']);
        Route::get('/detail', $controller.'showOrderForUser')->name($controllerName.'.detail');
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
        Route::get('/tim-kiem', $controller.'search')->name($controllerName.'.search');
        Route::get('/chi-tiet/{product_name}/{product_id}.html', $controller.'showDetail')->name($controllerName.'.detail')
        ->where(['product_id' => '[0-9]+', 'product_name' => '[0-9a-zA-Z_-]+']);

    });   
    //Rating
    
    $prefix = 'danh-gia';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'rating';
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'createRating')->name($controllerName.'.rating');
    });   
    //Category

    $prefix = 'danh-muc';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'category';
        $controller = ucfirst($controllerName).'Controller@';
        // Route::get('', $controller.'showAll')->name($controllerName.'.index');
        Route::get('/chi-tiet/{category_name}-{category_id}.html', $controller.'showDetail')->name($controllerName.'.detail')
        ->where(['category_id' => '[0-9]+', 'category_name' => '[0-9a-zA-Z_-]+']);
    });   
    
    //Cart
    $prefix = 'gio-hang';
    Route::prefix($prefix)->group(function () {
        $controller = 'ShoppingCartController@';
        Route::get('/', $controller.'index')->name('cart.index');
        Route::get('/them-san-pham/{id}', $controller.'addToCart')->name('cart.add');
        Route::get('/xoa-san-pham/{id}', $controller.'removeItem')->name('cart.remove');
        Route::get('/xoa-toan-bo', $controller.'destroy')->name('cart.destroy');
        Route::get('/tang-so-luong/{id}', $controller.'upQuantity')->name('cart.up');
        Route::get('/giam-so-luong/{id}', $controller.'downQuantity')->name('cart.down');
    });

    //Order
    $prefix = 'dat-hang';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'order';
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')->name($controllerName.'.index');
    });


    //Blog
    $prefix = 'bai-viet';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'blog';
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')->name($controllerName.'.index');
        Route::get('/{blog_name}-{blog_id}.html', $controller.'showBlogDetail')->name($controllerName.'.detail')->where(['blog_id' => '[0-9]+', 'blog_name' => '[0-9a-zA-Z_-]+']);
    });

    //Brand
    $prefix = 'thuong-hieu';
    Route::prefix($prefix)->group(function () {
        $controllerName = 'brand';
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')->name($controllerName.'.index');
        Route::get('/{brand_name}-{brand_id}.html', $controller.'showBrandDetail')->name($controllerName.'.detail')->where(['brand_id' => '[0-9]+', 'brand_name' => '[0-9a-zA-Z_-]+']);
    });
});



// Route::get('/dang-nhap', [App\Http\Controllers\LoginController::class, 'index'])->name('login_form');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


