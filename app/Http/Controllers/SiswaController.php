<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::paginate(10);
        return view('siswa.index', ['siswa' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', ['kelas'=> $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|unique:siswa|max:10',
            'password' => 'required|min:6',
        ]);

        $siswa = Siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
        ]);

        if($siswa->save()){
            flash('Success: Data berhasil disimpan')->success();
            return redirect(url("/siswa"));
        }
        flash('Process Fail: Data gagal disimpan')->error();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('siswa.edit', ['kelas' => $kelas, 'siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa = $siswa->update($request->all());
        if($siswa){
            flash('Success: Data berhasil disimpan')->success();
            return redirect(url("/siswa"));
        }
        flash('Process Fail: Data gagal disimpan')->error();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        if ($siswa->delete()){
            flash('Success: Data berhasil dihapus')->success();
            return redirect(url("/siswa"));
        }
        flash('proccess fail: Data gagal dihapus')->error();
        return redirect(url("/siswa"));
    }

    public function dashboard()
    {
        $pembayaran = Pembayaran::where('siswa_id', Auth::user()->id)
                        ->orderByDesc('tanggal')->get();
        return view('siswa.home', ['pembayaran' => $pembayaran]);
    }
}
