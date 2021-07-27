@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                  <div class="card-header">Tambah Materi</div>
                      <div class="card-body">
                        <form action="/ujian/create" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right">Soal</label>
                                    <div class="col-md-6">
                                      <input type="text" name="soal" class="form-control" placeholder="Masukkan Soal">
                                      <div class="text-danger">
                                          @error('soal')
                                              {{$message}}
                                          @enderror
                                      </div>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Jawaban A</label>
                                <div class="col-md-6">
                                  <input type="text" name="a" class="form-control" placeholder="Masukkan Jawaban A">
                                  <div class="text-danger">
                                      @error('a')
                                          {{$message}}
                                      @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Jawaban B</label>
                                <div class="col-md-6">
                                  <input type="text" name="b" class="form-control" placeholder="Masukkan Jawaban B">
                                  <div class="text-danger">
                                      @error('b')
                                          {{$message}}
                                      @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Jawaban C</label>
                                <div class="col-md-6">
                                  <input type="text" name="c" class="form-control" placeholder="Masukkan Jawaban C">
                                  <div class="text-danger">
                                      @error('c')
                                          {{$message}}
                                      @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Jawaban D</label>
                                <div class="col-md-6">
                                  <input type="text" name="d" class="form-control" placeholder="Masukkan Jawaban D">
                                  <div class="text-danger">
                                      @error('d')
                                          {{$message}}
                                      @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Kunci Jawaban</label>
                                    <div class="col-sm-6">
                                        <select name="kunci_jawaban" class="form-control">
                                            <option value="">--Pilih Kunci Jawaban--</option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        </select>
                                        <div class="text-danger">
                                            @error('kunci_jawaban')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/ujian" class="btn btn-danger">Kembali</a>
                                </div>
                          </div>
                        </form>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
