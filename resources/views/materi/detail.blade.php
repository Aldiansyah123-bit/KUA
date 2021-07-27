@extends('layouts.backend')


@section('judul1')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0">Detail Materi</h1>
        </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <!-- /.card-header -->

                @foreach ($materi as $item)
                <div class="card-header">
                    <h2 class="card-title">Detail Materi : {{$item->nama_materi}}</h2>
                    <div class="card-tools">
                        <a href="/materi" type="button" class="btn btn-secondary btn-sm btn-flat">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                <!-- /.card-tools -->
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                                 <center><b><h2>{{$item->nama_materi}}</h2></b></center><br>
                                <p class="text-justify">{{$item->deskripsi}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
         <!-- /.card -->
        </div>
    </div>
</div>

        <script>
            $(function () {
              $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
              });
              $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
              });
            });
        </script>

@endsection
