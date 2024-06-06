<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        return view('product.index');
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $product = Item::create([
            'name' => $request->name,
            'package' => $request->package,
            'price' => $request->price,
           
        ]);

        

        return redirect()->to('/product');
    }

    public function edit($itemId)
    {
        $item = Item::findOrFail($itemId);
        return view('product.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request,$itemId)
    {
        $item = Item::where('id',$itemId)->update([
            'name' => $request->name,
            'package' => $request->package,
            'price' => $request->price,
        ]);

        return redirect()->to('/product');
    }

    public function destroy($itemId)
    {
        Item::where('id', $itemId)->delete();

        return redirect()->to('/product');
    }
}
