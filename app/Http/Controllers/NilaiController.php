<?php

namespace App\Http\Controllers;

use App\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function lolos(Request $request)
    {
        $nilai = Nilai::all();
        return view('lolos',compact('nilai'));
    }

    public function tidak(Request $request)
    {
        $nilai = Nilai::all();
        return view('tidak',compact('nilai'));
    }
}
