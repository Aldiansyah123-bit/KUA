@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header">Tambah Materi</div>
                      <div class="card-body">
                        <form action="/materi/create" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right">Nama Materi</label>
                                    <div class="col-md-6">
                                      <input type="text" name="nama_materi" class="form-control" placeholder="Nama Materi">
                                      <div class="text-danger">
                                          @error('nama_materi')
                                              {{$message}}
                                          @enderror
                                      </div>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Materi</label>
                                <div class="col-md-6">
                                  <textarea rows="10" name="deskripsi" class="form-control" placeholder="Materi"></textarea>
                                  <div class="text-danger">
                                      @error('deskripsi')
                                          {{$message}}
                                      @enderror
                                  </div>
                                </div>
                        </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/materi" class="btn btn-danger">Kembali</a>
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
