<?php

use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $menuItems = MenuItem::all();
    $order = Auth::user()->orders()->first();


    return view('dashboard', compact('menuItems', 'order'));
})->middleware(['auth'])->name('dashboard');

Route::post('/{order}/add-item/{menuItem}', function (Order $order, MenuItem $menuItem) {
    $order->menuItems()->attach($menuItem);

    return redirect()->route('dashboard');
})->middleware(['auth'])->name('add-item');

Route::get('checkout/{order}', function (Order $order) {
    return view('checkout', compact('order'));
})->middleware(['auth'])->name('checkout');

require __DIR__.'/auth.php';
