<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Staff;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Mengambil data jumlah dari database
        $totalStaff = Staff::count();
        $totalClients = Client::count();
        $totalInvoices = Invoice::count();

        // Contoh data pengguna baru per bulan
        $monthlyNewStaff = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60]; // Data dummy

        // Contoh data transaksi per bulan
        $monthlyInvoices = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120]; // Data dummy

        $totalStaff = '100';

        //print_r($totalStaff);   
        return view('dashboard.index', compact('totalStaff', 'totalClients', 'totalInvoices', 'monthlyNewStaff', 'monthlyInvoices'));
        //return view('dashboard.index')->with('totalStaff', $totalStaff);
    }
}
