<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('invoiceItem')->get();
        return view('transaction.index', compact('invoices'));
    }

    public function create()
    {
        $invoiceItems = \App\Models\InvoiceItem::all();
        return view('transaction.create', compact('invoiceItems'));
    }

    public function store(Request $request)
    {
        $invoice = Invoice::create([
            // 'code' => $request->code,
            'invoiceDate' => $request->invoiceDate,
            // 'quantity' => $request->quantity,
            // 'totalPrice' => $request->totalPrice,
            // 'subTotal' => $request->subTotal,
            // 'discount' => $request->discount,
            // 'downPayment' => $request->downPayment,
            // 'grandTotal' => $request->grandTotal,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            // 'dueDate' => $request->dueDate,
            'clientId' => $request->clientId,
            'staffId' => $request->staffId

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

        return redirect()->to('/invoice');
    }

    public function destroy($invoiceId)
    {
        Invoice::where('id', $invoiceId)->delete();

        return redirect()->to('/invoice');
    }
}
