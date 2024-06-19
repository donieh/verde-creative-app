<?php

// use App\Http\Controllers\ProductController;

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Models\Staff;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here isko where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index'); // Menampilkan file index.blade.php
});

Route::get('/about', function () {
    return view('about'); // Menampilkan file about.blade.php
});

Route::get('/login', function () {
    return view('login.index'); // Menampilkan file about.blade.php
});

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    $staff = Staff::where('username', $credentials['username'])
        ->where('password', md5($credentials['password']))
        ->first();

    if ($staff) {
        session()->put('logged_in_user', $staff);

        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'username' => 'account invalid',
    ])->onlyInput('username');
});

Route::post('/logout', function (Request $request) {
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function() {
    return view('dashboard.index');
});

// Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/{staffId}/edit', [UserController::class, 'edit']);
Route::put('/user/{staffId}', [UserController::class, 'update']);
Route::delete('/user/{staffId}', [UserController::class, 'destroy']); // delete -> http method ; destroy -> controller method

// Route::resource('user', UserController::class);

Route::get('/client', [ClientController::class, 'index']);
Route::get('/client/create', [ClientController::class, 'create']);
Route::post('/client', [ClientController::class, 'store']);
Route::get('/client/{clientId}/edit', [ClientController::class, 'edit']);
Route::put('/client/{clientId}', [ClientController::class, 'update']);
Route::delete('/client/{clientId}', [ClientController::class, 'destroy']);

Route::get('/item', [ItemController::class, 'index']);
Route::get('/item/create', [ItemController::class, 'create']);
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/{itemId}/edit', [ItemController::class, 'edit']);
Route::put('/item/{itemId}', [ItemController::class, 'update']);
Route::delete('/item/{itemId}', [ItemController::class, 'destroy']);

Route::get('/package', [PackageController::class, 'index']);
Route::get('/package/create', [PackageController::class, 'create']);
Route::post('/package', [PackageController::class, 'store']);
Route::get('/package/{packageId}/edit', [PackageController::class, 'edit']);
Route::put('/package/{packageId}', [PackageController::class, 'update']);
Route::delete('/package/{packageId}', [PackageController::class, 'destroy']);

Route::get('/transaction', [InvoiceController::class, 'index']);
Route::get('/transaction/create', [InvoiceController::class, 'create']);
Route::post('/transaction', [InvoiceController::class, 'store']);
Route::get('/transaction/{invoiceId}/edit', [InvoiceController::class, 'edit']);
Route::put('/transaction/{invoiceId}', [InvoiceController::class, 'update']);
Route::delete('/transaction/{invoiceId}', [InvoiceController::class, 'destroy']);
Route::post('transaction/{invoiceId}/items', [InvoiceItemController::class, 'store'])->name('invoice-items.store');
Route::delete('transaction/items/{itemId}', [InvoiceItemController::class, 'destroy'])->name('invoice-items.destroy');

Route::post('/invoice-items', [InvoiceItemController::class, 'store']);
Route::put('/invoice-items/{id}', [InvoiceItemController::class, 'update']);
Route::delete('/invoice-items/{id}', [InvoiceItemController::class, 'destroy']);
Route::get('/get-packages-by-item/{itemId}', [PackageController::class, 'getPackagesByItem']);
