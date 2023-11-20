<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\mapel;
use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = DB::table('mapel')->orderBy('created_at', 'desc')->paginate(5);
        return view('mapel/index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapel/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required|unique:mapel',
            'nama_mapel' => 'required',
            
        ], [
            'kode_mapel.required' => 'kode mapel harus diisi.',
            'kode_mapel.unique' => 'kode mapel Ini Sudah Terdaftar.',
            'nama_mapel.required' => 'nama mapel harus diisi',
        ]);

        $data = new mapel();

        // DATA Mapel
        $data->kode_mapel = $request->input('kode_mapel');

        $data->nama_mapel = $request->input('nama_mapel');


        $data->save();
        return redirect('/mapel')->with('success', $data->nama_mapel .' berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_mapel)
    {
        $data = mapel::find($kode_mapel); // Mengambil data siswa berdasarkan ID

        if ($data) {
            return view('mapel.edit', compact('data')); // Tampilkan formulir pengeditan dengan data siswa
        } else {
            return redirect()->route('mapel.index')->with('error', 'Siswa tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_mapel)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            
        ], [
            'kode_mapel.required' => 'kode mapel harus diisi.',
            'nama_mapel.required' => 'nama mapel harus diisi',
        ]);

        $data = mapel::find($kode_mapel);

        // DATA Mapel
        $data->kode_mapel = $request->input('kode_mapel');

        $data->nama_mapel = $request->input('nama_mapel');


        $data->save();
        return redirect('/mapel')->with('success', $data->nama_mapel .' berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_mapel)
    {
        $data = mapel::where('kode_mapel', $kode_mapel)->first();

        $data->delete();
        return back()->with('success',  $data->nama_mapel .' berhasil dihapus');

    }
}
