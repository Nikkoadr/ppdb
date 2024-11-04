@extends('layouts.admin.main_admin')
@section('link')
<!-- DataTables -->
<link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

@endsection
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data PPDB</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Data PPDB</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Peserta Didik Baru</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="table_ppdb" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center">
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>TTL</th>
                <th>Asal Sekolah</th>
                <th>Kontak</th>
                <th>Konsentrasi Keahlian</th>
                <th>Status</th>
                <th data-orderable="false">Menu</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaran as $pendaftar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pendaftar -> nisn }}</td>
                        <td>{{ $pendaftar -> nama }}</td>
                        <td>{{ $pendaftar -> nama_jenis_kelamin }}</td>
                        <td>{{ $pendaftar -> tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar -> tanggal_lahir)->translatedFormat('d F Y') }}</td>
                        <td>{{ $pendaftar -> nama_asal_sekolah }}</td>    
                        <td>{{ $pendaftar -> no_siswa }}</td>
                        <td>{{ $pendaftar -> nama_konsentrasi_keahlian }}</td>
                        <td>{{ $pendaftar -> nama_status_siswa }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">Detail</a>
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
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
@section('script')
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
@endsection