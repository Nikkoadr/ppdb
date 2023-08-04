    <div class="modal fade" id="edit_siswa_id{{ $data->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Siswa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="/edit/data_ppdb_admin/{{ $data->id }}" method="POST" class="form-horizontal">
            @method('put')
            @csrf
                <div class="form-group row">
                <label for="role" class="col-sm-3 col-form-label">Role :</label>
                    <div class="col-sm-9">
                        <select type="text" class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                        <option value="admin" @if ($data->role =="admin") selected @endif>Admin</option>
                        <option value="user" @if ($data->role =="user") selected @endif>User</option>
                        </select>
                        @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                <label for="verifikasi" class="col-sm-3 col-form-label">Verifikasi :</label>
                    <div class="col-sm-9">
                        <select type="text" class="form-control @error('verifikasi') is-invalid @enderror" name="verifikasi" id="verifikasi">
                        <option value="Verified" @if ($data->verifikasi =="Verified") selected @endif>Verified</option>
                        <option value="Not Verified" @if ($data->verifikasi =="Not Verified") selected @endif>Not Verified</option>
                        </select>
                        @error('verifikasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                <label for="daftar_ulang" class="col-sm-3 col-form-label">Daftar Ulang :</label>
                    <div class="col-sm-9">
                        <select type="text" class="form-control @error('daftar_ulang') is-invalid @enderror" name="daftar_ulang" id="daftar_ulang">
                        <option value="Belum Daftar Ulang" @if ($data->daftar_ulang =="Belum Daftar Ulang") selected @endif>Belum Daftar Ulang</option>
                        <option value="Sudah Daftar Ulang" @if ($data->daftar_ulang =="Sudah Daftar Ulang") selected @endif>Sudah Daftar Ulang</option>
                        </select>
                        @error('verifikasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                <label for="status_mpls" class="col-sm-3 col-form-label">Status MPLS :</label>
                    <div class="col-sm-9">
                        <select type="text" class="form-control @error('status_mpls') is-invalid @enderror" name="status_mpls" id="status_mpls">
                        <option value="Sudah Siap" @if ($data->status_mpls =="Sudah Siap") selected @endif>Sudah Siap</option>
                        <option value="Belum Siap" @if ($data->status_mpls =="Belum Siap") selected @endif>Belum Siap</option>
                        </select>
                        @error('status_mpls')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $data->email }}">
                    @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nisn" class="col-sm-3 col-form-label">NISN :</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" value="{{ $data->nisn }}">
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
                        <input type="number" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" id="no_kk" value="{{ $data->no_kk }}">
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
                        <input type="number" class="form-control @error('no_nik') is-invalid @enderror" name="no_nik" id="no_nik" value="{{ $data->no_nik }}">
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
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $data->nama }}">
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
                        <option value="Laki - Laki" @if ($data->sex =="Laki - Laki") selected @endif>Laki - Laki</option>
                        <option value="Perempuan" @if ($data->sex =="Perempuan") selected @endif>Perempuan</option>
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
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="ttl" value="{{ $data->tempat_lahir }}">
                @error('tempat_lahir')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col-sm-5">
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="ttl" value="{{ $data->tanggal_lahir }}">
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
                        <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" id="asal_sekolah" value="{{ $data->asal_sekolah }}" >
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
                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah" value="{{ $data->nama_ayah }}" >
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
                        <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ $data->pekerjaan_ayah }}" >
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
                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu" value="{{ $data->nama_ibu }}" >
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
                        <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ $data->pekerjaan_ibu }}" >
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
                        <option value="Masih Ada" @if ($data->status_orang_tua =="Masih Ada") selected @endif>Masih Ada</option>
                        <option value="Yatim" @if ($data->status_orang_tua =="Yatim") selected @endif>Yatim</option>
                        <option value="Piatu" @if ($data->status_orang_tua =="Piatu") selected @endif>Piatu</option>
                        <option value="Yatim Piatu" @if ($data->status_orang_tua =="Yatim Piatu") selected @endif>Yatim Piatu</option>
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
                        <input type="number" class="form-control @error('no_siswa') is-invalid @enderror" name="no_siswa" id="no_siswa" value="{{$data->no_siswa }}">
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
                        <input type="number" class="form-control @error('no_wali') is-invalid @enderror" name="no_wali" id="no_wali" value="{{ $data->no_wali }}">
                    @error('no_wali')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="alamat" style="margin-left: 110px" class="col-sm-12 col-form-label text-left" >Alamat :</label>
                    <label for="alamat" class="col-sm-3 col-form-label">- Blok / RT / RW </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control @error('blok') is-invalid @enderror" name="blok" id="blok" value="{{ $data->blok }}">
                        @error('blok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" value="{{ $data->rt }}">
                        @error('rt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw" id="rw" value="{{ $data->rw }}">
                        @error('rw')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="alamat" class="col-sm-3 col-form-label">- Desa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('desa') is-invalid @enderror" name="desa" id="desa" value="{{ $data->desa }}">
                        @error('desa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="alamat" class="col-sm-3 col-form-label">- Kecamatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" value="{{ $data->kecamatan }}">
                        @error('kecamatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="alamat" class="col-sm-3 col-form-label">- Kabupaten</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten" value="{{ $data->kabupaten }}">
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
                        <option value="TPFL" @if ($data->keahlian =="TPFL") selected @endif>Teknik Pengelasan Dan Fabrikasi Logam ( TPFL )</option>
                        <option value="TKRO" @if ($data->keahlian =="TKRO") selected @endif>Teknik Kendaraan Ringan Otomotif( TKRO )</option>
                        <option value="TE" @if ($data->keahlian =="TE") selected @endif>Teknik Elektronika ( TE )</option>
                        <option value="TJKT" @if ($data->keahlian =="TJKT") selected @endif>Teknik Jaringan Komputer Dan Telekomunikasi ( TJKT )</option>
                        <option value="TBSM" @if ($data->keahlian =="TBSM") selected @endif>Teknik Dan Bisnis Sepeda Motor ( TBSM )</option>
                        <option value="TF" @if ($data->keahlian =="TF") selected @endif>Teknologi Farmasi ( TF )</option>
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
                        <input type="text" class="form-control @error('referensi') is-invalid @enderror" name="referensi" id="referensi" value="{{ $data->referensi }}">
                    @error('referensi')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->