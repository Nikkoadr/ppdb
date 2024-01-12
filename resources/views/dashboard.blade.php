@extends('layouts.admin.main_admin')
@section('title')
  {{'Dashboard PPDB'}}
@endsection
@section('link')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('preloader')
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{ asset('assets/img/logo.png') }}" alt="AdminLTELogo" height="80" width="60">
</div>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
        <div class="row">
          @can('isadmin')
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $data_ppdb }}</h3>

                <p>Jumlah Siswa Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="data_ppdb" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $keahlian_tpfl }}</h3>
                <p>Siswa Baru TPL</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-flame"></i>
              </div>
              <a href="data_ppdb" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $keahlian_tkro }}</h3>
                <p>Siswa Baru TKR</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
              <a href="data_ppdb" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div style="background: #fd7e14" class="small-box">
              <div class="inner">
                <h3>{{ $keahlian_tei }}</h3>
                <p>Siswa Baru TEI</p>
              </div>
              <div class="icon">
                <i class="ion ion-flash"></i>
              </div>
              <a href="data_ppdb" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $tkjmin1 }}</h3>
                <p>Siswa Baru TKJ</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-globe"></i>
              </div>
              <a href="data_ppdb" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{ $keahlian_tsm }}</h3>
                <p>Siswa Baru TSM</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-bicycle"></i>
              </div>
              <a href="data_ppdb" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $keahlian_fkk }}</h3>
                <p>Siswa Baru FKK</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-medical"></i>
              </div>
              <a href="data_ppdb" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $daftar_ulang_min1 }}</h3>
                <p>Siswa Sudah Daftar Ulang</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-done"></i>
              </div>
              <a href="data_ppdb" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endcan
          @can('isuser')
          <div class="container py-5">
              <div style="background: rgba(128, 128, 128, 0.158); border-radius: 10px;" class="row p-5">
                  <div class="wow slideInUp" data-wow-delay="0.3s">
                      <h1 style="text-align: center">Terima Kasih</h1>
                      <h4 style="text-align: center">Telah mendaftarkan diri anda ke SMK Muhammadiyah Kandanghaur</h4>
                      <h4 style="text-align: center">Untuk informasi selanjutnya bisa bergabung ke grup WhatsApp PPDB SMK Muhammadiyah Kandanghaur.</h4>
                      <h4 style="text-align: center">untuk bergabung ke grup WhatsApp bisa <a href="https://chat.whatsapp.com/BFETl63iJTD2LTsm6lJMCv">Klik Disini</a>.</h4>
                      <h4 style="text-align: center">atau bisa scan barcode di bawah ini</h4>
                      <p style="text-align: center;"><img class="text-center" src="{{ asset('assets/img/barcode_grup_wa.gif') }}" alt="Barcode PPDB" width="150"></p>
                      <h4 style="text-align: center">Untuk melihat profil anda Bisa klik : <a href="/profile">Profile</a> atau klik di nama anda</h4>
                  </div>
              </div>
          </div>
          @endcan
          {{-- <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>awas beracun</p>
              </div>
              <div class="icon">
                <i class="ion ion-nuclear"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat lebih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col --> --}}
        </div>
</div>

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
@endsection