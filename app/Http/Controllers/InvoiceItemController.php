<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function index()
    {
        return view('invoiceItem.index');
    }

    public function create()
    {
        return view('invoiceItem.create');
    }

    public function store(Request $request)
    {
        $item = InvoiceItem::create([
            'quantity' => $request->quantity,
            'price' => $request->price,
            'invoiceId' => $request->invoiceId,
            'itemId' => $request->itemId,
            'packageId' => $request->packageId
           
        ]);

        return redirect()->to('/invoiceItem');
    }

    public function edit($invoiceItemId)
    {
        $invoiceItem = InvoiceItem::findOrFail($invoiceItemId);
        return view('invoiceItem.edit', [
            'invoiceItem' => $invoiceItem,
        ]);
    }

    public function update(Request $request,$invoiceItemId)
    {
        $invoiceItem = InvoiceItem::where('id',$invoiceItemId)->update([
            'quantity' => $request->quantity,
            'price' => $request->price,
            'invoiceId' => $request->invoiceId,
            'itemId' => $request->itemId,
            'packageId' => $request->packageId
        ]);

        return redirect()->to('/invoiceItem');
    }

    public function destroy($invoiceItemId)
    {
        Item::where('id', $invoiceItemId)->delete();

        return redirect()->to('/invoiceItem');
    }
}
