<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $staff = Staff::create([
            'name' => $request->name,
            'position' => $request->position,
            'username' => $request->username,
            'password' => md5($request->password),
        ]);

        return redirect()->to('/user');
    }

    public function edit($staffId)
    {
        $staff = Staff::findOrFail($staffId);
        return view('user.edit', [
            'staff' => $staff,
        ]);
    }

    public function update(Request $request, $staffId)
{
    $staff = Staff::findOrFail($staffId);

    // Update data lainnya
    $staff->name = $request->input('name');
    $staff->position = $request->input('position');
    $staff->username = $request->input('username');

    // Periksa apakah password baru diisi atau tidak kosong
    if ($request->filled('password')) {
        $staff->password = md5($request->input('password'));
    }

    $staff->save();

    return redirect()->to('/user');
}

    public function destroy($staffId)
    {
        Staff::where('id', $staffId)->delete();

        return redirect()->to('/user');
    }
}
