@extends('layouts.admin.main_admin')
@section('link')
<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<style>
    .suggestions {
    display: none; /* Sembunyikan secara default */
    position: absolute;
    background-color: white;
    border: 1px solid #ddd;
    max-height: 200px;
    overflow-y: auto;
    width: 100%;
    z-index: 1000;
}
.suggestion-item {
    padding: 8px;
    cursor: pointer;
}
.suggestion-item:hover {
    background-color: #f0f0f0;
}
</style>
@endsection
@section('title')
    {{'Form Tambah Periode'}}
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
            <li class="breadcrumb-item">Databases</li>
            <li class="breadcrumb-item">Periode</li>
            <li class="breadcrumb-item active">Tambah</li>
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
            <h3 class="card-title">Form Tambah Periode</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/databases/proses_tambah_periode" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="periode" class="col-md-1 col-form-label text-md-right">Periode :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="periode" name="periode_aktif" placeholder="Masukkan Periode" required>
                        </div>
                    </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-right">Tambah</button>
                        </div>
                </form>
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

<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/plugins/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script>
    document.getElementById('nama_asal_sekolah').addEventListener('input', function () {
        let query = this.value;
        let suggestions = document.getElementById('suggestions');

        document.getElementById('id_asal_sekolah').value = '';

        if (query.length > 1) {
            fetch(`/get_asal_sekolah?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    suggestions.innerHTML = '';
                    
                    if (data.length > 0) {
                        data.forEach(asal_sekolah => {
                            let suggestion = document.createElement('div');
                            suggestion.textContent = asal_sekolah.nama_asal_sekolah;
                            suggestion.classList.add('suggestion-item');
                            suggestion.addEventListener('click', function () {
                                document.getElementById('nama_asal_sekolah').value = asal_sekolah.nama_asal_sekolah;
                                document.getElementById('id_asal_sekolah').value = asal_sekolah.id;
                                suggestions.innerHTML = '';
                                suggestions.style.display = 'none';
                            });
                            suggestions.appendChild(suggestion);
                        });
                        suggestions.style.display = 'block';
                    } else {
                        suggestions.style.display = 'none';
                    }
                });
        } else {
            suggestions.innerHTML = '';
            suggestions.style.display = 'none';
        }
    });
</script>
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script>
    @if (session()->has('success'))
        Swal.fire({
            title: "Sukses!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    @elseif (session()->has('error'))
        Swal.fire({
            title: "Maaf!",
            text: "{{ session('error') }}",
            icon: "error"
        });
    @endif
</script>
@endsection