<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\Item;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    // Fungsi untuk menyimpan item baru
    public function store(Request $request)
    {
        $invoiceItems = json_decode($request->invoiceItems, true);

        foreach ($invoiceItems as $item) {
            InvoiceItem::create([
                'invoiceId' => $request->invoiceId,
                'itemId' => $item['itemId'],
                'packageId' => $item['packageId'],
                'quantity' => $item['quantity'],
                'price' => $item['price'], // Menyimpan harga
            ]);
        }

        return response()->json(['message' => 'Items added successfully'], 200);
    }

    // Fungsi untuk mengambil data invoice dan item untuk diedit
    public function edit($invoiceId)
    {
        $invoice = Invoice::with('items.item', 'items.package')->findOrFail($invoiceId);
        $clients = Client::all();
        $items = Item::all();
        return view('transaction.edit', compact('invoice', 'clients', 'items'));
    }

    // Fungsi untuk menyimpan perubahan pada item-item invoice yang diedit
    public function update(Request $request, $invoiceId)
    {
        $invoiceItems = json_decode($request->invoiceItems, true);

        // Hapus semua item lama terlebih dahulu
        InvoiceItem::where('invoiceId', $invoiceId)->delete();

        // Tambahkan item-item baru berdasarkan data yang diubah
        foreach ($invoiceItems as $item) {
            InvoiceItem::create([
                'invoiceId' => $invoiceId,
                'itemId' => $item['itemId'],
                'packageId' => $item['packageId'],
                'quantity' => $item['quantity'],
                'price' => $item['price'], // Menyimpan harga
            ]);
        }

        return redirect('/transaction')->with('success', 'Invoice updated successfully');
    }
}
