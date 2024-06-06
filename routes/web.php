<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
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

Route::get('/dashboard', function() {
    return view('dashboard.index');
});

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

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/{staffId}/edit', [ProductController::class, 'edit']);
Route::put('/product/{staffId}', [ProductController::class, 'update']);
Route::delete('/product/{staffId}', [ProductController::class, 'destroy']); // delete -> http method ; destroy -> controller method