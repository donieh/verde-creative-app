<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Item;
use App\Models\Package;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('clients')->get();
        return view('transaction.index', compact('invoices'));
    }

    public function create()
    {
        $clients = Client::all();
        $items = Item::all();
        $packages = Package::all();
        return view('transaction.create', compact('clients', 'items', 'packages'));
    }

    public function store(Request $request)
    {
        $invoiceDate = $request->invoiceDate;
        $dueDate = date('Y-m-d', strtotime($invoiceDate . ' +15 days'));

        $invoice = Invoice::create([
            'invoiceDate' => $invoiceDate,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'clientId' => $request->clientId,
            'staffId' => 1,
            'dueDate' => $dueDate,
            'discount' => $request->discount,
            'downPayment' => $request->downPayment
        ]);

        return redirect()->to('/transaction');
    }

    public function edit($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $clients = Client::all();
        $items = Item::all();
        $packages = Package::all();
        return view('transaction.edit', compact('invoice', 'clients', 'items', 'packages'));
    }

    public function update(Request $request, $invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $invoice->update([
            'invoiceDate' => $request->invoiceDate,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'clientId' => $request->clientId,
            'discount' => $request->discount,
            'downPayment' => $request->downPayment
        ]);

        return redirect()->to('/transaction');
    }

    public function destroy($invoiceId)
    {
        Invoice::where('id', $invoiceId)->delete();
        return redirect()->to('/transaction');
    }
}
