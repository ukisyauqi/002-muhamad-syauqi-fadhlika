<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
        <li class="border-b-[2px]"><a href="/admin">Admin</a></li>
        <li><a href="/feedback">Feedback</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <a class="btn">Button</a>
    </div>
  </nav>

  <!-- component -->
  <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div>
      <!-- Table -->
      <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100">
          <h2 class="font-semibold text-gray-800">Daftar Tamu</h2>
        </header>
        <div class="p-3">
          <div class="overflow-x-auto">
            <table class="table-auto w-full">
              <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                  <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">Nama</div>
                  </th>
                  <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">No HP (Whatsapp)</div>
                  </th>
                  <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">Checkin Time</div>
                  </th>
                  <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">Checkout Time</div>
                  </th>
                  <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-center">status</div>
                  </th>
                </tr>
              </thead>
              <tbody class="text-sm divide-y divide-gray-100">
                <tr>
                  <td class="p-2 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="font-medium text-gray-800">Alex Shatov</div>
                    </div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left">08123456789</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">07.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">12.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="font-medium text-center">tidak datang</div>
                  </td>
                </tr>
                <tr>
                  <td class="p-2 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="font-medium text-gray-800">Philip Harbach</div>
                    </div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left">08123456789</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">07.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">12.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="font-medium text-center">tidak datang</div>
                  </td>
                </tr>
                <tr>
                  <td class="p-2 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="font-medium text-gray-800">Mirko Fisuk</div>
                    </div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left">08123456789</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">07.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">12.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="font-medium text-center">tidak datang</div>
                  </td>
                </tr>
                <tr>
                  <td class="p-2 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="font-medium text-gray-800">Olga Semklo</div>
                    </div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left">08123456789</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">07.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">12.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="font-medium text-center">tidak datang</div>
                  </td>
                </tr>
                <tr>
                  <td class="p-2 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="font-medium text-gray-800">Burak Long</div>
                    </div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left">08123456789</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">07.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="text-left font-medium">12.00</div>
                  </td>
                  <td class="p-2 whitespace-nowrap">
                    <div class="font-medium text-center">tidak datang</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
