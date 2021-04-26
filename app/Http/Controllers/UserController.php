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
        if($petuga->level == 0){
            flash('proccess fail: Administrator tidak bisa dihapus')->error();
            return redirect(url("/petugas"));
        }

        if ($petuga->delete()){
            flash('Success: Data berhasil dihapus')->success();
            return redirect(url("/petugas"));
        }

        flash('Success: Data berhasil dihapus')->error();
        return redirect(url("/petugas"));
    }
}
