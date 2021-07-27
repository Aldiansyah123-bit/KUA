<?php

namespace App\Http\Controllers;

use App\Kehadiran;
use App\Materi;
use App\User;
use App\Ujian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::query();
        $user->when(auth()->user()->id, function($q){
            return $q->where('id',auth()->user()->id);
        });
        $user = $user->get();
        $daftar = User::count();
        $hadir = Kehadiran::count();
        $materi= Materi::count();
        $ujian = Ujian::count();

        return view('home',compact('user','daftar','hadir','materi','ujian'));
    }
}
