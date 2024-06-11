<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('clients')->get();
        return view('transaction.index', compact('invoices'));
    }

    public function create()
    {
        // $invoiceItems = \App\Models\InvoiceItem::all();
        $clients = \App\Models\Client::all();
        $items = \App\Models\Item::all();
        $packages = \App\Models\Package::all();
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
        ]);

        return redirect()->to('/transaction');
    }

    public function edit($invoiceId)
    {
        $invoiceItems = \App\Models\InvoiceItem::all();
        // return view('package.create', compact('items'));

        $invoice = Invoice::findOrFail($invoiceId);
        return view('invoice.edit', [
            'invoice' => $invoice,
            'invoiceItems' => $invoiceItems,
        ]);
    }

    public function update(Request $request, $invoiceId)
    {
        $invoice = Invoice::where('id', $invoiceId)->update([
            'code' => $request->code,
            'invoiceDate' => $request->invoiceDate,
            'quantity' => $request->quantity,
            'totalPrice' => $request->totalPrice,
            'subTotal' => $request->subTotal,
            'discount' => $request->discount,
            'downPayment' => $request->downPayment,
            'grandTotal' => $request->grandTotal,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dueDate' => $request->dueDate,
            'clientId' => $request->clientId,
            'staffId' => $request->staffId
        ]);

        return redirect()->to('/transaction');
    }

    public function destroy($invoiceId)
    {
        Invoice::where('id', $invoiceId)->delete();

        return redirect()->to('/transaction');
    }
}
