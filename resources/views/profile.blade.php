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
                  @if (Auth::user()->pasfoto)
                    <img class="profile-user-img img-fluid"
                      src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->pasfoto) }}"
                      alt="User profile picture">
                  @else
                    <img class="profile-user-img img-fluid img-circle"
                      src="{{ asset('assets/img/defaultpp.png') }}"
                      alt="User profile picture">
                  @endif
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
                  @if (Auth::user()-> verifikasi =='Verified')
                    <li class="nav-item"><a class="nav-link" href="#ukuran" data-toggle="tab">Ukuran Baju</a></li>
                  @endif
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
                          <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" value="{{ Auth::user()->nisn }}">
                        @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_kk" class="col-sm-3 col-form-label">Nomor Kartu Keluarga (KK) :</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" id="no_kk" value="{{ Auth::user()->no_kk }}">
                        @error('no_kk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_nik" class="col-sm-3 col-form-label">Nomor Induk Kependudukan (NIK) :</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control @error('no_nik') is-invalid @enderror" name="no_nik" id="no_nik" value="{{ Auth::user()->no_nik }}">
                        @error('no_ nik')
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
                        <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah" value="{{ Auth::user()->nama_ayah }}" >
                        @error('nama_ayah')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pekerjaan_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ Auth::user()->pekerjaan_ayah }}" >
                        @error('pekerjaan_ayah')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu" value="{{ Auth::user()->nama_ibu }}" >
                        @error('nama_ibu')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pekerjaan_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ Auth::user()->pekerjaan_ibu }}" >
                        @error('pekerjaan_ibu')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="status_orang_tua" class="col-sm-3 col-form-label">Status Orang Tua :</label>
                        <div class="col-sm-9">
                          <select type="text" class="form-control @error('status_orang_tua') is-invalid @enderror" name="status_orang_tua" id="status_orang_tua">
                            <option value="Masih Ada" @if (Auth::user()->status_orang_tua =="Masih Ada") selected @endif>Masih Ada</option>
                            <option value="Yatim" @if (Auth::user()->status_orang_tua =="Yatim") selected @endif>Yatim</option>
                            <option value="Piatu" @if (Auth::user()->status_orang_tua =="Piatu") selected @endif>Piatu</option>
                            <option value="Yatim Piatu" @if (Auth::user()->status_orang_tua =="Yatim Piatu") selected @endif>Yatim Piatu</option>
                          </select>
                          @error('status_orang_tua')
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

                  <div class="tab-pane" id="ukuran">
                    <div class="row">
                      <div class="col-md-12 mt-2">
                        <div class="card h-100">
                            <div class="card-header">Ukuran Baju</div>
                            <div class="card-body">
                              <p style="text-align: center;"><b>Gambar Sebagai Patokan</b></p>
                                <img style="max-width: 100%;"  src="{{ asset('assets/img/ukuran/ukuran_baju.png') }}" class="mt-3">
                            </div>
                            <div class="card-footer">
                              <form action="ukuran_baju/{{ Auth::user()->id }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('put')
                                  <div class="form-group row">
                                    <label for="panjang_baju" class="col-sm-3 col-form-label">Panjang Baju :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('panjang_baju') is-invalid @enderror" name="panjang_baju" id="panjang_baju" value="{{ Auth::user()->panjang_baju }}" >
                                      @error('panjang_baju')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="lingkar_dada" class="col-sm-3 col-form-label">Lingkar Dada :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('lingkar_dada') is-invalid @enderror" name="lingkar_dada" id="lingkar_dada" value="{{ Auth::user()->lingkar_dada }}" >
                                    @error('lingkar_dada')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="lebar_punggung" class="col-sm-3 col-form-label">lebar punggung :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('lebar_punggung') is-invalid @enderror" name="lebar_punggung" id="lebar_punggung" value="{{ Auth::user()->lebar_punggung }}" >
                                    @error('lebar_punggung')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="panjang_lengan_pendek" class="col-sm-12 col-form-label">Panjang Lengan :</label>
                                    <label for="panjang_lengan_pendek" class="col-sm-3 col-form-label">Pendek :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('panjang_lengan_pendek') is-invalid @enderror" name="panjang_lengan_pendek" id="panjang_lengan_pendek" value="{{ Auth::user()->panjang_lengan_pendek }}" >
                                    @error('panjang_lengan_pendek')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                    <label for="panjang_lengan_panjang" class="col-sm-3 col-form-label">Panjang :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('panjang_lengan_panjang') is-invalid @enderror" name="panjang_lengan_panjang" id="panjang_lengan_panjang" value="{{ Auth::user()->panjang_lengan_panjang }}" >
                                    @error('panjang_lengan_panjang')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <p><b>Catatan:</b> Semua Ukuran Berdasarakan Centimeter (CM)</p>
                                    <div class="offset-sm-2 col-sm-10">
                                      <button type="submit" style="float: right; margin: 5px;" class="btn btn-info">Simpan Ukuran</button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12 mt-2">
                        <div class="card h-100">
                            <div class="card-header">Ukuran Celana</div>
                              <div class="card-body">
                                <p style="text-align: center;"><b>Gambar Sebagai Patokan</b></p>
                                <img style="max-width: 100%;"  src="{{ asset('assets/img/ukuran/ukuran_celana.png') }}" class="mt-3">
                              </div>
                            <div class="card-footer">
                              <form action="ukuran_celana/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('put')
                              <div class="form-group row">
                                    <label for="panjang_celana_rok" class="col-sm-3 col-form-label">Panjang Celana :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('panjang_celana_rok') is-invalid @enderror" name="panjang_celana_rok" id="panjang_celana_rok" value="{{ Auth::user()->panjang_celana_rok }}" >
                                      @error('panjang_celana_rok')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="lingkar_panggul" class="col-sm-3 col-form-label">Lingkar Panggul :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('lingkar_panggul') is-invalid @enderror" name="lingkar_panggul" id="lingkar_panggul" value="{{ Auth::user()->lingkar_panggul }}" >
                                    @error('lingkar_panggul')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                  </div>
                                  {{-- <div class="form-group row">
                                    <label for="lebar_panggul" class="col-sm-3 col-form-label">Lebar Panggul :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('lebar_panggul') is-invalid @enderror" name="lebar_panggul" id="lebar_panggul" value="{{ Auth::user()->lebar_panggul }}" >
                                    @error('lebar_panggul')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                  </div> --}}
                                  <div class="form-group row">
                                    <p><b>Catatan:</b> Semua Ukuran Berdasarakan Centimeter (CM)</p>
                                    <div class="offset-sm-2 col-sm-10">
                                      <button type="submit" style="float: right; margin: 5px;" class="btn btn-info">Simpan Ukuran</button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="card h-100">
                            <div class="card-header">Ukuran Sepatu</div>
                              <div class="card-body">
                                <p style="text-align: center;"><b>Gambar Sebagai Patokan</b></p>
                                <img style="max-width: 100%;"  src="{{ asset('assets/img/ukuran/ukuran_celana.png') }}" class="mt-3">
                              </div>
                            <div class="card-footer">
                              <form action="ukuran_sepatu/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('put')
                              <div class="form-group row">
                                    <label for="ukuran_sepatu" class="col-sm-3 col-form-label">Ukuran Sepatu :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control @error('ukuran_sepatu') is-invalid @enderror" name="ukuran_sepatu" id="ukuran_sepatu" value="{{ Auth::user()->ukuran_sepatu }}" >
                                      @error('ukuran_sepatu')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <p><b>Catatan:</b> Semua Ukuran Berdasarakan Centimeter (CM)</p>
                                    <div class="offset-sm-2 col-sm-10">
                                      <button type="submit" style="float: right; margin: 5px;" class="btn btn-info">Simpan Ukuran</button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>

                  <div class="tab-pane" id="dokumen">
                    <div class="row">
                      <div class="col-md-3 mt-2">
                        <div class="card h-100">
                            <div class="card-header">Pas Foto</div>
                            <div class="card-body">
                              @if (Auth::user()->pasfoto)
                                <img style="max-width: 100%;"  src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->pasfoto) }}" class="mt-3">
                              @else
                                <img style="max-width: 100%;"  src="{{ asset('assets/img/logo.png') }}" class="mt-3">
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
                                        <input type="file" class="custom-file-input @error('pasfoto') is-invalid @enderror" id="pasfoto" name="pasfoto">
                                        <label class="custom-file-label" for="pasfoto">Pilih file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                    @error('pasfoto')
                                      <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
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
                                <img style="max-width: 100%;"  src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->kk) }}" class="mt-3">
                              @else
                                <img style="max-width: 100%;"  src="{{ asset('assets/img/logo.png') }}" class="mt-3">
                              @endif
                            </div>
                            <div class="card-footer">
                              <form action="upload_kk_siswa/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                              <div class="form-group">
                                  <div class="form-group">
                                    <label for="kk">Upload Kartu Keluarga</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('kk') is-invalid @enderror" id="kk" name="kk">
                                        <label class="custom-file-label" for="kk">Pilih file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                    @error('kk')
                                      <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
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
                                <img style="max-width: 100%;"  src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->akta) }}" class="mt-3">
                              @else
                                <img style="max-width: 100%;"  src="{{ asset('assets/img/logo.png') }}" class="mt-3">
                              @endif
                            </div>
                            <div class="card-footer">
                              <form action="upload_akta_siswa/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                              <div class="form-group">
                                  <div class="form-group">
                                    <label for="akta">Upload AKTA Kelahiran</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('akta') is-invalid @enderror" id="akta" name="akta">
                                        <label class="custom-file-label" for="akta">Pilih file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                    @error('akta')
                                      <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                </div>
                                </form>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3 mt-2">
                        <div class="card h-100">
                            <div class="card-header">Ijazah</div>
                            <div class="card-body">
                              @if (Auth::user()->ijazah)
                                <img style="max-width: 100%;"  src="{{ asset('storage/dokumen-ppdb/'. Auth::user()->ijazah) }}" class="mt-3">
                              @else
                                <img style="max-width: 100%;"  src="{{ asset('assets/img/logo.png') }}" class="mt-3">
                              @endif
                            </div>
                            <div class="card-footer">
                              <form action="upload_ijazah_siswa/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                              <div class="form-group">
                                  <div class="form-group">
                                    <label for="ijazah">Upload Ijazah</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('ijazah') is-invalid @enderror" id="ijazah" name="ijazah">
                                        <label class="custom-file-label" for="skl">Pilih file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                    @error('skl')
                                      <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
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