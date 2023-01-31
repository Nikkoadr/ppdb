@extends('layouts.admin.main_admin')
@section('link')
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">User Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                      src="{{ asset('assets/img/defaultpp.png') }}"
                      alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->nama }}</h3>

                <p class="text-muted text-center">{{ Auth::user()->nisn }}</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Status Calon Peserta Didik</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa-solid fa-check mr-1"></i></i>Verifikasi</strong>

                <p class="text-muted">
                  Verified
                </p>

                <hr>

                <strong><i class="fa-solid fa-check-double mr-1"></i></i>Daftar Ulang</strong>

                <p class="text-muted">
                  Sudah Daftar Ulang
                </p>

                <hr>

                <strong><i class="fa-solid fa-user-check mr-1"></i></i> Siap MPLS</strong>

                <p class="text-muted">Siap</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h3 style="text-align: center">Formulir Lengkap Calon Peserta Didik Baru</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="settings">
                    <form action="edit/profil/{{ Auth::user()->id }}" method="POST" class="form-horizontal">
                      @csrf
                      <div class="form-group row">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nisn" id="nisn" value="{{ Auth::user()->nisn }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" name="nama" class="form-control" id="nama" value="{{ Auth::user()->nama }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="sex" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <select type="text" class="form-control" name="sex" id="sex">
                            <option value="Laki - Laki" @if (Auth::user()->sex =="Laki - Laki") selected @endif>Laki - Laki</option>
                            <option value="Perempuan" @if (Auth::user()->sex =="Perempuan") selected @endif>Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3">{{ Auth::user()->alamat }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="ttl" class="col-sm-2 col-form-label">TTL</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="tempat_lahir" id="ttl" value="{{ Auth::user()->tempat_lahir }}">
                        </div>
                        <div class="col-sm-5">
                        <input type="date" class="form-control" name="tanggal_lahir" id="ttl" value="{{ Auth::user()->tanggal_lahir }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" value="{{ Auth::user()->asal_sekolah }}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_siswa" class="col-sm-2 col-form-label">Nomor HP Siswa</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="no_siswa" id="no_siswa" value="{{ Auth::user()->no_siswa }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_wali" class="col-sm-2 col-form-label">No HP Orang Tua</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="no_wali" id="no_wali" value="{{ Auth::user()->no_wali }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="keahlian" class="col-sm-2 col-form-label">Konsentrasi Keahlian</label>
                        <div class="col-sm-10">
                          <select type="text" class="form-control" name="keahlian" id="keahlian">
                            <option value="TPFL" @if (Auth::user()->keahlian =="TPFL") selected @endif>Teknik Pengelasan Dan Fabrikasi Logam ( TPFL )</option>
                            <option value="TKRO" @if (Auth::user()->keahlian =="TKRO") selected @endif>Teknik Kendaraan Ringan Otomotif( TKRO )</option>
                            <option value="TE" @if (Auth::user()->keahlian =="TE") selected @endif>Teknik Elektronika ( TE )</option>
                            <option value="TJKT" @if (Auth::user()->keahlian =="TJKT") selected @endif>Teknik Jaringan Komputer Dan Telekomunikasi ( TJKT )</option>
                            <option value="TBSM" @if (Auth::user()->keahlian =="TBSM") selected @endif>Teknik Dan Bisnis Sepeda Motor ( TBSM )</option>
                            <option value="TF" @if (Auth::user()->keahlian =="TF") selected @endif>Teknologi Farmasi ( TF )</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="referensi" class="col-sm-2 col-form-label">Referensi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="referensi" id="referensi" value="{{ Auth::user()->referensi }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" style="float: right" class="btn btn-info">Edit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
<script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
  @if (session()->has('success'))
    $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'success',
        title: '{{ session('success') }}'
      })
  });
  @endif
</script>
@endsection