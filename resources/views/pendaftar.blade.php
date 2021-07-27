@extends('layouts.backend')

@section('judul1')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
        <div class="col-sm-6">
            <h1 class="m-0">Pendaftar</h1>
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
                    <h3 class="card-title">Data Pendaftar</h3>
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
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>No Hp</th>
                                    <th>Foto</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($user as $item)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->temp_lahir }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->umur }}</td>
                                        <td>{{ $item->agama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->pendidikan }}</td>
                                        <td>{{ $item->pekerjaan }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td><img src="{{ asset('foto') }}/{{ $item->foto }}" width="100px"></td>
                                        <td class="text-center">
                                            <a href="/pendaftar/delete/{{ $item->id}}" type="button" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
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
<script type="text/javascript">
    $(document).ready(function(){
        var flash = "{{ Session::has('sukses') }}";
        if (flash) {
            var pesan = "{{ Session::get('sukses')}} "
            alert(pesan);
        }
        var gagal = "{{ Session::has('gagal') }}";
        if (gagal) {
            var pesan = "{{ Session::get('sukses')}} "
            swal("Error" ,pesan, "error");
        }
    })
</script>

@endsection

