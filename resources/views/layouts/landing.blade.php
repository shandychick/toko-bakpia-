<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BAKPIA 5555</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --hijau-tua: #6D942C;
      --hijau-muda: #ABD673;
      --krem: #FAF6CC;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: var(--krem);
      color: #333;
    }

    .navbar-custom {
      background-color: var(--krem);
      padding: 16px 32px;
      position: absolute;
      width: 100%;
      top: 0;
      z-index: 10;
    }

    .navbar-custom .btn {
      border-radius: 20px;
      font-weight: 500;
    }

    .btn-hijau {
      background-color: var(--hijau-tua);
      color: #fff;
      border: none;
    }

    .btn-outline-hijau {
      border: 1px solid var(--hijau-tua);
      color: var(--hijau-tua);
    }

    .btn-outline-hijau:hover {
      background-color: var(--hijau-tua);
      color: white;
    }

    .hero {
  background-color: var(--hijau-muda);
  padding-top: 120px;
  padding-bottom: 100px; /* ✅ ditambah supaya teks tidak ketimpa */
  position: relative;
  text-align: center;
  clip-path: ellipse(100% 90% at 50% 0%); /* ✅ diturunkan sedikit */
}


    .hero img {
      width: 200px;
      margin-bottom: 20px;
    }

    .hero h1 {
      font-weight: 700;
      font-size: 36px;
      color: var(--hijau-tua);
    }

    .hero p {
  font-size: 16px;
  color: #333;
  max-width: 600px;
  margin: 10px auto 0; /* ✅ jarak atas & tengah rapi */
  line-height: 1.6;     /* ✅ biar lebih enak dibaca */
}


    section {
      padding: 60px 20px;
    }

    .section-title {
      font-size: 24px;
      font-weight: 600;
      color: var(--hijau-tua);
      text-align: center;
      margin-bottom: 40px;
    }

    .produk-card {
      background-color: var(--hijau-muda);
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .produk-card img {
      width: 100%;
      border-radius: 10px;
    }

    .produk-card h5 {
      margin-top: 10px;
      font-weight: 600;
    }

    .testimoni-card {
      background-color: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }

    .form-box {
      background-color: var(--hijau-muda);
      border-radius: 16px;
      padding: 30px;
    }

    .form-box input, .form-box textarea {
      border-radius: 10px;
    }

    footer {
      background-color: var(--hijau-muda);
      text-align: center;
      padding: 40px 20px;
      clip-path: ellipse(100% 100% at 50% 100%);
    }

    footer img {
      width: 150px;
    }

    footer p {
      margin: 5px 0;
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 28px;
      }
    }
  </style>
</head>
<body>

  {{-- Navbar --}}
  <div class="navbar-custom d-flex justify-content-end">
    <a href="{{ route('login') }}" class="btn btn-outline-hijau me-2">Login</a>
    <a href="{{ route('register') }}" class="btn btn-hijau">Daftar</a>
  </div>

  {{-- Hero Section --}}
  <div class="hero">
    <img src="{{ asset('images/bakpia_bg.png') }}" alt="Bakpia">
    <h1>BAKPIA 5555</h1>
    <p>(INFONE RUNG MESTI) Bakpia 5555 adalah merek bakpia khas Yogyakarta yang terkenal dengan rasa tradisional dan berbagai varian rasa.</p>
  </div>

  {{-- Produk --}}
  <section>
    <h2 class="section-title">Produk Utama Kami</h2>
    <div class="container">
      <div class="row g-4">
        @foreach ([
          ['Bakpia isi 10', '15.000'],
          ['Bakpia isi 20', '20.000'],
          ['Bakpia isi 50', '50.000'],
          ['Bakpia Kering', '30.000'],
        ] as [$nama, $harga])
        <div class="col-md-3 col-sm-6">
          <div class="produk-card">
            <img src="{{ asset('images/bakpia2.jpg') }}" alt="{{ $nama }}">
            <h5>{{ $nama }}</h5>
            <p class="mb-0 text-success fw-bold">{{ $harga }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Testimoni --}}
  <section>
    <h2 class="section-title">Testimoni</h2>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 testimoni-card">
          <p>⭐⭐⭐⭐⭐</p>
          <p>Jenis bakpia basah... Fresh from the oven.. banyak varian, harga murah. Recommended buat oleh-oleh Jogja.</p>
        </div>
        <div class="col-md-5 testimoni-card">
          <p>⭐⭐⭐⭐⭐</p>
          <p>Bakpia isi ubi ungu dan madu nya enak bgt. Masih hangat dan fresh. Cocok untuk buah tangan khas Jogja.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Kontak --}}
  <section>
    <h2 class="section-title">Hubungi Kami</h2>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 form-box">
          <form>
            <input type="text" class="form-control mb-3" placeholder="Nama">
            <input type="email" class="form-control mb-3" placeholder="Email">
            <textarea rows="4" class="form-control mb-3" placeholder="Pesan"></textarea>
            <button class="btn btn-hijau w-100">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  {{-- Footer --}}
  <footer>
    <img src="{{ asset('images/bakpia2.jpg') }}" alt="Bakpia">
    <p class="fw-bold">BAKPIA 5555</p>
    <p>0821-1234-5555 | bakpia5555@email.com</p>
    <p>Jl. Imogiri Timur KM 10, Bantul, Yogyakarta</p>
    <p>Privacy Policy | Social Media | Kontak</p>
  </footer>

</body>
</html>
