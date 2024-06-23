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

        $monthlyInvoices = Invoice::selectRaw('MONTH(startDate) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Mengisi bulan yang tidak ada transaksi dengan nilai 0
        $monthlyInvoices = array_replace(array_fill(1, 12, 0), $monthlyInvoices);

        return view('dashboard.index', compact('totalStaff', 'totalClients', 'totalInvoices', 'monthlyInvoices'));
    }
}
