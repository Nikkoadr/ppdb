<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu MPLS</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .card {
            display: flex;
            border: 2px solid #000;
            border-radius: 10px;
            overflow: hidden;
            width: 500mm;
            height: 353mm;
            background-color: #fff;
        }

        .left-panel {
            color: #fff;
            padding: 20px;
            text-align: center;
            width: 25%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        .department-wrapper {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .department-full {
            font-size: 50px;
        }

        .department {
            font-size: 72px;
            font-weight: bold;
            margin-top: 20px;
        }

        .right-panel {
            padding: 40px;
            width: 75%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 40px;
        }

        .fortasi-logo img {
            width: 80px;
            height: auto;
        }

        .header-text h1 {
            margin: 0;
            font-size: 48px;
        }

        .header-text p {
            margin: 10px 0;
            font-size: 24px;
        }

        .header-text h2 {
            margin: 10px 0;
            font-size: 36px;
        }

        .photo {
            border: 2px solid #000;
            width: 300px;
            height: 400px;
            margin: 0 auto 40px auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .details {
            font-size: 24px;
        }

        .details p {
            margin: 10px 0;
        }

        .social-media {
            text-align: center;
            margin-top: auto;
        }

        .social-media p {
            margin: 10px 0;
            font-size: 24px;
        }

        .social-media img {
            width: 50px;
            height: auto;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        @if (Auth::user()->keahlian === 'TJKT')
        <div style="background-color: #28da46;" class="left-panel">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Sekolah" class="logo">
            <div class="department-wrapper">
                <div class="department">TKJ</div>
                <div class="department-full">TEKNIK KOMPUTER DAN JARINGAN</div>
            </div>
        </div>
        @endif
        <div class="right-panel">
            <div class="header">
                <div class="fortasi-logo">
                    <img src="{{ asset('assets/img/2.png') }}" alt="Logo Fortasi">
                </div>
                <div class="header-text">
                    <h1>FORTASI 2024</h1>
                    <p>Forum Ta'aruf dan Orientasi</p>
                    <h2>SMK MUHAMMADIYAH KANDANGHAUR</h2>
                </div>
            </div>
            <div class="photo">
                <h2>3x4</h2>
            </div>
            <div class="details">
                <h1>{{ Auth::user()->nama }}</h1>
                <p>Konsentrasi Keahlian: {{ Auth::user()->keahlian }} </p>
                <p>Asal Sekolah: {{ Auth::user()->asal_sekolah }}</p>
            </div>
            <div class="social-media">
                <p>Media Sosial</p>
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png" alt="YouTube">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
                <img src="{{ asset('assets/img/tt.png') }}" alt="TikTok">
                <p>@smkmuhkandanghaur</p>
                <p>Bergerak Maju Menjadi yang Terdepan</p>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
