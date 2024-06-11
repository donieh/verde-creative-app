<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('item.index');
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        $item = Item::create([
            'name' => $request->name,
            // 'package' => $request->package,
            // 'price' => $request->price,
           
        ]);

        return redirect()->to('/item');
    }

    public function edit($itemId)
    {
        $item = Item::findOrFail($itemId);
        return view('item.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request,$itemId)
    {
        $item = Item::where('id',$itemId)->update([
            'name' => $request->name,
        ]);

        return redirect()->to('/item');
    }

    public function destroy($itemId)
    {
        Item::where('id', $itemId)->delete();

        return redirect()->to('/item');
    }
}
