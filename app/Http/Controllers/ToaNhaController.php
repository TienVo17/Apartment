<?php

namespace App\Http\Controllers;

use App\Models\ToaNha;
use Illuminate\Http\Request;

class ToaNhaController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $toanha = ToaNha::all();
        return view('admin.quan_ly_toa_nha', compact('toanha'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        ToaNha::create($request->all());
        return redirect()->route('quan_ly_toa_nha.index');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $toanha = ToaNha::findOrFail($id);
        return response()->json($toanha);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $toanha = ToaNha::findOrFail($id);
        $toanha->update($request->all());
        return redirect()->route('quan_ly_toa_nha.index');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $toanha = ToaNha::findOrFail($id);
        $toanha->delete();
        return redirect()->route('quan_ly_toa_nha.index');
    }
}
