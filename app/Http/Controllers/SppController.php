<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::paginate(10);
        return view('spp.index', ['spp' => $spp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spp = Spp::create($request->all());
        if($spp->save()){
            flash('Success: Data berhasil disimpan')->success();
            return redirect(url("/spp"));
        }
        flash('Process Fail: Data gagal disimpan')->error();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(spp $spp)
    {
        return view('spp.edit', ['spp' => $spp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(spp $spp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, spp $spp)
    {
        if($spp->update($request->all())){
            flash('Success: Data berhasil disimpan')->success();
            return redirect(url("/spp"));
        }
        flash('Process Fail: Data gagal disimpan')->error();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy(spp $spp)
    {
        if ($spp->delete()){
            flash('Success: Data berhasil dihapus')->success();
            return redirect(url("/spp"));
        }

        flash('proccess fail: Data gagal dihapus')->error();
        return redirect(url("/spp"));
    }
}
