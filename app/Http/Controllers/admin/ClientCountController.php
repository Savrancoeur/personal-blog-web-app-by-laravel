<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientCount;

class ClientCountController extends Controller
{
    public function index()
    {
        $clientCount = ClientCount::all();
        $client = ClientCount::find(1);
        return view('admin-panel.clientcount.index', compact('clientCount', 'client'));
    }

    public function store(request $request)
    {
        $request->validate([
            'count' => 'required|numeric',
        ]);

        ClientCount::create(['count' => $request->count]);
        return redirect()->route('client_counts.index')->with('successMsg', 'Client count created successfully');
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'count' => 'required|numeric',
        ]);

        $client = ClientCount::find($id);
        $client->update([
            'count' => $client->count + $request->count
        ]);

        return back();
    }
}
