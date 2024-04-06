<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShowController;
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

Route::get('/', [ShowController::class, 'main'])->name('main.page');
Route::get('/catalog', [ShowController::class, 'catalog'])->name('catalog.page');
Route::get('/card/{shop}', [ShowController::class, 'cardPage'])->name('cardPage');

Route::controller(LogController::class)->prefix('/user')->group(function () {
    Route::get('/logPage', 'logPage')->name('LogPage');
    Route::get('/signPage', 'signPage')->name('SignPage');
    Route::post('/sign', 'sign')->name('user.sign');
    Route::post('/logout', 'logout')->name('user.logout');
    Route::post('/log', 'log')->name('user.log');
});




Route::controller(ShopController::class)->prefix('/shop')->middleware('auth')->group(function () {
    Route::get('/CreatePage', 'CreatePage')->name('createPage');
    Route::post('/create', 'create')->name('create');
    Route::get('/CategoryPage', 'CategoryPage')->name('categoryPage');
    Route::post('/category', 'categoryCreate')->name('categoryCreate');
    Route::get('/editPage/{shop}', 'editPage')->name('editPage');
    Route::post('/edit/{shop}', 'edit')->name('edit');
    Route::get('/delete/{shop}', 'delete')->name('delete');
    Route::get('/deleteCattegory/{category}', 'deleteCategory')->name('deleteCategory');
});


Route::controller(CartController::class)->prefix('/cart')->middleware(['auth'])->group(function () {
    Route::get('/cartPage', 'cartPage')->name('cartPage');
    Route::get('/cartPageAdmin', 'cartPageAdmin')->name('cartPageAdmin');
    Route::post('/cartPageAdmin/{cart}/confirm', 'confirm')->name('carts.confirm');
    Route::post('/cartPageAdmin/{cart}/cancel', 'cancel')->name('carts.cancel');
    Route::post('/shops/{shop}', 'cartPut')->name('cartPut');
    Route::post('/{cart}/shops/{shop}/destroy', 'destroyShop')->name('destroyShop');
    Route::post('/{cart}/checkout', 'checkout')->name('carts.checkout');
});



Route::controller(OrderController::class)->prefix('orders')->group(function () {
    Route::post('/{order}/plus', 'plus')->name('order.plus');
    Route::post('/{order}/minus', 'minus')->name('order.minus');
});
