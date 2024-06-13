<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        return view('client.index');
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $client = Client::create([
            // 'code' => $request->code,
            'name' => $request->name,
            'contactPerson' => $request->contactPerson,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->to('/client');
    }

    public function edit($clientId)
    {
        $client = Client::findOrFail($clientId);
        return view('client.edit', [
            'client' => $client,
        ]);
    }

    public function update(Request $request,$clientId)
    {
        $client = Client::where('id',$clientId)->update([
            // 'code' => $request->code,
            'name' => $request->name,
            'contactPerson' => $request->contactPerson,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->to('/client');
    }

    public function destroy($clientId)
    {
        Client::where('id', $clientId)->delete();

        return redirect()->to('/client');
    }
}
