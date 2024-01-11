@php
    use Illuminate\Support\Carbon; 
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/cetak.min.css') }}">
    <style>
        ol > li{
            padding:5px 10px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print PPDB SMK Muhammadiyah Kandanghaur</title>
</head>
<body>
        <div class="page">
        <table width="100%">
            <tr>
                <td width="100px" align="center" valign="middle">
                    <img src="{{asset('assets/img/dikdasmenmuh.png')}}" width="100%">
                </td>
                <td align="center" valign="middle">
                    <b style="color:#007bff;font-size:10pt !important;">MAJELIS PENDIDIKAN DASAR DAN MENENGAH</b><br>
                    <b style="color:#007bff;font-size:10pt !important;">PIMPINAN WILAYAH MUHAMMADIYAH JAWA BARAT</b><br>
                    <b style="color:#007bff;font-size:14pt !important;">SMK MUHAMMADIYAH KANDANGHAUR</b><br>
                    <b style="color:#007bff;;font-size:14pt !important;">SMK PUSAT KEUNGGULAN (PK)</b><br>
                    <b>Terakreditasi "A" (Unggul)</b><br>
                    <b>Nomor : 18572022/BAN-SM/SK/2022</b>
                    <div style="height:20px"></div>
                </td>
                <td width="100px" align="center" valign="middle">
                    <img src="{{asset('assets/img/logo.png')}}" width="80%">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <small style="font-size:10pt !important;">Konsentrasi Keahlian : Teknik Kendaraan Ringan (TKR),Teknik Sepeda Motor (TSM), Teknik Pengelasan (TPL),</small><br>
                    <small style="font-size:10pt !important;">Teknik Elektronika Industri (TEI), Teknik Komputer dan Jaringan (TKJ), Farmasi Klinis dan Komunitas (FKK)</small><br>
                    <small style="font-size:8pt !important;">Jl. Raya Karanganyar No. 28/A Kec. Kandanghaur Kab. Indramayu 45254 Telp. (0234) 507239,</small><br>
                    <small style="font-size:8pt !important;">email : smkmuhkandanghaur@gmail.com website : https://www.smkmuhkandanghaur.sch.id</small>
                </td>
            </tr>
        </table>
        <div style="height:5px;border-bottom:solid 2px black;border-top:solid 1px black;margin:10px 0"></div>
        <div style="text-align:center; margin:40px auto 30px auto">
            <b style="font-size:20pt !important;">FORMULIR PENDAFTARAN ONLINE PESERTA DIDIK BARU</b>
        </div>
        
        <div style="text-align:left; margin:20px auto 20px auto">
            <b style="font-size:14pt !important;">ID Pendaftaran : {{ $user -> id }}</b>
        </div>
        <table width="100%" class="it-grid">
            <tr style="background:#f6ff00">
                <td style="padding:10px" colspan="2" align="center"><b style="font-size:12pt !important;">IDENTITAS PESERTA DIDIK BARU</b></td>
            </tr>
            <tr>
                <td width="250px">Nomor Unduk Siswa Nasional</td>
                <td>{{ $user -> nisn }}</td>
            </tr>
            <tr>
                <td width="250px">Nomor Kartu Keluarga</td>
                <td>{{ $user -> no_kk }}</td>
            </tr>
            <tr>
                <td width="250px">Nomor Kartu Tanda Penduduk</td>
                <td>{{ $user -> no_nik }}</td>
            </tr>
            <tr>
                <td width="250px">Nama Lengkap Calon Peserta Didik</td>
                <td>{{ $user -> nama }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $user -> sex }}</td>
            </tr>
            <tr>
                <td>Tempat, Tangga Lahir</td>
                <td>{{ $user -> tempat_lahir }}, {{\Carbon\Carbon::parse( $user -> tanggal_lahir )->translatedFormat('d F Y')}}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>{{ $user -> asal_sekolah }}</td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td>{{ $user -> nama_ayah }}</td>
            </tr>
            <tr>
                <td>Pekerjaan Ayah</td>
                <td>{{ $user -> pekerjaan_ayah }}</td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>{{ $user -> nama_ibu }}</td>
            </tr>
            <tr>
                <td>Pekerjaan Ibu</td>
                <td>{{ $user -> pekerjaan_ibu }}</td>
            </tr>
            <tr>
                <td>Status Orang Tua</td>
                <td>{{ $user -> status_orang_tua }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>Blok {{ $user -> blok }} - RT {{ $user -> rt }} - RW {{ $user -> rw }}
                Desa {{ $user -> desa }} - Kecamatan {{ $user -> kecamatan }} - Kabupaten {{ $user -> kabupaten }}
                </td>
            </tr>
            <tr>
                <td>Nomor HP Siswa</td>
                <td>{{ $user -> no_siswa }}</td>
            </tr>
            <tr>
                <td>Nomor HP Orang Tua</td>
                <td>{{ $user -> no_wali }}</td>
            </tr>
            <tr>
                <td>Ukuran Segaram</td>
                <td><b>Ukuran Baju: </b> <br>
                    - Panjang baju : {{ $user -> panjang_baju }}
                    - Lingkar dada : {{ $user -> lingkar_dada }}
                    - Lebar Punggung : {{ $user -> lebar_punggung }}
                    - Lengan Panjang : {{ $user -> panjang_lengan_panjang }}
                    - Lengan Pendek {{ $user -> panjang_lengan_pendek }} <br>
                    <b>Ukuran Celana : </b><br>
                    - Panjang Celana : {{ $user -> panjang_celana_rok }}
                    - Lingkar Panggul : {{ $user -> lingkar_panggul }} <br>
                    <b>Ukuran Sepatu : </b><br>
                    - Ukuran Sepatu : {{ $user -> ukuran_sepatu }}
                </td>
            </tr>
            <tr>
                <td>Jurusan Yang Diminati</td>
                <td>{{ $user -> keahlian }}</td>
            </tr>
            <tr>
                <td>Referensi</td>
                <td>{{ $user -> referensi }}</td>
            </tr>
            {{-- <tr>
                <td><b>Status</b></td>
                <td><b>Verifikasi   : </b>{{ Auth::user()->verifikasi }}<br>
                    <b>Daftar Ulang : </b>{{ Auth::user()->daftar_ulang }}<br>
                    <b>Siap MPLS    : </b>{{ Auth::user()->status_mpls }}
                </td>
            </tr> --}}
        </table>
        <table width="100%" style="margin:20px auto">
            <tr>
                <td width="50%">
                    <div style="border:solid 1px black; width:250px; padding:10px">
                    <b>Catatan :</b> <br>
                        Harap disimpan dengan baik bukti Pendaftaran Online ini.
                        <br><br>
                    <b>Contact Person PPDB:</b> 
                        <br>
                        Customer Services SMK : 081xxxxxxxxx
                    </div>
                </td>
                <td align="center">
                    Indramayu, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br>
                    &nbsp;<br>
                    <br>
                    <br>
                    <br>
                    &nbsp;<br>
                    Panitia PPDB<br>
                    SMK Muhammadiyah Kandanghaur
                </td>
            </tr>
        </table>
        {{-- <div style="text-align: center">
            Follow, Like and Subscribe Media Sosial SMK Muhammadiyah Kandanghaur untuk melihat seluruh informasi yang ada di SMK Muhammadiyah Kami
        </div> --}}
        <table width="100%" style="margin-top:40px">
            <tr>
                <td>
                    <img src="https://logodownload.org/wp-content/uploads/2017/04/instagram-logo.png" width="30px">
                </td>
                <td>
                    @smkmuhkandanghaur
                </td>
                <td>
                    <img src="https://logodownload.org/wp-content/uploads/2023/07/threads-logo-0.png" width="30px">
                </td>
                <td>
                    @smkmuhkandanghaur
                </td>
                <td>
                    <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-1-2.png" width="30px">
                </td>
                <td>
                    smkmuhkandanghaur
                </td>
                <td>
                    <img src="https://logodownload.org/wp-content/uploads/2014/10/youtube-logo-5-2.png" width="30px">
                </td>
                <td>
                    smkmuhkandanghaur
                </td>
                <td>
                    <img src="https://logodownload.org/wp-content/uploads/2019/08/tiktok-logo-0-1.png" width="30px">
                </td>
                <td>
                    @smkmuhkandanghaur
                </td>
            </tr>
        </table>
    </div>
    <script> window.print(); </script>
</body>
</html>
