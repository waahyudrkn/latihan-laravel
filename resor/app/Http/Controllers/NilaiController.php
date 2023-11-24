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
   /**
 * Display a listing of the resource.
 */
public function index(Request $request)
{
    $this->authorize('viewAny', Nilai::class);

    $orderBy = $request->input('order_by', 'siswas.nama_siswa');
    $orderDirection = $request->input('order_direction', 'asc');

    $data = DB::table('nilai')
        ->join('siswas', 'nilai.nis', '=', 'siswas.nis')
        ->join('mapel', 'nilai.kode_mapel', '=', 'mapel.kode_mapel')
        ->select('siswas.nis', 'siswas.nama_siswa', 'siswas.kelas', 'siswas.jurusan', 'mapel.kode_mapel', 'mapel.nama_mapel', 'nilai.nilai', 'nilai.id')
        ->orderBy($orderBy, $orderDirection)
        ->paginate(10);

    return view('nilai/index')->with('data', $data);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Nilai::class);

        $mapel = Mapel::all();


        return view('nilai/create', compact('mapel'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|exists:siswas,nis',
            'kode_mapel' => 'required|exists:mapel,kode_mapel',
            'nilai' => 'required|numeric|max:100',
            
        ], [
            'nis.required' => 'nis harus diisi',
            'nis.exists' => 'NIS tidak ditemukan dalam database siswa.',
            'kode_mapel.exists' => 'kode mapel tidak ditemukan dalam database siswa.',
            'kode_mapel.required' => 'kode mapel harus diisi.',
            'kode_mapel.unique' => 'kode mapel Ini Sudah Terdaftar.',
            'nilai.required' => 'nilai harus diisi',
            'nilai.max' => 'nilai tidak bisa melebihi 100',
        ]);

        $data = new Nilai();

        $this->authorize('create', Nilai::class);

        // DATA Mapel
        $data->nis = $request->input('nis');

        $data->kode_mapel = $request->input('kode_mapel');

        $data->nilai = $request->input('nilai');

        $notif = [
            'message' =>  'Nilai Berhasil Ditambahkan',
            'alert-type' => 'success'
        ];

        $data->save();
        return redirect('/nilai')->with($notif);
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
        $mapel = Mapel::all();

        $data = Nilai::find($id); // Mengambil data siswa berdasarkan ID

        $this->authorize('update', Nilai::class);

        if ($data) {
            return view('nilai.edit', compact('data','mapel')); // Tampilkan formulir pengeditan dengan data siswa
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

        $data = Nilai::find($id);

        $this->authorize('update', Nilai::class);

        // DATA Mapel
        $data->nis = $request->input('nis');

        $data->kode_mapel = $request->input('kode_mapel');

        $data->nilai = $request->input('nilai');

        $notif = [
            'message' =>  'Nilai Berhasil Diedit',
            'alert-type' => 'success'
        ];

        $data->save();
        return redirect('/nilai')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = nilai::where('id', $id)->first();

        $this->authorize('delete', Nilai::class);

        $notif = [
            'message' =>  'Nilai Berhasil Dihapus',
            'alert-type' => 'success'
        ];

        $data->delete();
        return back()->with($notif); 
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
