@extends('layouts.admin.main_admin')
@section('title')
  {{'Profile PPDB'}}
@endsection
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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Profile peserta didik baru</li>
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
                <p class="text-muted text-center">{{ Auth::user()->email }}</p>
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
                  {{ Auth::user()->verifikasi }}
                </p>
                <hr>
                <strong><i class="fa-solid fa-check-double mr-1"></i></i>Daftar Ulang</strong>
                <p class="text-muted">
                  {{ Auth::user()->daftar_ulang }}
                </p>
                <hr>
                <strong><i class="fa-solid fa-user-check mr-1"></i></i> Siap MPLS</strong>
                <p class="text-muted">
                  {{ Auth::user()->status_mpls }}
                </p>
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
                  <li class="nav-item"><a class="nav-link active" href="#data_diri" data-toggle="tab">Data diri</a></li>
                  @if (Auth::user()-> daftar_ulang =='Sudah Daftar Ulang')
                    <li class="nav-item"><a class="nav-link" href="#dokumen" data-toggle="tab">Dokumen</a></li>
                  @endif
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="data_diri">
                    <form action="edit/profile/{{ Auth::user()->id }}" method="POST" class="form-horizontal">
                      @method('put')
                      @csrf
                      <div class="form-group row">
                        <label for="nisn" class="col-sm-3 col-form-label">NISN :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" value="{{ Auth::user()->nisn }}">
                        @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
                        <div class="col-sm-9">
                          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ Auth::user()->nama }}">
                        @error('nama')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="sex" class="col-sm-3 col-form-label">Jenis Kelamin :</label>
                        <div class="col-sm-9">
                          <select type="text" class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                            <option value="Laki - Laki" @if (Auth::user()->sex =="Laki - Laki") selected @endif>Laki - Laki</option>
                            <option value="Perempuan" @if (Auth::user()->sex =="Perempuan") selected @endif>Perempuan</option>
                          </select>
                          @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-12 col-form-label">Alamat :</label>
                        <label for="alamat" class="col-sm-3 col-form-label">- Blok / RT / RW </label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control @error('blok') is-invalid @enderror" name="blok" id="blok" value="{{ Auth::user()->blok }}">
                          @error('blok')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                        </div>
                        <div class="col-sm-2">
                          <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" value="{{ Auth::user()->rt }}">
                          @error('rt')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw" id="rw" value="{{ Auth::user()->rw }}">
                          @error('rw')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <label for="alamat" class="col-sm-3 col-form-label">- Desa</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('desa') is-invalid @enderror" name="desa" id="desa" value="{{ Auth::user()->desa }}">
                          @error('desa')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <label for="alamat" class="col-sm-3 col-form-label">- Kecamatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" value="{{ Auth::user()->kecamatan }}">
                          @error('kecamatan')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <label for="alamat" class="col-sm-3 col-form-label">- Kabupaten</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten" value="{{ Auth::user()->kabupaten }}">
                          @error('kabupaten')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="ttl" class="col-sm-3 col-form-label">Tempat,  Tanggal Lahir :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="ttl" value="{{ Auth::user()->tempat_lahir }}">
                        @error('tempat_lahir')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                        <div class="col-sm-5">
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="ttl" value="{{ Auth::user()->tanggal_lahir }}">
                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror  
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="asal_sekolah" class="col-sm-3 col-form-label">Asal Sekolah :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" id="asal_sekolah" value="{{ Auth::user()->asal_sekolah }}" >
                        @error('asal_sekolah')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_siswa" class="col-sm-3 col-form-label">Nomor HP Siswa :</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control @error('no_siswa') is-invalid @enderror" name="no_siswa" id="no_siswa" value="{{ Auth::user()->no_siswa }}">
                        @error('no_siswa')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_wali" class="col-sm-3 col-form-label">No HP Orang Tua :</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control @error('no_wali') is-invalid @enderror" name="no_wali" id="no_wali" value="{{ Auth::user()->no_wali }}">
                        @error('no_wali')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="keahlian" class="col-sm-3 col-form-label">Program Keahlian :</label>
                        <div class="col-sm-9">
                          <select type="text" class="form-control @error('keahlian') is-invalid @enderror" name="keahlian" id="keahlian">
                            <option value="TPFL" @if (Auth::user()->keahlian =="TPFL") selected @endif>Teknik Pengelasan Dan Fabrikasi Logam ( TPFL )</option>
                            <option value="TKRO" @if (Auth::user()->keahlian =="TKRO") selected @endif>Teknik Kendaraan Ringan Otomotif( TKRO )</option>
                            <option value="TE" @if (Auth::user()->keahlian =="TE") selected @endif>Teknik Elektronika ( TE )</option>
                            <option value="TJKT" @if (Auth::user()->keahlian =="TJKT") selected @endif>Teknik Jaringan Komputer Dan Telekomunikasi ( TJKT )</option>
                            <option value="TBSM" @if (Auth::user()->keahlian =="TBSM") selected @endif>Teknik Dan Bisnis Sepeda Motor ( TBSM )</option>
                            <option value="TF" @if (Auth::user()->keahlian =="TF") selected @endif>Teknologi Farmasi ( TF )</option>
                          </select>
                        @error('keahlian')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="referensi" class="col-sm-3 col-form-label">Referensi :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('referensi') is-invalid @enderror" name="referensi" id="referensi" value="{{ Auth::user()->referensi }}">
                        @error('referensi')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" style="float: right; margin: 5px;" class="btn btn-info">Edit</button>
                          <a href="/print/formulir_ppdb" target="_blank" style="float: right; margin: 5px;" class="btn btn-success">Print</a>
                        </div>
                      </div>
                    </form>
                  </div>
                  
                  <div class="tab-pane" id="dokumen">
                    <div class="row">
                      <div class="col-md-3 mt-2">
                        <div class="card h-100">
                            <div class="card-header">Pas Foto</div>
                            <div class="card-body">
                              @if (Auth::user()->pasfoto)
                                <img style="max-width: 250px;"  src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->pasfoto) }}" class="mt-3">
                              @else
                                <img style="max-width: 250px;"  src="{{ asset('assets/img/logo.png') }}" class="mt-3">
                              @endif
                            </div>
                            <div class="card-footer">
                              <form action="upload_pasfoto_siswa/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                              <div class="form-group">
                                  <div class="form-group">
                                    <label for="upload_pasfoto">Upload Pas Foto</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_pasfoto" name="pasfoto">
                                        <label class="custom-file-label" for="upload_pasfoto">Pilih file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3 mt-2">
                        <div class="card h-100">
                            <div class="card-header">Kartu Keluarga</div>
                            <div class="card-body">
                              @if (Auth::user()->kk)
                                <img style="max-width: 250px;"  src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->kk) }}" class="mt-3">
                              @else
                                <img style="max-width: 250px;"  src="{{ asset('assets/img/logo.png') }}" class="mt-3">
                              @endif
                            </div>
                            <div class="card-footer">
                              <form action="upload_kk_siswa/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                              <div class="form-group">
                                  <div class="form-group">
                                    <label for="upload_kk">Upload Kartu Keluarga</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_kk" name="kk">
                                        <label class="custom-file-label" for="upload_kk">Pilih file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3 mt-2">
                        <div class="card h-100">
                            <div class="card-header">AKTA Kelahiran</div>
                            <div class="card-body">
                              @if (Auth::user()->akta)
                                <img style="max-width: 250px;"  src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->akta) }}" class="mt-3">
                              @else
                                <img style="max-width: 250px;"  src="{{ asset('assets/img/logo.png') }}" class="mt-3">
                              @endif
                            </div>
                            <div class="card-footer">
                              <form action="upload_akta_siswa/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                              <div class="form-group">
                                  <div class="form-group">
                                    <label for="upload_akta">Upload AKTA Kelahiran</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_akta" name="akta">
                                        <label class="custom-file-label" for="upload_akta">Pilih file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3 mt-2">
                        <div class="card h-100">
                            <div class="card-header">Surat Keterangan Lulus</div>
                            <div class="card-body">
                              @if (Auth::user()->skl)
                                <img style="max-width: 250px;"  src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->skl) }}" class="mt-3">
                              @else
                                <img style="max-width: 250px;"  src="{{ asset('assets/img/logo.png') }}" class="mt-3">
                              @endif
                            </div>
                            <div class="card-footer">
                              <form action="upload_skl_siswa/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                              <div class="form-group">
                                  <div class="form-group">
                                    <label for="upload_akta">Upload SKL</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_skl" name="skl">
                                        <label class="custom-file-label" for="upload_skl">Pilih file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
<script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection