@extends('layouts.backend')

@section('judul1')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0">Materi</h1>
        </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Kehadiran</h3>
                    @if (auth()->user()->level=='user')
                        <div class="card-tools">
                            <a href="kehadiran/add" type="button" class="btn btn-primary btn-sm btn-flat">
                                <i class="fa fa-plus"></i>Klik Untuk Hadir
                            </a>
                        </div>
                    @endif
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> {{session('status')}}</h5>
                        </div>
                    @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30px" class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    @if (auth()->user()->level=='admin')
                                        <th class="text-center">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($hadir as $item)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        @if (auth()->user()->level=='admin')
                                            <td class="text-center">
                                                <a href="kehadiran/delete/{{ $item->id}}" type="button" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <!-- /.card-body -->
            </div>
         <!-- /.card -->
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

