<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function store(Request $request)
    {
        $invoiceItem = InvoiceItem::create($request->all());
        return response()->json($invoiceItem, 201);
    }

    public function update(Request $request, $id)
    {
        $invoiceItem = InvoiceItem::findOrFail($id);
        $invoiceItem->update($request->all());
        return response()->json($invoiceItem, 200);
    }

    public function destroy($id)
    {
        InvoiceItem::destroy($id);
        return response()->json(null, 204);
    }

    public function getPackagesByItem($itemId)
    {
        $packages = \App\Models\Package::where('itemId', $itemId)->get();
        return response()->json($packages);
    }
}
