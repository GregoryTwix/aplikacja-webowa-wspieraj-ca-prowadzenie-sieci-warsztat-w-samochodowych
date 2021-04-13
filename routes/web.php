<?php

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
Route::group(['middleware' => 'auth'], function () {
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('panel.home');

Route::prefix('orders')->group(function () {
    Route::get('history', [\App\Http\Controllers\orders\OrdersController::class, 'history']);
    Route::get('create', [\App\Http\Controllers\orders\OrdersController::class, 'makeForm'])->name('orders.create');
    Route::post('create', [\App\Http\Controllers\orders\OrdersController::class, 'make'])->name('orders.post');
});

Route::get('manage/{id}', [\App\Http\Controllers\orders\OrdersController::class, 'userVisits'])->name('workshops.manage');

Route::prefix('users')->group(function () {
    Route::get('list', [\App\Http\Controllers\UserController::class, 'usersList'])->name('users.list');
    Route::get('manage/{id}', [\App\Http\Controllers\UserController::class, 'manage'])->name('users.manage');
    Route::post('update/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('delete/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
});

Route::get('user/create', [\App\Http\Controllers\UserController::class, 'createUserForm'])->name('users.createForm');
Route::post('user/create', [\App\Http\Controllers\UserController::class, 'createUser'])->name('users.create');

Route::prefix('workshops')->group(function () {
    Route::get('create', [\App\Http\Controllers\WorkShopController::class, 'createForm'])->name('workshops.createForm');
    Route::post('create', [\App\Http\Controllers\WorkShopController::class, 'create'])->name('workshops.create');
    Route::get('edit/{id}', [\App\Http\Controllers\WorkShopController::class, 'edit'])->name('workshops.editForm');
    Route::post('update/{id}', [\App\Http\Controllers\WorkShopController::class, 'update'])->name('workshops.update');

    Route::prefix('manage/{id}')->group(function () {

        Route::get('/', [\App\Http\Controllers\WorkShopController::class, 'manage'])->name('workshops.manage');
        Route::get('calendar', [\App\Http\Controllers\WorkShopController::class, 'calendar'])->name('workshops.calendar');
        Route::get('calendar/{Id}/changeStatus/{status}', [\App\Http\Controllers\Orders\OrdersController::class, 'changeVisitStatus'])->name('workshops.changeVisitStatus');
        Route::get('calendar/{visitId}/changeDate', [\App\Http\Controllers\Orders\OrdersController::class, 'changeVisitDateForm'])->name('workshops.changeVisitDateForm');
        Route::post('calendar/{visitId}/changeDate', [\App\Http\Controllers\Orders\OrdersController::class, 'changeVisitDate'])->name('workshops.changeVisitDate');

        Route::get('calendar/{visitId}/changeCost', [\App\Http\Controllers\Orders\OrdersController::class, 'changeVisitCostForm'])->name('workshops.changeVisitCostForm');
        Route::post('calendar/{visitId}/changeCost', [\App\Http\Controllers\Orders\OrdersController::class, 'changeVisitCost'])->name('workshops.changeVisitCost');


        Route::get('clients', [\App\Http\Controllers\UserController::class, 'manageClients'])->name('users.manageClients');
        Route::get('client/{clientIid}', [\App\Http\Controllers\UserController::class, 'manageClient'])->name('users.clientManage');
        Route::post('client/{clientIid}', [\App\Http\Controllers\UserController::class, 'updateClient'])->name('users.clientUpdate');

        Route::get('storage', [\App\Http\Controllers\WarehouseItemController::class, 'itemsList'])->name('warehouse.itemsList');
        Route::get('storage/item/create', [\App\Http\Controllers\WarehouseItemController::class, 'createItemForm'])->name('warehouse.createItemForm');
        Route::post('storage/item/create', [\App\Http\Controllers\WarehouseItemController::class, 'createItem'])->name('warehouse.createItem');
        Route::get('storage/{item}/manage', [\App\Http\Controllers\WarehouseItemController::class, 'manageItem'])->name('warehouse.manageItem');
        Route::post('storage/{item}/manage', [\App\Http\Controllers\WarehouseItemController::class, 'updateItem'])->name('warehouse.updateItem');
        Route::get('storage/{item}/delete', [\App\Http\Controllers\WarehouseItemController::class, 'deleteItem'])->name('warehouse.deleteItem');

        Route::get('delivers', [\App\Http\Controllers\DeliverController::class, 'deliversList'])->name('delivers.list');
        Route::get('deliver/create', [\App\Http\Controllers\DeliverController::class, 'createForm'])->name('delivers.createForm');
        Route::post('deliver/create', [\App\Http\Controllers\DeliverController::class, 'create'])->name('delivers.create');
        Route::get('deliver/{deliverId}/manage', [\App\Http\Controllers\DeliverController::class, 'manage'])->name('delivers.manage');
        Route::post('deliver/{deliverId}/manage', [\App\Http\Controllers\DeliverController::class, 'update'])->name('delivers.update');
        Route::get('deliver/{deliverId}/delete', [\App\Http\Controllers\DeliverController::class, 'delete'])->name('delivers.delete');

        Route::get('invoice/{orderId}/create', [\App\Http\Controllers\InvoicesController::class, 'createForm'])->name('invoices.createForm');
        Route::post('invoice/{orderId}/create', [\App\Http\Controllers\InvoicesController::class, 'create'])->name('invoices.create');

        Route::get('invoice/{invoiceId}/show', [\App\Http\Controllers\InvoicesController::class, 'show'])->name('invoices.show');
        Route::get('invoice/{invoiceId}/download', [\App\Http\Controllers\InvoicesController::class, 'download'])->name('invoices.download');


        Route::get('stats', [\App\Http\Controllers\WorkShopController::class, 'stats'])->name('workshops.stats');

        Route::get('users-stats', [\App\Http\Controllers\UserController::class, 'stats'])->name('workshops.usersStats');



    });

});

Route::prefix('visits')->group(function () {
    Route::get('my-visits', [\App\Http\Controllers\orders\OrdersController::class, 'userVisits'])->name('orders.myOrders');
    Route::get('history', [\App\Http\Controllers\orders\OrdersController::class, 'userVisitsHistory'])->name('orders.myOrdersHistory');
    Route::get('create', [\App\Http\Controllers\orders\OrdersController::class, 'makeForm'])->name('orders.create');
    Route::post('create', [\App\Http\Controllers\orders\OrdersController::class, 'make'])->name('orders.post');

    Route::get('/acceptDate/{orderId}', [\App\Http\Controllers\orders\OrdersController::class, 'acceptByUser'])->name('orders.acceptByUser');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
Auth::routes();
