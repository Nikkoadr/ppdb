@extends('layouts.admin.main_admin')
@section('title')
  {{'Dashboard PPDB'}}
@endsection
@section('link')
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection
@section('preloader')
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{ asset('assets/img/logo.png') }}" alt="AdminLTELogo" height="80" width="60">
</div>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $las }}</h3>

                <p>LAS</p>
              </div>
              <div class="icon">
                <i class="ion ion-nuclear"></i>
              </div>
              <a href="/data_pendaftaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div style="background: orange" class="small-box">
              <div class="inner">
                <h3>{{ $tei }}</sup></h3>

                <p>TEI</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-lightbulb"></i>
              </div>
              <a href="/data_pendaftaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $tkr }}</h3>
                <p>TKR</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
              <a href="/data_pendaftaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $tkj }}</h3>
                <p>TKJ</p>
              </div>
              <div class="icon">
                <i class="ion ion-wifi"></i>
              </div>
              <a href="/data_pendaftaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div style="background-color: tomato" class="small-box">
              <div class="inner">
                <h3>{{ $tsm }}</h3>
                <p>TSM</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-bicycle"></i>
              </div>
              <a href="/data_pendaftaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div style="background-color: aqua" class="small-box">
              <div class="inner">
                <h3>{{ $fkk }}</h3>
                <p>FKK</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-medical"></i>
              </div>
              <a href="/data_pendaftaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div style="background: slategrey" class="small-box">
              <div class="inner">
                <h3>{{ $jumlah_pendaftaran }}</h3>
                <p>Jumlah Pendaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div style="background: green" class="small-box">
              <div class="inner">
                <h3>{{ $jumlah_daftar_ulang }}</h3>
                <p>Jumlah Daftar Ulang</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <table class="table table-bordered table-striped" >
        <thead>
          <tr>
            <th>Asal Sekolah</th>
            <th>Tidak Terverifikasi</th>
            <th>Sudah Terverifikasi</th>
            <th>Sudah Daftar Ulang</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
        @foreach($pendaftaran as $data)
            <tr>
                <td>{{ $data->nama_asal_sekolah }}</td>
                <td>{{ $data->tidak_terverifikasi }}</td>
                <td>{{ $data->sudah_terverifikasi }}</td>
                <td>{{ $data->sudah_daftar_ulang }}</td>
                <td>{{ $data->total_pendaftaran_by_sekolah }}</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </section>
  </div>
@endsection