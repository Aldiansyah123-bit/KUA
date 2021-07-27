<?php

namespace App\Http\Controllers;

use App\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hadir = Kehadiran::all();

        return view('kehadiran',compact('hadir'));
    }

    public function indexuser()
    {
        $hadir = Kehadiran::query();
        $hadir->when(auth()->user()->id, function($q){
            return $q->where('id_user',auth()->user()->id);
        });
        $hadir = $hadir->get();

        return view('kehadiran',compact('hadir'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kehadiran = new Kehadiran;
        $kehadiran->id_user = auth()->user()->id;
        $kehadiran->save();

        return redirect('kehadiran')->with('status','Anda Sudah Mendaftar Kehadiran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kehadiran::destroy($id);
        return redirect('kehadiran')->with('status','Daftar Kehadiran Dihapus');
    }
}
