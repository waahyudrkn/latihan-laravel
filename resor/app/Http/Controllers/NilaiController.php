<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\mapel;
use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('nilai')
        ->join('siswas', 'nilai.nis', '=', 'siswas.nis')
        ->join('mapel', 'nilai.kode_mapel', '=', 'mapel.kode_mapel')
        ->select('siswas.nis', 'siswas.nama_siswa', 'siswas.kelas', 'siswas.jurusan', 'mapel.kode_mapel', 'mapel.nama_mapel', 'nilai.nilai', 'nilai.id')
        ->orderBy('siswas.nama_siswa', 'desc')
        ->paginate(10);
            
           
    
        return view('nilai/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nilai/create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required',
            'kode_mapel' => 'required',
            'nilai' => 'required',
            
        ], [
            'nis.required' => 'nis harus diisi',
            'kode_mapel.required' => 'kode mapel harus diisi.',
            'kode_mapel.unique' => 'kode mapel Ini Sudah Terdaftar.',
            'nilai.required' => 'nilai harus diisi',
        ]);

        $data = new nilai();

        // DATA Mapel
        $data->nis = $request->input('nis');

        $data->kode_mapel = $request->input('kode_mapel');

        $data->nilai = $request->input('nilai');

        $data->save();
        return redirect('/nilai')->with('success', 'nilai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = nilai::find($id); // Mengambil data siswa berdasarkan ID

        if ($data) {
            return view('nilai.edit', compact('data')); // Tampilkan formulir pengeditan dengan data siswa
        } else {
            return redirect()->route('nilai.index')->with('error', 'Siswa tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nis' => 'required',
            'kode_mapel' => 'required',
            'nilai' => 'required',
            
        ], [
            'nis.required' => 'nis harus diisi',
            'kode_mapel.required' => 'kode mapel harus diisi.',
            'nilai.required' => 'nilai harus diisi',
        ]);

        $data = nilai::find($id);

        // DATA Mapel
        $data->nis = $request->input('nis');

        $data->kode_mapel = $request->input('kode_mapel');

        $data->nilai = $request->input('nilai');

        $data->save();
        return redirect('/nilai')->with('success', 'nilai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = nilai::where('id', $id)->first();

        $data->delete();
        return back()->with('success', ' data nilai berhasil dihapus'); 
    }
// function search nilai
//     public function search(Request $request)
// {
//     $search = $request->input('search');

//     // Lakukan logika pencarian sesuai kebutuhan
//     $data = DB::table('siswas')
//                 ->join('nilai', 'siswas.nis', '=', 'nilai.nis')
//                 ->join('mapel', 'nilai.kode_mapel', '=', 'mapel.kode_mapel')
//                 ->select('siswas.nis', 'siswas.nama_siswa', 'siswas.kelas', 'siswas.jurusan', 'siswas.jenis_kelamin', 'mapel.nama_mapel', 'nilai.id', 'nilai.nilai')
//                 ->where('siswas.nama_siswa', 'like', "%$search%")
//                 ->orWhere('siswas.jurusan', 'like', "%$search%")
//                 ->orWhere('siswas.kelas', 'like', "%$search%")
//                 ->orWhere('siswas.jenis_kelamin', 'like', "%$search%")
//                 ->orWhere('mapel.nama_mapel', 'like', "%$search%")
//                 ->orWhere('nilai.nilai', 'like', "%$search%")
//                 ->paginate(5);

//     return view('nilai.index', compact('data'));
// }

}
