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
                    <img src="{{asset('assets/img/dikdasmenmuh.png')}}" width="80%">
                </td>
                <td align="center" valign="middle">
                    <b style="color:#007bff;font-size:10pt !important;">MAJELIS PENDIDIKAN DASAR DAN MENENGAH</b><br>
                    <b style="color:#007bff;font-size:10pt !important;">PIMPINAN WILAYAH MUHAMMADIYAH JAWA BARAT</b><br>
                    <b style="color:#007bff;font-size:14pt !important;">SMK MUHAMMADIYAH KANDANGHAUR</b><br>
                    <b style="color:#007bff;;font-size:14pt !important;">SEKOLAH PUSAT KEUNGGULAN (PK)</b><br>
                    <b>Terakreditasi "A" (Unggul)</b><br>
                    <b>Nomor : 02.00/375/BAP-SM/XI/2008</b>
                    <div style="height:20px"></div>
                </td>
                <td width="100px" align="center" valign="middle">
                    <img src="{{asset('assets/img/logo.png')}}" width="80%">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <small style="font-size:8pt !important;">Program Keahlian : Teknik Kendaraan Ringan Otomotif(TKRO),Teknik Dan Bisnis Sepeda Motor(TBSM), Teknik Pengelasan dan Fabrikasi Logam(TPFL), Teknik Elektronika(TE), Teknik Jaringan Komputer dan Telekomunikasi(TJKT), Teknologi Farmasi(TF)</small><br>
                    <small style="font-size:8pt !important;">Jl. Raya Karanganyar No. 28/A Kec. Kandanghaur Kab. Indramayu 45254 Telp. (0234) 507239, email : smkmuhkdh@gmail.com website : smkmuhkandanghaur.sch.id</small>
                </td>
            </tr>
        </table>
        <div style="height:5px;border-bottom:solid 2px black;border-top:solid 1px black;margin:10px 0"></div>
        <div style="text-align:center; margin:40px auto 60px auto">
            <b style="font-size:14pt !important;">FORMULIR PENDAFTARAN ONLINE</b>
        </div>
        <div style="text-align:left; margin:20px auto 20px auto">
            <b style="font-size:12pt !important;">Code Pendaftaran : {{ Auth::user()->id }}</b>
        </div>
        <table width="100%" class="it-grid">
            <tr style="background:#f6ff00">
                <td style="padding:10px" colspan="2" align="center"><b style="font-size:12pt !important;">IDENTITAS PESERTA DIDIK BARU</b></td>
            </tr>
            <tr>
                <td width="250px">NISN</td>
                <td>{{ Auth::user()->nisn }}</td>
            </tr>
            <tr>
                <td width="250px">Nama Lengkap Calon Peserta Didik</td>
                <td>{{ Auth::user()->nama }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{ Auth::user()->sex }}</td>
            </tr>
            <tr>
                <td>Tempat, Tangga Lahir</td>
                <td>{{ Auth::user()->tempat_lahir }}, {{\Carbon\Carbon::parse( Auth::user()->tanggal_lahir )->translatedFormat('d F Y')}}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>{{ Auth::user()->asal_sekolah }}</td>
            </tr>
            <tr>
                <td>Nomor HP Siswa</td>
                <td>{{ Auth::user()->no_siswa }}</td>
            </tr>
            <tr>
                <td>Nomor HP Orang Tua</td>
                <td>{{ Auth::user()->no_wali }}</td>
            </tr>
            <tr>
                <td>Jurusan Yang Diminati</td>
                <td>{{ Auth::user()->keahlian }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>Blok {{ Auth::user()->blok }} - RT {{ Auth::user()->rt }} - RW {{ Auth::user()->rw }}
                Desa {{ Auth::user()->desa }} - Kecamatan {{ Auth::user()->kecamatan }} - Kabupaten {{ Auth::user()->kabupaten }}
                </td>
            </tr>
            <tr>
                <td>Referensi</td>
                <td>{{ Auth::user()->referensi }}</td>
            </tr>
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
                        Rifa Hamidah, S.Pd. : 0822 9977 1110
                        <br>
                        Afandi, S.Pd. : 0812 2065 570 
                    </div>
                </td>
                <td align="center">
                    Indramayu, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br>
                    &nbsp;<br>
                    <br>
                    <br>
                    <br>
                    &nbsp;<br>
                    Panitia PPDB TA.<br>
                    SMK Muhammadiyah Kandanghaur
                </td>
            </tr>
        </table>
        <div style="text-align: center">
            Jangan lupa Follow, Like and Subscribe Media Sosial Sekolah Kami yaaa...
        </div>
        <table width="100%" style="margin-top:40px">
            <tr>
                <td width="60px">
                    <img src="https://img2.pngdownload.id/20171202/5b3/facebook-picture-5a22b43e9826a5.9836884015122238066232.jpg" width="50px">
                </td>
                <td>SMK Muhammadiyah Kandanghaur</td>
            </tr>
            <tr>
                <td>
                    <img src="https://1.bp.blogspot.com/-FWcDAk4ya0o/V15WPwj-J-I/AAAAAAAAALw/CsKpzk5WuV8K8M7ARKfU-mA_gmtDyTmRACKgB/s1600/maxresdefault.png" width="50px">
                </td>
                <td>
                    Smkmuhkandanghaur
                </td>
            </tr>
            <tr>
                <td>
                    <img src="https://1.bp.blogspot.com/-W3R9CzV2AWk/YCo9Ev2CcVI/AAAAAAAAD88/qymHYkY-wUwHrClgIXxaZVL_echTZbD0ACLcBGAsYHQ/s1600/Logo%2BYoutube.png" width="50px">
                </td>
                <td>
                    SMK Muhammadiyah Kandanghaur
                </td>
            </tr>
        </table>
    </div>
    <script> window.print(); </script>
</body>
</html>
