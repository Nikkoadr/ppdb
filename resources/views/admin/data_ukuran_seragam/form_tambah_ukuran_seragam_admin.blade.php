@extends('layouts.admin.main_admin')
@section('link')
<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
            <li class="breadcrumb-item">Konsentrasi Keahlian</li>
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
            <h3 class="card-title">Form Tambah Konsentrasi Keahlian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/proses_isi_ukuran_seragam_{{$data->id}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama : </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" readonly>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/ukuran/ukuran_baju.png') }}" alt="">
                    <div class="form-group row">
                        <label for="ukuran_baju" class="col-sm-2 col-form-label">Ukuran baju : </label>
                        <div class="col-sm-10">
                            <select name="ukuran_baju" id="ukuran_baju" class="form-control">
                                <option value="">Pilih Ukuran</option>
                                <option value="S">S</option>
                                <option value="M">M</option>    
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/ukuran/ukuran_celana.png') }}" alt="">
                    <div class="form-group row">
                        <label for="ukuran_celana" class="col-sm-2 col-form-label">Ukuran Celana : </label>
                        <div class="col-sm-10">
                            <select name="ukuran_celana" id="ukuran_celana" class="form-control">
                                <option value="">Pilih Ukuran</option>
                                <option value="27">27</option>
                                <option value="28">28</option>    
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                            </select>
                        </div>
                    </div>
                    <img src="{{ asset('assets/img/ukuran/ukuran_sepatu.webp') }}" alt="">
                    <div class="form-group row">
                        <label for="ukuran_sepatu" class="col-sm-2 col-form-label">Ukuran Celana : </label>
                        <div class="col-sm-10">
                            <select name="ukuran_sepatu" id="ukuran_sepatu" class="form-control">
                                <option value="">Pilih Ukuran</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary float-right">Tambah</button>
                        </div>
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