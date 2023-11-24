<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\mapel;
use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
    

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show all
        // $data = siswa::all();
        $this->authorize('viewAny', Siswa::class);


        $data = DB::table('siswas')->orderBy('kelas', 'asc')->orderBy('jurusan', 'asc')->paginate(5);
                return view('siswa/index', compact('data'));

        // $data = DB::table('siswas')->orderBy('created_at', 'desc')->paginate(5);
        // $data = DB::table('siswas')
        //     ->join('mapel', 'siswas.nis', '=', 'mapel.nis')
        //     ->join('nilai', 'siswas.nis', '=', 'nilai.nis')
        //     ->select('siswas.*', 'mapel.nama_mapel', 'nilai.nilai')
        //     ->orderBy('mapel.nama_mapel', 'desc')
        //     ->paginate(5);
           
    
        // return view('siswa/index')->with('data', $data);

    //     $data = DB::table('siswas')
    //     ->join('mapel', 'siswas.nis', '=', 'mapel.nis')
    //     ->select('siswas.*', 'mapel.nama_mapel')
    //     ->orderBy('mapel.nama_mapel', 'desc')  // Sesuaikan dengan nama tabel yang sesuai
    //     ->paginate(5);

    // return view('siswa/index')->with('data', $data);

    }

  
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Siswa::class);

        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nis' => 'required|unique:siswas|numeric|regex:/^\d{12}$/',
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
            'foto'=>'mimes:jpeg,jpg,png,gif',
            'dokumen'=>'mimes:pdf,docx'
        ], [
            'nis.required' => 'NIS harus diisi.',
            'nis.unique' => 'NIS Ini Sudah Terdaftar.',
            'nis.regex' => 'NIS harus memiliki 12 karakter.',
            'nis.numeric' => 'NIS harus berisi angka.',
            'nama_siswa.required' => 'nama siswa harus diisi.',
            'kelas.required' => 'kelas harus diisi.',
            'jurusan.required' => 'jurusan harus diisi.',
            'jenis_kelamin.required' => 'jenis kelamin harus diisi.',
            'foto.mimes'=>'Foto Hanya Bisa Berekstensi jpeg,jpg,png,gif',
            'dokumen.mimes'=>'Dokumen Hanya Bisa Berekstensi pdf,docx'
        ]);

        $data = new siswa();

        // DATA SISWA
        $data->nis = $request->input('nis');

        $data->nama_siswa = $request->input('nama_siswa');

        $data->kelas = $request->input('kelas');

        $data->jurusan = $request->input('jurusan');

        $data->jenis_kelamin = $request->input('jenis_kelamin');


        

        // FOTO
        if ($request->hasfile('foto')) {
            
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            $nama_foto = time() . ',' . $ext;
            $foto->move(public_path('foto') , $nama_foto);

            $data->foto = $nama_foto;
            
        } else {
            // Menetapkan foto default jika tidak ada file yang diunggah
            $data->foto = 'default.jpg';

        }
        
        // DOKUMEN
        if ($request->hasfile('dokumen')) {
            
            $dokumen = $request->file('dokumen');
            $ext = $dokumen->getClientOriginalExtension();
            $nama_dokumen = time() . ',' . $ext;
            $dokumen->move(public_path('dokumen') , $nama_dokumen);

            $data->dokumen = $nama_dokumen;
        }   else {
            // Menetapkan foto default jika tidak ada file yang diunggah
            $data->dokumen = 'default.pdf';

        }

        $notif = [
            'message' => $data->nama_siswa . ' Berhasil Ditambahkan',
            'alert-type' => 'success'
        ];

        $data->save();
        return redirect('siswa')->with($notif);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {

        $this->authorize('view', Siswa::class);

        $data = Siswa::find($nis);

        $notif = [
            'message' => 'Siswa Tidak ditemukan',
            'alert-type' => 'error'
        ];

        if ($data) {
            return view('siswa.show', compact('data'));
        } else {
            return redirect()->route('siswa.index')->with($notif);
        }

            // show dengan nilai
            // $data = Siswa::with('nilai')->find($nis);

            // $nilai = Nilai::where('nis', $nis)->get();

            // return view('siswa.show', compact('data', 'nilai'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nis)
    {
        $data = Siswa::find($nis); // Mengambil data siswa berdasarkan nis

        $this->authorize('update', Siswa::class);

        if ($data) {
            return view('siswa.edit', compact('data')); // Tampilkan formulir pengeditan dengan data siswa
        } else {
            return redirect()->route('siswa')->with('error', 'Siswa tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nis)
{
    // validasi data
    $validated = $request->validate([
        'nis' => 'required|numeric|regex:/^\d{12}$/',
        'nama_siswa' => 'required',
        'kelas' => 'required',
        'jurusan' => 'required',
        'jenis_kelamin' => 'required',
        'foto' => 'mimes:jpeg,jpg,png,gif',
        'dokumen' => 'mimes:pdf,docx'
    ], [
        'nis.required' => 'NIS harus diisi.',
        'nis.regex' => 'NIS harus memiliki 12 karakter.',
        'nis.numeric' => 'NIS harus berisi angka.',
        'nama_siswa.required' => 'Nama siswa harus diisi.',
        'kelas.required' => 'Kelas harus diisi.',
        'jurusan.required' => 'Jurusan harus diisi.',
        'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
        'foto.mimes' => 'Foto hanya bisa berekstensi jpeg, jpg, png, gif',
        'dokumen.mimes' => 'Dokumen hanya bisa berekstensi pdf, docx'
    ]);

    // Temukan data siswa berdasarkan NIS
    $data = Siswa::find($nis);

    // Otorisasi update
    $this->authorize('update', Siswa::class);

    // Set data siswa dengan nilai dari request
    $data->nis = $request->input('nis');
    $data->nama_siswa = $request->input('nama_siswa');
    $data->kelas = $request->input('kelas');
    $data->jurusan = $request->input('jurusan');
    $data->jenis_kelamin = $request->input('jenis_kelamin');

    // FOTO
    if ($request->hasFile('foto')) {
        $fotoBaru = $request->file('foto');
        $ext = $fotoBaru->getClientOriginalExtension();
        $namaFotoBaru = time() . '.' . $ext;

        $pathBerkasLama = public_path('foto/' . $data->foto);
        $fotoBaru->move(public_path('foto'), $namaFotoBaru);

        if (file_exists($pathBerkasLama)) {
            unlink($pathBerkasLama);
        }

        $data->foto = $namaFotoBaru;
    } else {
        $data->foto = 'default.jpg';
    }

    // DOKUMEN
    if ($request->hasFile('dokumen')) {
        $dokumenBaru = $request->file('dokumen');
        $ext = $dokumenBaru->getClientOriginalExtension();
        $namadokumenBaru = time() . '.' . $ext;

        $pathBerkasLama = public_path('dokumen/' . $data->dokumen);
        $dokumenBaru->move(public_path('dokumen'), $namadokumenBaru);

        if (file_exists($pathBerkasLama)) {
            unlink($pathBerkasLama);
        }

        $data->dokumen = $namadokumenBaru;
    } else {
        $data->dokumen = 'default.pdf';
    }

    // Cek nilai request setelah proses upload

    // Simpan perubahan
    $data->save();

    // Redirect ke halaman siswa dengan pesan notifikasi
    $notif = [
        'message' => $data->nama_siswa .' Berhasil Diedit',
        'alert-type' => 'success'
    ];

    return redirect('siswa')->with($notif);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {

        $data = siswa::where('nis', $nis)->first();

        $this->authorize('delete', Siswa::class);
    
        // menghapus foto dari direktori kecuali default.png
        if ($data->foto !== 'default.jpg') {
            File::delete(public_path('foto').'/'.$data->foto);
        }
        
        // menghapus dokumen dari direktori kecuali default.pdf
        if ($data->dokumen !== 'default.pdf') {
            File::delete(public_path('dokumen').'/'.$data->dokumen);
        }
        
        $notif = [
            'message' => $data->nama_siswa . ' Berhasil Dihapus',
            'alert-type' => 'success'
        ];

        $data->delete();
        return back()->with($notif);
    }
    
    // app/Http/Controllers/SiswaController.php
public function search(Request $request)
{
    $search = $request->input('search');

    // Lakukan logika pencarian sesuai kebutuhan
    $data = Siswa::where('nama_siswa', 'like', "%$search%")
                  ->orWhere('jurusan', 'like', "%$search%")
                  ->orWhere('kelas', 'like', "%$search%")
                  ->orWhere('jenis_kelamin', 'like', "%$search%")
                  ->paginate(5);

    return view('siswa.index', compact('data'));
}


}
