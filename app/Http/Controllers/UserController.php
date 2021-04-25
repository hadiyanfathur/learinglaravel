<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('user.index', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $petuga)
    {
        if($petuga->level == 0)
            return redirect(url("/petugas"))->with(["message"=>"proccess fail: Administrator tidak bisa dihapus"]);

        if ($petuga->delete())
            return redirect(url("/petugas"))->with(["message"=>"Success: Data berhasil disimpan"]);

        return redirect(url("/petugas"))->with(["message"=>"proccess fail: Data gagal disimpan"]);
    }
}
