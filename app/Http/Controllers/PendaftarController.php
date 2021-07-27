<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        // $user = User::query();
        // $user->when(auth()->user()->id, function($q){
        //     return $q->where('id',auth()->user()->id);
        // });
        // $user = $user->get();


        return view('pendaftar',compact('user'));
    }


    public function destroy($id)
    {
        User::destroy($id);

        return redirect('pendaftar')->with('status','Pendaftar Berhasil Di Hapus');
    }
}
