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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('superadmin', function() {
    return view('superadmin');
})->name('superadmin')->middleware('superadmin');

Route::get('admin', function() {
    return view('admin');
})->name('admin')->middleware('admin');

Route::get('cashier', function() {
    return view('cashier');
})->name('admin')->middleware('cashier');

Route::get('kitchen', function() {
    return view('kitchen');
})->name('kitchen')->middleware('kitchen');


// ------------------------------------



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
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


// View Dashboard
Route::get('/', 'App\Http\Controllers\DashboardController@index');


//Menu Controllers
Route::prefix('admin')->group(function() {
    Route::get('/',              [MenuController::class, 'index'])->name('menu.index');
    Route::get('create',         [MenuController::class, 'create'])->name('menu.create');
    Route::post('store',         [MenuController::class, 'store'])->name('menu.store');
    Route::get('edit/{menu}',    [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('update/{menu}',  [MenuController::class, 'update'])->name('menu.update');
    Route::get('destroy/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
    
    // Category Controller - Menu
    Route::prefix('category')->group(function() {
        Route::get('/',                  [CategoryController::class, 'index'])->name('category.index');
        Route::get('create',             [CategoryController::class, 'create'])->name('category.create');
        Route::get('edit/{category}',    [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('update/{category}',  [CategoryController::class, 'update'])->name('category.update');
        Route::post('store',             [CategoryController::class, 'store'])->name('category.store');
        Route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    // payments route
    Route::prefix('reports')->group(function() {
        Route::get('orders', [ReportController::class, 'ordersReport'])->name('reports.orders');
        Route::get('sales', [ReportController::class, 'salesReport'])->name('reports.sales');
    });

    // Route Stocks Controller
    Route::prefix('stock')->group(function () {
        Route::get('/',               [StockController::class, 'index'])->name('stocks.index');
        Route::get('create',          [StockController::class, 'create'])->name('stocks.create');
        Route::post('store',          [StockController::class, 'store'])->name('stocks.store');
        Route::get('edit/{stock}',    [StockController::class, 'edit'])->name('stocks.edit');
        Route::put('update/{stock}',  [StockController::class, 'update'])->name('stocks.update');
        Route::get('destroy/{stock}', [StockController::class, 'destroy'])->name('stocks.destroy');
    });

    //Staff Controller
    Route::prefix('admin/staff')->group(function() {
        Route::get('/',               [StaffController::class, 'index'])->name('staff.index');
        Route::get('create',          [StaffController::class, 'create'])->name('staff.create');
        Route::post('store',          [StaffController::class, 'store'])->name('staff.store');
        Route::get('edit/{staff}',    [StaffController::class, 'edit'])->name('staff.edit');
        Route::put('update/{staff}',  [StaffController::class, 'update'])->name('staff.update');
        Route::get('destroy/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
    });

})->middleware('admin');






/* Table controller
Route::prefix('table')->group(function () {
    Route::get('/', 'App\Http\Controllers\TableController@index')->name('table.index');
    Route::get('create', 'App\Http\Controllers\TableController@create')->name('table.create');
    Route::post('store', 'App\Http\Controllers\TableController@store')->name('table.store');
    Route::get('edit/{table}', 'App\Http\Controllers\TableController@edit')->name('table.edit');
    Route::put('update/{table}', 'App\Http\Controllers\TableController@update')->name('table.update');
    Route::get('destroy/{table}', 'App\Http\Controllers\TableController@destroy')->name('table.destroy');
});
*/





// Customer menu and checkout routes
Route::prefix('menus')->group(function () {
    Route::get('/',                             [CustomerController::class, 'index'])->name('customer.index');
    Route::get('selectedCategory/{categoryId}', [CustomerController::class, 'index'])->name('menu.selectedCategory');
    Route::get('menu/detail/{menu}',            [CartController::class, 'show'])->name('menu.show');
 
    Route::prefix('menu/cart')->group(function() {
        Route::get('/',                [CartController::class, 'index'])->name('cart.index');
        Route::post('store/{menu}',    [CartController::class, 'store'])->name('cart.store');
        Route::get('destroy/{menuId}', [CartController::class, 'destroy'])->name('cart.destroy');
    });
});


//Order route 
Route::prefix('order')->group(function() {
    Route::get('/',              [OrderController::class, 'index'])->name('order.index');
    Route::get('store',          [OrderController::class, 'store'])->name('order.store');
    Route::get('complete',       [OrderController::class, 'complete'])->name('order.complete');
    Route::get('done/{orderId}', [OrderController::class, 'done'])->name('order.done');
    Route::get('paid/{orderId}', [OrderController::class, 'paid'])->name('order.paid');
}); 

// cashier route
Route::prefix('cashier')->group(function() {
    Route::get('/',                [CashierController::class, 'index'])->name('cashier.index');
    Route::get('cancel/{orderId}', [CashierController::class, 'cancel'])->name('cashier.cancel');
});