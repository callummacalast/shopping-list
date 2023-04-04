<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ShoppingListItemController;
use App\Models\ShoppingList;
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



/**
 * ShoppingListItemController
 */

Route::middleware('auth')->group(function () {
    Route::controller(ShoppingListController::class)->group(function () {
        Route::get('shopping-list', 'index')->name('shopping-list');
        Route::patch('shopping-list/{list}', 'update')->name('shopping-list.update');
        Route::get('shopping-list/share', 'share')->name('shopping-list.share');
        Route::post('shopping-list/share', 'sendList')->name('shopping-list.send');
    });


    Route::controller(ShoppingListItemController::class)->group(function () {   
        Route::post('/shopping-list/create', 'store')->name('item.create');
        Route::post('/shopping-list', 'store')->name('item.store');
        Route::post('/shopping-list/{shoppingListItem}', 'show')->name('item.show');
        Route::get('/purchased', 'purchased')->name('item.purchase');
        Route::get('/shopping-list/{shoppingListItem}/delete', 'destroy')->name('item.destroy');
    })->middleware('auth');
});




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
