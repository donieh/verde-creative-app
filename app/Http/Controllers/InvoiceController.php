<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Item;
use App\Models\Package;
use App\Models\Invoiceitem;
use PDF;

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
        $invoiceDate = $request->startDate;
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

        $invoiceItems = json_decode($request->invoiceItems, true);

        foreach ($invoiceItems as $item) {
            InvoiceItem::create([
                'invoiceId' => $invoice->id,
                'itemId' => $item['itemId'],
                'packageId' => $item['packageId'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        return redirect()->to('/transaction');
    }


    // public function edit($invoiceId)
    // {
    //     $invoice = Invoice::findOrFail($invoiceId);
    //     $clients = Client::all();
    //     $items = Item::all();
    //     $packages = Package::all();
    //     return view('transaction.edit', compact('invoice', 'clients', 'items', 'packages'));
    // }

    public function edit($invoiceId)
    {
        $invoice = Invoice::with('items.item', 'items.package')->findOrFail($invoiceId);
        $clients = Client::all();
        $items = Item::all();
        return view('transaction.edit', compact('invoice', 'clients', 'items'));
    }


    public function update(Request $request, $invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
    
        // Set invoiceDate to startDate
        $invoiceDate = $request->startDate;
    
        $invoice->update([
            'invoiceDate' => $invoiceDate,
            'startDate' => $request->startDate,
            'dueDate' => $request->dueDate,
            'endDate' => $request->endDate,
            'clientId' => $request->clientId,
            'discount' => $request->discount,
            'downPayment' => $request->downPayment
        ]);
    
        // Update invoice items
        $invoiceItems = json_decode($request->invoiceItems, true);
    
        // Delete existing invoice items first
        InvoiceItem::where('invoiceId', $invoice->id)->delete();
    
        // Insert updated invoice items
        foreach ($invoiceItems as $item) {
            InvoiceItem::create([
                'invoiceId' => $invoice->id,
                'itemId' => $item['itemId'],
                'packageId' => $item['packageId'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }
    
        return redirect()->to('/transaction');
    }
    
    

    public function destroy($invoiceId)
    {
        Invoice::where('id', $invoiceId)->delete();
        return redirect()->to('/transaction');
    }


    public function generateInvoice($invoiceId)
    {
        $invoice = Invoice::with('clients', 'items.item', 'items.package')->findOrFail($invoiceId);
        
        $data = [
            'invoice' => $invoice,
            'client' => $invoice->clients,
            'items' => $invoice->items,
            'invoiceDate' => $invoice->invoiceDate,
            'dueDate' => $invoice->dueDate,
            'discount' => $invoice->discount,
            'downPayment' => $invoice->downPayment,
            'total' => $invoice->items->sum(function ($item) {
                return $item->quantity * $item->price;
            }) - $invoice->discount - $invoice->downPayment,
        ];
    
        $pdf = PDF::loadView('transaction.invoice', $data);
        return $pdf->download('invoice-' . $invoice->invoiceId . '.pdf');
    }
    
}
