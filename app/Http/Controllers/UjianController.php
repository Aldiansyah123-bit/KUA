<?php

namespace App\Http\Controllers;

use App\Http\Resources\Ujian as ResourcesUjian;
use App\Nilai;
use App\Ujian;
use App\User;
use Illuminate\Http\Request;
use PDF;

class UjianController extends Controller
{
    public function __construct()
    {
        $this->Ujian = new Ujian();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ujian = Ujian::all();
        return view('ujian/index',compact('ujian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function soal()
    {
        $ujian = Ujian::all();
        return view('soal',compact('ujian'));
    }

    // public function getSoal()
    // {


    //     $dat = $data->map(function ($data) {
    //         return [
    //             'question' => $data->soal,
    //             'answer' => $data->kunci_jawaban,
    //             'options'   => [
    //                 [
    //                     $data->a,
    //                     $data->b,
    //                     $data->c,
    //                     $data->d,
    //                 ],
    //             ],
    //         ];
    //     });
    //     return response()->json([
    //         'data' => $dat
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('ujian/add');
    }
    public function create(Request $request)
    {
        $request->validate([
            'soal'          => 'required',
            'a'             => 'required',
            'b'             => 'required',
            'c'             => 'required',
            'd'             => 'required',
            'kunci_jawaban' => 'required',
        ]);
        Ujian::create([
            'soal'          => $request->soal,
            'a'             => $request->soal,
            'b'             => $request->soal,
            'c'             => $request->soal,
            'd'             => $request->soal,
            'kunci_jawaban' => $request->kunci_jawaban,
        ]);

        return redirect('ujian')->with('status','Data soal berhasil di Tambahkan');
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
        $ujian = Ujian::where('id',$id)->first();
        return view('ujian/edit',compact('ujian'));
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
            'soal'          => 'required',
            'a'             => 'required',
            'b'             => 'required',
            'c'             => 'required',
            'd'             => 'required',
            'kunci_jawaban' => 'required',
        ]);

        Ujian::findOrFail($id)->update([
            'soal'          => $request->soal,
            'a'             => $request->soal,
            'b'             => $request->soal,
            'c'             => $request->soal,
            'd'             => $request->soal,
            'kunci_jawaban' => $request->kunci_jawaban,
        ]);
        return redirect('ujian')->with('status','Data soal berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ujian::destroy($id);
        return redirect('ujian')->with('status','Data soal berhasil di Hapus');
    }

    public function laporanPDF()
    {
            $nilai = Nilai::all();
            $user = User::query();
            $user->when(auth()->user()->id, function($q){
                return $q->where('id',auth()->user()->id);
            });
            $user = $user->get();
            $pdf       = PDF::loadview('sertifikat',compact('user','nilai'))->setPaper('a4','landscape');
        return $pdf->stream();
    }
}
