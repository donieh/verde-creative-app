<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Package;

class InvoiceItemController extends Controller
{
    public function store(Request $request, $invoiceId)
    {
        foreach ($request->itemId as $key => $itemId) {
            InvoiceItem::create([
                'invoiceId' => $invoiceId,
                'itemId' => $itemId,
                'packageId' => $request->packageId[$key],
                'quantity' => $request->quantity[$key],
            ]);
        }

        return redirect()->to('/transaction/' . $invoiceId . '/edit');
    }

    public function destroy($itemId)
    {
        $invoiceItem = InvoiceItem::findOrFail($itemId);
        $invoiceId = $invoiceItem->invoiceId;
        $invoiceItem->delete();
        return redirect()->to('/transaction/' . $invoiceId . '/edit');
    }
}
