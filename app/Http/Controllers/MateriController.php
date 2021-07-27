<?php

namespace App\Http\Controllers;

use App\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::all();
        return view('materi/materi',compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materi.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_materi'   => 'required',
            'deskripsi'     => 'required',
        ]);

        Materi::create([
            'nama_materi' => $request->nama_materi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('materi')->with('status','Data Materi Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materi = Materi::where('id',$id)->get();
        return view('materi/detail',compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materi = Materi::where('id',$id)->first();
        return view('materi/edit',compact('materi'));
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
        $request->validate([
            'nama_materi'   => 'required',
            'deskripsi'     => 'required',
        ]);

        Materi::findOrFail($id)->update([
            'nama_materi' => $request->nama_materi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('materi')->with('status','Data Materi Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materi::destroy($id);
        return redirect('materi')->with('status','Data Materi Berhasil Di Hapus');
    }
}
