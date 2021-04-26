<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::paginate(10);
        return view('kelas.index', ['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = Kelas::create($request->all());
        if($kelas->save()){
            flash('Success: Data berhasil disimpan')->success();
            return redirect(url("/kelas"));
        }
        flash('Process Fail: Data gagal disimpan')->error();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kela)
    {
        return view('kelas.edit', ['kelas' => $kela]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        dd($kelas);
        return view('kelas.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        $kela = $kela->update($request->all());
        if($kela){
            flash('Success: Data berhasil disimpan')->success();
            return redirect(url("/kelas"));
        }
        flash('Process Fail: Data gagal disimpan')->error();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        if ($kela->delete()){
            flash('Success: Data berhasil dihapus')->success();
            return redirect(url("/kelas"));
        }
        flash('Proccess fail: Data gagal dihapus')->error();
        return redirect(url("/kelas"));
    }
}
