<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
{
    $totalUsers = Staff::count();
    $totalCustomers = Client::count();
    $totalTransactions = Transaction::count();

    return view('dashboard', compact('totalUsers', 'totalCustomers', 'totalTransactions'));
}

}
