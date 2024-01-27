@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="assets/plugins/jquery-ui/jquery-ui.css">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p style="text-align: center;"><img class="text-center" src="{{ asset('assets/img/logo.png') }}" alt="formulir PPDB" width="70"></p>
            <div class="card">
                <div class="card-header">Formulir PPDB SMK Muhammadiyah Kandanghaur Tahun Ajaran 2024/2025</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h3><b>Account :</b></h3>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Konfirmasi Password <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi Password">
                            </div>
                        </div>

                        <h3><b>Data Siswa :</b></h3>
                        <div class="row mb-3">
                            <label for="nisn" class="col-md-4 col-form-label text-md-end">NISN <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input id="nisn" type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required placeholder="Nomer Induk Siswa Nasional">
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_kk" class="col-md-4 col-form-label text-md-end">Nomor Kartu Keluarga (KK) :</label>
                            <div class="col-md-6">
                                <input id="no_kk" type="number" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ old('no_kk') }}" placeholder="lihat di Kartu Keluarga">
                                @error('no_kk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_nik" class="col-md-4 col-form-label text-md-end">Nomor Induk Kependudukan (NIK) <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input id="no_nik" type="number" class="form-control @error('no_nik') is-invalid @enderror" name="no_nik" value="{{ old('no_nik') }}" placeholder="lihat di Kartu Keluarga" required>
                                @error('no_nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">Nama Lengkap <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input oninput="this.value = this.value.toUpperCase()"  id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required placeholder="Nama Lengkap">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Jenis Kelamin <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <select name="sex" id="sex" class="form-control @error('sex') is-invalid @enderror" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki - Laki" @if (old('sex') == "Laki - Laki") selected @endif>Laki - Laki</option>
                                    <option value="Perempuan" @if (old('sex') == "Perempuan") selected @endif>Perempuan</option>
                                </select>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-end">Tempat, Tanggal Lahir <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input oninput="this.value = this.value.toUpperCase()"  id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required placeholder="Ex: INDRAMAYU">
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="asal_sekolah" class="col-md-4 col-form-label text-md-end">Asal Sekolah <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input id="asal_sekolah" type="text" class="typeahead form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required placeholder="Asal Sekolah">
                                @error('asal_sekolah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <h3><b>Data Orang Tua :</b></h3>

                        <div class="row mb-3">
                            <label for="nama_ayah" class="col-md-4 col-form-label text-md-end">Nama Ayah <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input oninput="this.value = this.value.toUpperCase()"  id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Nama Ayah Kandung" required>
                                @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pekerjaan_ayah" class="col-md-4 col-form-label text-md-end">Pekerjaan Ayah :</label>
                            <div class="col-md-6">
                                <input oninput="this.value = this.value.toUpperCase()"  id="pekerjaan_ayah" type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" placeholder="Pekerjaan Ayah">
                                @error('pekerjaan_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_ibu" class="col-md-4 col-form-label text-md-end">Nama Ibu <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input oninput="this.value = this.value.toUpperCase()"  id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Nama Ibu Kandung" required>
                                @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pekerjaan_ibu" class="col-md-4 col-form-label text-md-end">Pekerjaan Ibu :</label>
                            <div class="col-md-6">
                                <input oninput="this.value = this.value.toUpperCase()"  id="pekerjaan_ibu" type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" placeholder="Pekerjaan Ibu">
                                @error('pekerjaan_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status_orang_tua" class="col-md-4 col-form-label text-md-end">Status Orang Tua <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <select name="status_orang_tua" id="status_orang_tua" class="form-control @error('status_orang_tua') is-invalid @enderror" required>
                                    <option value="">Pilih Status Orang Tua</option>
                                    <option value="Masih Ada" @if (old('status_orang_tua') == "Masih Ada") selected @endif>Masih Ada</option>
                                    <option value="Yatim" @if (old('status_orang_tua') == "Yatim") selected @endif>Yatim (Ayah Sudah Tidak Ada)</option>
                                    <option value="Piatu" @if (old('status_orang_tua') == "Piatu") selected @endif>Piatu (Ibu Sudah Tidak Ada)</option>
                                    <option value="Yatim Piatu" @if (old('status_orang_tua') == "Yatim Piatu") selected @endif>Yatim Piatu (Ayah Dan Ibu Sudah Tidak Ada)</option>
                                </select>
                                @error('status_orang_tua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <h3><b>Data Kontak :</b></h3>

                        <div class="row mb-3">
                            <label for="no_siswa" class="col-md-4 col-form-label text-md-end">Nomor HP Siswa / Siswi <span style="color: red">*</span>:</label>
                            <div class="col-md-6">
                                <input id="no_siswa" type="number" class="form-control @error('no_siswa') is-invalid @enderror" name="no_siswa" value="{{ old('no_siswa') }}" required placeholder="Ex : 08xxxxxxxxxx">
                                @error('no_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_wali" class="col-md-4 col-form-label text-md-end">Nomor HP Orang Tua <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input id="no_wali" type="number" class="form-control @error('no_wali') is-invalid @enderror" 
                                name="no_wali" value="{{ old('no_wali') }}" required placeholder="Ex : 08xxxxxxxxxx">
                                @error('no_wali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <input oninput="this.value = this.value.toUpperCase()"  type="text" class="form-control @error('blok') is-invalid @enderror" 
                                name="blok" value="{{ old('blok') }}" required placeholder="Blok">
                                @error('blok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="number" class="form-control @error('rt') is-invalid @enderror" 
                                name="rt" value="{{ old('rt') }}" required placeholder="RT">
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="number" class="form-control @error('rw') is-invalid @enderror" 
                                name="rw" value="{{ old('rw') }}" required placeholder="RW">
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input oninput="this.value = this.value.toUpperCase()"  type="text" class="form-control @error('desa') is-invalid @enderror" 
                                name="desa" value="{{ old('desa') }}" required placeholder="Desa">
                                @error('desa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input oninput="this.value = this.value.toUpperCase()"  type="text" class="form-control @error('kecamatan') is-invalid @enderror" 
                                name="kecamatan" value="{{ old('kecamatan') }}" required placeholder="Kecamatan">
                                @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input oninput="this.value = this.value.toUpperCase()"  type="text" class="form-control @error('kabupaten') is-invalid @enderror" 
                                name="kabupaten" value="{{ old('kabupaten') }}" required placeholder="Kabupaten">
                                @error('kabupaten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="keahlian" class="col-md-4 col-form-label text-md-end">Konsentrasi Keahlian <span style="color: red">*</span> :</label>
                            <div class="col-md-6">
                                <select name="keahlian" id="keahlian" class="form-control @error('keahlian') is-invalid @enderror" required>
                                    <option value="">Pilih Konsentrasi Keahlian</option>
                                    <option value="TPFL" @if (old('keahlian') == "TPFL")selected @endif>Teknik Pengelasan ( TPL )</option>
                                    <option value="TKRO" @if (old('keahlian') == "TKRO")selected @endif>Teknik Kendaraan Ringan( TKR )</option>
                                    <option value="TE" @if (old('keahlian') == "TE") selected @endif>Teknik Elektronika Industri ( TEI )</option>
                                    <option value="TJKT" @if (old('keahlian') == "TJKT") selected @endif>Teknik Komputer Dan Jaringan ( TKJ )</option>
                                    <option value="TBSM" @if (old('keahlian') == "TBSM") selected @endif>Teknik Sepeda Motor ( TSM )</option>
                                    <option value="TF" @if (old('keahlian') == "TF") selected @endif>Farmasi klinis dan Komunitas ( FKK )</option>
                                </select>
                                @error('keahlian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="referensi" class="col-md-4 col-form-label text-md-end">Referensi :</label>
                            <div class="col-md-6">
                                <input oninput="this.value = this.value.toUpperCase()"  id="referensi" type="text" class="form-control @error('referensi') is-invalid @enderror" name="referensi" value="{{ old('referensi') }}" placeholder="Ex : Adi Permana 12-TKJ-2">
                                @error('referensi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <label >Yang bertanda <span style="color: red">*</span> wajib diisi</label>
                                <button style="float: right" type="submit" class="btn btn-primary">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="assets/plugins/jquery/jquery.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
<script>
$( function() {
    $( "#asal_sekolah" ).autocomplete({
    source: '/autocomplete'
    });
} );
</script>
@endsection
