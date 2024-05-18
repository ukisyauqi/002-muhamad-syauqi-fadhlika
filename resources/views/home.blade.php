<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta>
  @vite('resources/css/app.css')
</head>

<body>
  {{-- Navbar --}}
  <nav class="navbar bg-base-100 shadow">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="/scan">Scan</a></li>
          <li>
            <a>Parent</a>
            <ul class="p-2">
              <li><a>Submenu 1</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </li>
          <li><a>Item 3</a></li>
        </ul>
      </div>
      <a class="btn btn-ghost text-xl"><span class="">dige</span><span
          class="font-extrabold -ml-2 text-amber-600">Book</span></a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1">
        <li><a href="/scan">Scan</a></li>
        <li><a href="/admin">Admin</a></li>
        <li><a href="/feedback">Feedback</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <a class="btn">Button</a>
    </div>
  </nav>

  <main class="bg-gray-100 font-sans">
    <!-- Hero Section -->
    <section class="text-center py-16">
      <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Digital Guest <span class="text-amber-600">Book</span></h1>
        <p class="text-lg text-gray-600 mb-8">Sistem Buku Tamu yang Cepat dan Simpel, hanya dengan Scan QR Code.</p>
        <a href="#"
          class="bg-amber-500 hover:bg-amber-500/80 text-white font-bold py-2 px-6 rounded-full inline-block">Daftar
          Sekarang</a>
      </div>
    </section>

    <!-- About Section -->
    <section class="bg-gray-200 py-16">
      <div class="container mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Cara kerja digeBook</h2>
        <div class="flex items-center justify-center">
          <div class="w-44 h-44 border-8 border-blue-400 bg-white shadow rounded-full flex justify-center items-center relative text-center">
            QR Code dikirim ke Whatsapp Tamu
          </div>
          <div class="mx-8 text-4xl">&#8594;</div> <!-- Panah ke-1 -->
          <div class="bg-white w-44 h-44 border-8 border-yellow-400 rounded-full flex justify-center items-center relative text-center">
            QR Code Tamu <br>diScan ketika masuk ruangan
          </div>
          <div class="mx-8 text-4xl">&#8594;</div> <!-- Panah ke-2 -->
          <div class="bg-white w-44 h-44 border-8 border-green-400 rounded-full flex justify-center items-center relative text-center">
            Tamu berhasil<br> Check In
          </div>
        </div>
      </div>
    </section>

    <!-- Speakers Section -->
    <section class="py-16">
      <div class="container mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Review </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Speaker Card 1 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="speaker1.jpg" alt="Speaker 1" class="w-full h-64 object-cover">
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-2">John Doe</h3>
              <p class="text-gray-600">Pemrograman Web Senior</p>
            </div>
          </div>
          <!-- Speaker Card 2 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="speaker2.jpg" alt="Speaker 2" class="w-full h-64 object-cover">
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-2">Jane Smith</h3>
              <p class="text-gray-600">UI/UX Designer</p>
            </div>
          </div>
          <!-- Speaker Card 3 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="speaker3.jpg" alt="Speaker 3" class="w-full h-64 object-cover">
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-2">David Johnson</h3>
              <p class="text-gray-600">Frontend Developer</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
      <div class="container mx-auto text-center">
        <p>&copy; 2024 Seminar Pemrograman Web. All rights reserved.</p>
      </div>
    </footer>
  </main>
</body>

</html>
