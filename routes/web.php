<?php
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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ManageUserController;

// View Dashboard
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('superadmin', function() {
    return view('superadmin');
})->name('superadmin')->middleware('superadmin');


//Menu routes
Route::prefix('admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin')->middleware('admin');
    //admin/menu
    Route::prefix('menu')->group(function() {
        Route::get('/',                  [MenuController::class, 'index'])->name('menu.index')->middleware('admin');
        Route::get('create',             [MenuController::class, 'create'])->name('menu.create')->middleware('admin');
        Route::post('store',             [MenuController::class, 'store'])->name('menu.store')->middleware('admin');
        Route::get('edit/{menu}',        [MenuController::class, 'edit'])->name('menu.edit')->middleware('admin');
        Route::put('update/{menu}',      [MenuController::class, 'update'])->name('menu.update')->middleware('admin');
        Route::get('destroy/{menu}',     [MenuController::class, 'destroy'])->name('menu.destroy')->middleware('admin');
    });
    
    // Category Controller - admin/category
    Route::prefix('category')->group(function() {
        Route::get('/',                  [CategoryController::class, 'index'])->name('category.index')->middleware('admin');
        Route::get('create',             [CategoryController::class, 'create'])->name('category.create')->middleware('admin');
        Route::get('edit/{category}',    [CategoryController::class, 'edit'])->name('category.edit')->middleware('admin');
        Route::put('update/{category}',  [CategoryController::class, 'update'])->name('category.update')->middleware('admin');
        Route::post('store',             [CategoryController::class, 'store'])->name('category.store')->middleware('admin');
        Route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('admin');
    });

    // payments routes - admin/reports
    Route::prefix('reports')->group(function() {
        Route::get('orders',            [ReportController::class, 'ordersReport'])->name('reports.orders')->middleware('admin');
        Route::get('daily',             [ReportController::class, 'dailyReport'])->name('daily.reports')->middleware('admin');
        Route::get('monthly',           [ReportController::class, 'monthlyReport'])->name('monthly.reports')->middleware('admin');
        Route::get('dailysalesfilter',  [ReportController::class, 'dailySalesFilter'])->name('dailySalesFilter')->middleware('admin');
        Route::get('dailySalesOrders/{day}',  [ReportController::class, 'dailySalesOrders'])->name('dailySalesOrders')->middleware('admin');
    
    });

    // Route Stocks routes - admin/stock
    Route::prefix('stock')->group(function () {
        Route::get('/',                 [StockController::class, 'index'])->name('stocks.index')->middleware('admin');
        Route::get('create',            [StockController::class, 'create'])->name('stocks.create')->middleware('admin');
        Route::post('store',            [StockController::class, 'store'])->name('stocks.store')->middleware('admin');
        Route::get('edit/{stock}',      [StockController::class, 'edit'])->name('stocks.edit')->middleware('admin');
        Route::put('update/{stock}',    [StockController::class, 'update'])->name('stocks.update')->middleware('admin');
        Route::get('destroy/{stock}',   [StockController::class, 'destroy'])->name('stocks.destroy')->middleware('admin');
    });

    //Staff routes - admin/staff
    Route::prefix('staff')->group(function() {
        Route::get('/',                 [StaffController::class, 'index'])->name('staff.index')->middleware('admin');
        Route::get('create',            [StaffController::class, 'create'])->name('staff.create')->middleware('admin');
        Route::post('store',            [StaffController::class, 'store'])->name('staff.store')->middleware('admin');
        Route::get('edit/{staff}',      [StaffController::class, 'edit'])->name('staff.edit')->middleware('admin');
        Route::put('update/{staff}',    [StaffController::class, 'update'])->name('staff.update')->middleware('admin');
        Route::get('destroy/{staff}',   [StaffController::class, 'destroy'])->name('staff.destroy')->middleware('admin');
    });
    // reservation routes - admin/reservation
    Route::prefix('reservation')->group(function() {
        Route::get('/',                     [ReservationController::class, 'index'])->name('reservation.index')->middleware('admin');
        Route::get('create',                [ReservationController::class, 'create'])->name('reservation.create')->middleware('admin');
        Route::post('store',                [ReservationController::class, 'store'])->name('reservation.store')->middleware('admin');
        Route::get('destroy/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy')->middleware('admin');
        Route::get('edit/{reservation}',    [ReservationController::class, 'edit'])->name('reservation.edit')->middleware('admin');
        Route::put('update/{reservation}',  [ReservationController::class, 'update'])->name('reservation.update')->middleware('admin');
    });
    // Table controller - admin/table
    Route::prefix('table')->group(function () {
        Route::get('/',                 [TableController::class, 'index'])->name('table.index');
        Route::get('create',            [TableController::class, 'create'])->name('table.create');
        Route::post('store',            [TableController::class, 'store'])->name('table.store');
        Route::get('edit/{table}',      [TableController::class, 'edit'])->name('table.edit');
        Route::put('update/{table}',    [TableController::class, 'update'])->name('table.update');
        Route::get('destroy/{table}',   [TableController::class, 'destroy'])->name('table.destroy');
    });

    // users controller - admin/user
    Route::prefix('user')->group(function () {
        Route::get('/',                 [ManageUserController::class, 'index'])->name('user.index');
        Route::get('create',            [ManageUserController::class, 'create'])->name('user.create');
        Route::post('store',            [ManageUserController::class, 'store'])->name('user.store');
        Route::get('edit/{user}',       [ManageUserController::class, 'edit'])->name('user.edit');
        Route::get('deactivate/{user}', [ManageUserController::class, 'deactivate'])->name('user.deactivate');
        Route::get('reactivate/{user}', [ManageUserController::class, 'reactivate'])->name('user.reactivate');
        Route::get('destroy/{user}',    [ManageUserController::class, 'destroy'])->name('user.destroy');
    });

});




// Customer menu and checkout routes
Route::prefix('menus')->group(function () {
    Route::get('/',                             [CustomerController::class, 'index'])->name('customer.index');
    Route::get('selectedCategory/{categoryId}', [CustomerController::class, 'selectedCategory'])->name('menu.selectedCategory');
    Route::get('menu/detail/{menu}',            [CartController::class, 'show'])->name('menu.show');
    
    //menus/menu/cart
    Route::prefix('menu/cart')->group(function() {
        Route::get('/',                [CartController::class, 'index'])->name('cart.index');
        Route::post('store/{menu}',    [CartController::class, 'store'])->name('cart.store');
        Route::get('destroy/{menuId}', [CartController::class, 'destroy'])->name('cart.destroy');
    });
});


//Order route - /order
Route::prefix('order')->group(function() {
    Route::get('/',                     [OrderController::class, 'index'])->name('order.index')->middleware('kitchen');
    Route::get('store',                 [OrderController::class, 'store'])->name('order.store');
    Route::get('complete',              [OrderController::class, 'complete'])->name('order.complete');
    Route::get('done/{orderId}',        [OrderController::class, 'done'])->name('order.done')->middleware('kitchen');
    Route::get('paid/{orderId}',        [OrderController::class, 'paid'])->name('order.paid');
}); 

// cashier route
Route::prefix('cashier')->group(function() {
    Route::get('/',                     [CashierController::class, 'index'])->name('cashier.index')->middleware('cashier');
    Route::get('cancel/{orderId}',      [CashierController::class, 'cancel'])->name('cashier.cancel')->middleware('cashier');
    Route::get('details/{orderNumber}', [CashierController::class, 'details'])->name('order.details');
});