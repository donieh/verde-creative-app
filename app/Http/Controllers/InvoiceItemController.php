<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
// use App\Models\Invoice;
// use App\Models\Client;
// use App\Models\Item;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function store(Request $request)
    {
        $invoiceItems = json_decode($request->invoiceItems, true);

        foreach ($invoiceItems as $item) {
            InvoiceItem::create([
                'invoiceId' => $request->invoiceId,
                'itemId' => $item['itemId'],
                'packageId' => $item['packageId'],
                'quantity' => $item['quantity']
            ]);
        }

        return response()->json(['message' => 'Items added successfully'], 200);
    }

//     public function edit($invoiceId)
// {
//     $invoice = Invoice::with('items.item', 'items.package')->findOrFail($invoiceId);
//     $clients = Client::all();
//     $items = Item::all();
//     return view('transaction.edit', compact('invoice', 'clients', 'items'));
// }
}
