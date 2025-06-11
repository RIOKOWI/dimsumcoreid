<!DOCTYPE html>
<html lang="en" class="scroll-smooth" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dimsum Rafi - Nikmati Lezatnya Dimsum Mentai</title>
  <link href="https://cdn.tailwindcss.com" rel="stylesheet" />

</head>
<body class="bg-yellow-50 text-gray-800 flex flex-col min-h-screen">

  {{-- Header --}}
  <header class="w-full bg-yellow-200 shadow-sm sticky top-0 z-30">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-3xl font-extrabold text-red-700 tracking-tight select-none">
        Dimsum Core
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
      <a class="inline-block px-8 py-3 bg-red-600 text-white rounded-md shadow hover:bg-red-700 transition duration-300 font-semibold">
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
        src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80"
        alt="Promo Dimsum Spesial"
        class="rounded-xl shadow-lg object-cover w-full h-full max-h-[400px]"
        loading="lazy"
      />
    </div>
    <!-- Teks Promosi -->
        <div class="md:w-1/2 text-center md:text-left">
            <h2 class="text-4xl font-extrabold mb-6">
                Promo Spesial Bulan Ini!
            </h2>
            <p class="text-lg mb-8 max-w-lg mx-auto md:mx-0">
                Dapatkan diskon 20% untuk semua varian dimsum hanya selama bulan ini.
                Pesan sekarang dan nikmati sensasi rasa autentik dengan harga terjangkau!
            </p>
            <a href="#"
                class="inline-block bg-yellow-400 text-red-700 font-semibold px-8 py-3 rounded shadow hover:bg-yellow-300 transition duration-300">
                Pesan Sekarang
            </a>
        </div>
    </div>
    </section>

  {{-- Footer --}}
  <footer class="bg-yellow-200 text-center py-6 text-red-700 font-semibold select-none">
    &copy; {{ date('Y') }} Dimsum Core. All rights reserved.
  </footer>

  <script src="https://cdn.tailwindcss.com"></script>


</body>
</html>
