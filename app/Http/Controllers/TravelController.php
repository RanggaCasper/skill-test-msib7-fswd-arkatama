<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel\Travel;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::all();
        
        return view('pages.travel.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_keberangkatan' => 'required|date',
            'kuota' => 'required|integer',
        ]);

        $travel = Travel::create($request->all());

        return response()->json([
            'message' => [
                'title' => 'Berhasil!',
                'body' => 'Travel berhasil ditambahkan.',
            ],
            'data' => $travel
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        return view('pages.travel.show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        return view('pages.travel.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $request->validate([
            'tanggal_keberangkatan' => 'required|date',
            'kuota' => 'required|integer',
        ]);

        $travel->update($request->all());

        return response()->json([
            'message' => [
                'title' => 'Berhasil!',
                'body' => 'Travel berhasil diupdate.',
            ]
        ]);  
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        $travel->delete();

        return response()->json([
            'message' => [
                'title' => 'Berhasil!',
                'body' => 'Travel berhasil dihapus.',
            ]
        ]);    
    }
}
