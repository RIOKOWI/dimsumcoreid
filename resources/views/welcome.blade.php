<!DOCTYPE html>
<html lang="en" class="scroll-smooth" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Dimsum Rafi - Dimsum lokal autentik dan lezat, tersedia di GoFood dan bisa dipesan lewat WhatsApp.">
  <title>Dimsum Rafi</title>
  <link rel="icon" href="{{ asset('images/dumplings.png') }}">
  <link href="https://cdn.tailwindcss.com" rel="stylesheet" />

</head>
<body class="bg-yellow-50 text-gray-800 flex flex-col min-h-screen">

  {{-- Header --}}
  <header class="w-full bg-yellow-200 shadow-sm sticky top-0 z-30">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-3xl font-extrabold text-red-700 tracking-tight select-none">
        Dimsum Rafi
      </a>

      @if (Route::has('login'))
      <nav class="flex gap-4 items-center text-sm">
        @auth
          <a href="{{ url('/dashboard') }}" class="px-5 py-2 rounded bg-red-600 text-white hover:bg-red-700 transition duration-300">
            Dashboard
          </a>
        @else
          <a href="{{ route('login') }}" class="px-5 py-2 rounded border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition duration-300">
            Login
          </a>
          
        @endauth
      </nav>
      @endif
    </div>
  </header>

  {{-- Hero Section --}}
  <main class="flex-grow max-w-7xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-12">
    
    {{-- Text content --}}
    <section class="md:w-1/2 text-center md:text-left">
      <h1 class="text-5xl font-extrabold text-red-700 leading-tight mb-6">
        Nikmati Lezatnya <br />
        <span class="text-yellow-600">Dimsum Mentai</span> <br />
        dari Pengrajin Lokal
      </h1>
      <p class="text-lg text-gray-700 mb-8">
        Kami menyediakan dimsum segar dan autentik dengan resep turun-temurun yang siap memanjakan lidah Anda. Pesan sekarang dan rasakan kenikmatannya!
      </p>
      @guest
      <a href="https://wa.me/6281398234141?text=Halo%20apakah%20Dimsumnya%20ready?
" target="_blank" class="inline-block px-8 py-3 bg-red-600 text-white rounded-md shadow hover:bg-red-700 transition duration-300 font-semibold">
        Pesan Sekarang
      </a>
      @endguest
    </section>

    {{-- Image content --}}
    <section class="md:w-1/2 max-w-md mx-auto md:mx-0">
      <img
        src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=600&q=80"
        alt="Dimsum Tradisional"
        class="rounded-xl shadow-lg object-cover w-full h-full max-h-[400px]"
        loading="lazy"
      />
    </section>

 


  </main>
<!-- Menu Section (2 items only) -->
<section class="w-full py-16 px-6 bg-white">
  <div class="max-w-7xl mx-auto text-center mb-12">
    <h2 class="text-3xl font-extrabold text-red-700 mb-4">Menu Andalan Kami</h2>
    <p class="text-gray-700 max-w-xl mx-auto">
      Pilihan dimsum favorit pelanggan yang wajib kamu coba!
    </p>
  </div>
  
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
    <!-- Menu 1 -->
    <div class="rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300 bg-white">
      <div class="w-full aspect-[3/4] bg-white flex items-center justify-center">
        <img src="{{ asset('images/7da4ed4a-a1cc-49d9-9427-256a61740fcf.png') }}"
             alt="Dimsum Original"
             class="max-h-full object-contain"/>
      </div>
      <div class="p-4 bg-yellow-100">
        <h3 class="text-lg font-semibold text-red-700 mb-1">Dimsum Original</h3>
        <p class="text-sm text-gray-700">Dimsum klasik dengan isian ayam dan udang, cocok untuk semua selera.</p>
      </div>
    </div>

    <!-- Menu 2 -->
    <div class="rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300 bg-white">
      <div class="w-full aspect-[3/4] bg-white flex items-center justify-center">
        <img src="{{ asset('images/85e4a88f-4748-4089-b03f-130cb9fc7152.png') }}"
             alt="Dimsum Mentai"
             class="max-h-full object-contain"/>
      </div>
      <div class="p-4 bg-yellow-100">
        <h3 class="text-lg font-semibold text-red-700 mb-1">Dimsum Mentai</h3>
        <p class="text-sm text-gray-700">Topping saus mentai spesial yang creamy dan gurih menggoda.</p>
      </div>
    </div>
  </div>
</section>



  {{-- Features Section --}}
  <section class="bg-yellow-100 py-16 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
      <div>
        <div class="mx-auto mb-4 p-4 rounded-full bg-red-600 w-16 h-16 flex items-center justify-center text-white">
          <!-- Icon: Fresh -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-3.31 0-6 2.69-6 6 0 2.21 2 4 4 4h4c2 0 4-1.79 4-4 0-3.31-2.69-6-6-6z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-red-700 mb-2">Bahan Segar</h3>
        <p class="text-gray-700">Kami hanya menggunakan bahan segar berkualitas tinggi agar dimsum terasa nikmat dan sehat.</p>
      </div>
      <div>
        <div class="mx-auto mb-4 p-4 rounded-full bg-red-600 w-16 h-16 flex items-center justify-center text-white">
          <!-- Icon: Handshake -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12h.01M19 12h.01M7 12h.01M3 12h.01M12 15v3m0-3v-3m0 3a5 5 0 00-5 5v-2a3 3 0 013-3h2z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-red-700 mb-2">Pelayanan Ramah</h3>
        <p class="text-gray-700">Tim kami siap melayani dengan sepenuh hati dan memberikan pengalaman terbaik bagi pelanggan.</p>
      </div>
      <div>
        <div class="mx-auto mb-4 p-4 rounded-full bg-red-600 w-16 h-16 flex items-center justify-center text-white">
          <!-- Icon: Delivery -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9h13v6H3V9zm16-4h1a2 2 0 012 2v9a2 2 0 01-2 2h-1v-4h-4v4H7v-5a2 2 0 012-2h8V5z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-red-700 mb-2">Pengiriman Cepat</h3>
        <p class="text-gray-700">Pesanan Anda akan dikirim dengan cepat dan tepat waktu sampai di tangan Anda.</p>
      </div>
    </div>
  </section>

    <!-- Promotion Section -->
    <section class="bg-red-600 text-yellow-50 py-16 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12">
    <!-- Gambar Promosi -->
    <div class="md:w-1/2 max-w-md mx-auto md:mx-0">
      <img
        src="{{ asset('images/GoFood-Banner---Logo-Big-promo-tokopedia_1.jpg') }}"
        alt="Promo Dimsum Spesial"
        class="rounded-xl shadow-lg object-cover w-full h-full max-h-[400px]"
        loading="lazy"
      />
    </div>
    <!-- Teks Promosi -->
        <div class="md:w-1/2 text-center md:text-left">
            <h2 class="text-4xl font-extrabold mb-6">
                Dimsum Rafi tersedia di GoFood!
            </h2>
            <p class="text-lg mb-8 max-w-lg mx-auto md:mx-0">
                Lagi mager keluar? Tenang, tinggal pesan lewat GoFood dan nikmati dimsum hangat, lezat, dan autentik langsung ke depan pintu rumahmu. Cobain sekarang!
            </p>
            <a href="https://gofood.link/a/Nqc9BEY" target="_blank"
                class="inline-block bg-yellow-400 text-red-700 font-semibold px-8 py-3 rounded shadow hover:bg-yellow-300 transition duration-300">
                Pesan Sekarang
            </a>
        </div>
    </div>
    </section>

    <!-- Instagram Section -->
<section class="bg-white py-16 px-6">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-3xl font-extrabold text-red-700 mb-4">Ikuti Instagram Kami</h2>
    <p class="text-gray-700 mb-8 max-w-xl mx-auto">
      Dapatkan update menu terbaru, promo spesial, dan konten menarik lainnya langsung dari Instagram kami!
    </p>
    <a href="https://www.instagram.com/dimsumcore.id" target="_blank"
       class="inline-block bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition duration-300 font-semibold">
      @dimsumcore.id
    </a>
    
    <!-- Instagram Embed (opsional jika ingin tampil feed) -->
    <!-- <div class="mt-10">
      <iframe src="https://www.instagram.com/p/C0NT0..." class="mx-auto w-full max-w-md h-[480px] border-none" loading="lazy"></iframe>
    </div> -->
  </div>
</section>

<!-- Lokasi Booth Offline -->
<section class="bg-yellow-100 py-16 px-6">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-3xl font-extrabold text-red-700 mb-4">Kunjungi Booth Kami</h2>
    <p class="text-gray-700 mb-8 max-w-xl mx-auto">
      Selain pesan online, kamu juga bisa langsung datang ke booth kami dan nikmati dimsum hangat di tempat!
    </p>
    <div class="w-full h-[400px] rounded-lg overflow-hidden shadow-lg max-w-4xl mx-auto">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d833.9110293068813!2d106.55412575065388!3d-6.1613205726860345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1749860401534!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>

  {{-- Footer --}}
  <footer class="bg-yellow-200 text-center py-6 text-red-700 font-semibold select-none">
    &copy; {{ date('Y') }} Dimsum Rafi. All rights reserved.
  </footer>

  <script src="https://cdn.tailwindcss.com"></script>


</body>
</html>
