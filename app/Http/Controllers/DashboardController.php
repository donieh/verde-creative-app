<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Staff;
use App\Models\Transaction;

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
