@extends('layouts.admin.main_admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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
                <h3 class="card-title">Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-envelope-open-text mr-1"></i> Email</strong>

                <p class="text-muted">
                  {{ Auth::user()->email }}
                </p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Nomor HP</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Siswa: {{ Auth::user()->no_siswa }}</span><br>
                  <span class="tag tag-success">Orang tua: {{ Auth::user()->no_wali }}</span>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Asal Sekolah</strong>

                <p class="text-muted">{{ Auth::user()->asal_sekolah }}</p>

                <hr>

                <strong><i class="fa-solid fa-venus-mars mr-1"></i> Jenis Kelamin</strong>

                <p class="text-muted">{{ Auth::user()->sex }}</p>

                <hr>

                <strong><i class="fa-solid fa-cake-candles mr-1"></i> Tempat dan Tanggal Lahir</strong>

                <p class="text-muted">{{ Auth::user()->tempat_lahir }},{{ Auth::user()->tanggal_lahir }}</p>

                <hr>
                
                <strong><i class="fa-solid fa-landmark mr-1"></i> Konsentrasi Keahlian</strong>

                <p class="text-muted">{{ Auth::user()->keahlian }}</p>

                <hr>
                
                <strong><i class="fa-solid fa-asterisk mr-1"></i> Feferensi</strong>

                <p class="text-muted">{{ Auth::user()->referensi }}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Formulir Lanjutan</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" value="{{ Auth::user()->nisn }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="{{ Auth::user()->nama }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" value="{{ Auth::user()->sex }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="alamat" placeholder="{{ Auth::user()->alamat }}" ></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">TTL</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="inputSkills" value="{{ Auth::user()->tempat_lahir }}">
                        </div>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputSkills" value="{{ Auth::user()->tanggal_lahir }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="keahlian" class="col-sm-2 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="keahlian" {{ Auth::user()->asal_sekolah }}>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="keahlian" class="col-sm-2 col-form-label">Nomor HP Siswa</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="keahlian" value="{{ Auth::user()->no_siswa }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="keahlian" class="col-sm-2 col-form-label">No HP Orang Tua</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="keahlian" value="{{ Auth::user()->no_wali }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="keahlian" class="col-sm-2 col-form-label">Konsentrasi Keahlian</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="keahlian" value="{{ Auth::user()->keahlian }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="keahlian" class="col-sm-2 col-form-label">Referensi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="keahlian" value="{{ Auth::user()->referensi }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
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
