<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Item;


class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('item')->get();
        return view('package.index', compact('packages'));
    }

    public function create()
    {
        $items = Item::all();
        return view('package.create', compact('items'));
    }

    public function store(Request $request)
    {
        $package = Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'itemId' => $request->itemId

        ]);

        return redirect()->to('/package');
    }

    public function edit($packageId)
    {
        $items = Item::all();
        // return view('package.create', compact('items'));

        $package = Package::findOrFail($packageId);
        return view('package.edit', [
            'package' => $package,
            'items' => $items,
        ]);

        
    }

    public function update(Request $request, $packageId)
    {
        $package = Package::where('id', $packageId)->update([
            'name' => $request->name,
            'price' => $request->price,
            'itemId' => $request->itemId
        ]);

        return redirect()->to('/package');
    }

    public function destroy($packageId)
    {
        Package::where('id', $packageId)->delete();

        return redirect()->to('/package');
    }
}
