<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel\Travel;
use Illuminate\Support\Carbon;
use App\Models\Penumpang\Penumpang;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penumpangs = Penumpang::with('travel')->get();
        $travels = Travel::where('tanggal_keberangkatan', '>', Carbon::now())->where('kuota', '>', 0)->get();
        return view('pages.penumpang.index', compact('penumpangs','travels'));
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
            'id_travel' => 'required|exists:travel,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'kota' => 'required|string|max:255',
            'usia' => 'required|integer',
            'tahun_lahir' => 'required|max:' . date('Y'),
        ]);

        $travel = Travel::find($request->id_travel);
        if($travel->kuota < 1){
            return response()->json([
                'message' => [
                    'body' => 'Kuota tidak mencukupi.',
                ]
            ], 400);   
        }

        if (str_word_count($request->nama) < 2) {
            return response()->json([
                'message' => [
                    'body' => 'Nama harus terdiri dari lebih dari satu kata.',
                ]
            ], 400);
        }
    
        if (str_word_count($request->kota) < 2) {
            return response()->json([
                'message' => [
                    'body' => 'Kota harus terdiri dari lebih dari satu kata.',
                ]
            ], 400);
        }
        
        $cek = Penumpang::where('id_travel', $request->id_travel)->where('nama', strtoupper($request->nama))->first();
        if($cek) {
            return response()->json([
                'message' => [
                    'body' => 'Tidak boleh melakukan booking untuk travel yang sama.',
                ]
            ], 400);
        }

        $no_urut = Penumpang::where('id_travel', $request->id_travel)->count() + 1;

        $kode_booking = date('ym') . sprintf('%04d', $request->id_travel) . sprintf('%04d', $no_urut);
        
        Penumpang::create([
            'id_travel' => $request->id_travel,
            'kode_booking' => $kode_booking,
            'nama' => strtoupper($request->nama),
            'jenis_kelamin' => $request->jenis_kelamin,
            'kota' => strtoupper($request->kota),
            'usia' => $request->usia,
            'tahun_lahir' => $request->tahun_lahir,
        ]);    

        $travel->kuota = $travel->kuota -1;
        $travel->save();
        
        return response()->json([
            'message' => [
                'title' => 'Berhasil!',
                'body' => 'Penumpang berhasil ditambahkan.',
            ]
        ]);   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penumpang $penumpang)
    {
        $travels = Travel::where('tanggal_keberangkatan', '>', Carbon::now())->where('kuota', '>', 0)->orWhere('id', $penumpang->id_travel)->get();
        return view('pages.penumpang.edit', compact('penumpang', 'travels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penumpang $penumpang)
    {
        $request->validate([
            'id_travel' => 'required|exists:travel,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'kota' => 'required|string|max:255',
            'usia' => 'required|integer',
            'tahun_lahir' => 'required|max:' . date('Y'),
        ]);

        $travel = Travel::find($request->id_travel);
        
        if ($penumpang->id_travel != $request->id_travel) {
            if ($travel->kuota < 1) {
                return response()->json([
                    'status' => false,
                    'message' => [
                        'body' => 'Kuota tidak mencukupi pada travel yang dipilih.',
                    ]
                ], 400);
            }
            
            $oldTravel = Travel::find($penumpang->id_travel);
            $oldTravel->kuota += 1;
            $oldTravel->save();

            $travel->kuota -= 1;
            $travel->save();
        }

        if ($penumpang->id_travel != $request->id_travel) {
            $no_urut = Penumpang::where('id_travel', $request->id_travel)->count() + 1;
            $kode_booking = date('ym') . str_pad($request->id_travel, 4, '0', STR_PAD_LEFT) . str_pad($no_urut, 4, '0', STR_PAD_LEFT);
        } else {
            $kode_booking = $penumpang->kode_booking;  
        }

        $penumpang->update([
            'id_travel' => $request->id_travel,
            'kode_booking' => $kode_booking,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kota' => $request->kota,
            'usia' => $request->usia,
            'tahun_lahir' => $request->tahun_lahir,
        ]);

        return response()->json([
            'message' => [
                'title' => 'Berhasil!',
                'body' => 'Penumpang berhasil diperbarui.',
            ]
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penumpang $penumpang)
    {
        $penumpang->delete();

        return response()->json([
            'message' => [
                'title' => 'Berhasil!',
                'body' => 'Penumpang berhasil dihapus.',
            ]
        ]);
    }
}
