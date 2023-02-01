@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p style="text-align: center;"><img class="text-center" src="{{ asset('assets/img/logo.png') }}" alt="formulir PPDB" width="70"></p>
            <div class="card">
                <div class="card-header">Formulir PPDB SMK Muhammadiyah Kandanghaur TA 2023/2024</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email :</label>
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
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password :</label>
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Konfirmasi Password :</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi Password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nisn" class="col-md-4 col-form-label text-md-end">NISN :</label>
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
                            <label for="nama" class="col-md-4 col-form-label text-md-end">Nama Lengkap :</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required placeholder="Nama Lengkap">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Jenis Kelamin :</label>
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
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-end">Tempat, Tanggal Lahir :</label>
                            <div class="col-md-6">
                                <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required placeholder="Tempat Lahir">
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
                            <label for="asal_sekolah" class="col-md-4 col-form-label text-md-end">Asal Sekolah :</label>
                            <div class="col-md-6">
                                <input id="asal_sekolah" type="text" class="typeahead form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required placeholder="Asal Sekolah">
                                @error('asal_sekolah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_siswa" class="col-md-4 col-form-label text-md-end">Nomor HP Siswa / Siswi :</label>
                            <div class="col-md-6">
                                <input id="no_siswa" type="number" class="form-control @error('no_siswa') is-invalid @enderror" name="no_siswa" value="{{ old('no_siswa') }}" required placeholder="Nomor HP Siswa / Siswi">
                                @error('no_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_wali" class="col-md-4 col-form-label text-md-end">Nomor HP Orang Tua :</label>
                            <div class="col-md-6">
                                <input id="no_wali" type="number" class="form-control @error('no_wali') is-invalid @enderror" 
                                name="no_wali" value="{{ old('no_wali') }}" required placeholder="Nomor HP Orang Tua">
                                @error('no_wali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat :</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('blok') is-invalid @enderror" 
                                name="blok" value="{{ old('blok') }}" required placeholder="Blok">
                                @error('blok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" class="form-control @error('rt') is-invalid @enderror" 
                                name="rt" value="{{ old('rt') }}" required placeholder="RT">
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" class="form-control @error('rw') is-invalid @enderror" 
                                name="rw" value="{{ old('rw') }}" required placeholder="RW">
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" class="form-control @error('desa') is-invalid @enderror" 
                                name="desa" value="{{ old('desa') }}" required placeholder="Desa">
                                @error('desa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" 
                                name="kecamatan" value="{{ old('kecamatan') }}" required placeholder="Kecamatan">
                                @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" 
                                name="kabupaten" value="{{ old('kabupaten') }}" required placeholder="Kabupaten">
                                @error('kabupaten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="keahlian" class="col-md-4 col-form-label text-md-end">Program Keahlian :</label>
                            <div class="col-md-6">
                                <select name="keahlian" id="keahlian" class="form-control @error('keahlian') is-invalid @enderror" required>
                                    <option value="">Pilih Program Keahlian</option>
                                    <option value="TPFL" @if (old('keahlian') == "TPFL")selected @endif>Teknik Pengelasan Dan Fabrikasi Logam ( TPFL )</option>
                                    <option value="TKRO" @if (old('keahlian') == "TKRO")selected @endif>Teknik Kendaraan Ringan Otomotif( TKRO )</option>
                                    <option value="TE" @if (old('keahlian') == "TE") selected @endif>Teknik Elektronika ( TE )</option>
                                    <option value="TJKT" @if (old('keahlian') == "TJKT") selected @endif>Teknik Jaringan Komputer Dan Telekomunikasi ( TJKT )</option>
                                    <option value="TBSM" @if (old('keahlian') == "TBSM") selected @endif>Teknik Dan Bisnis Sepeda Motor ( TBSM )</option>
                                    <option value="TF" @if (old('keahlian') == "TF") selected @endif>Teknologi Farmasi ( TF )</option>
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
                                <input id="referensi" type="text" class="form-control @error('referensi') is-invalid @enderror" name="referensi" value="{{ old('referensi') }}" placeholder="Contoh Meru Dipantara 11-TJKT-2">
                                @error('referensi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
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
@section('skrip')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
    
<script type="text/javascript">
    var path = "{{ route('cari') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection
