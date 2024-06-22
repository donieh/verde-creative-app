<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Staff;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Mengambil data jumlah dari database
        $totalStaff = Staff::count();
        $totalClients = Client::count();
        $totalInvoices = Invoice::count();

        // Contoh data transaksi per bulan
        $monthlyInvoices = [10, 20, 0, 40, 50, 60, 70, 80, 90, 100, 110, 120]; // Data dummy

        return view('dashboard.index', compact('totalStaff', 'totalClients', 'totalInvoices', 'monthlyInvoices'));
    }
}
