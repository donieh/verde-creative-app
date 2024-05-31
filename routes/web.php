<?php

use App\Http\Controllers\UserController;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/client', function() {
    return view('client.index');
});