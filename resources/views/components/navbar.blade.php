<!DOCTYPE html>
<html lang="en">
<head>
     <script src="//unpkg.com/alpinejs" defer></script>

     <meta charset="UTF-8">
     <title>{{ $title ?? 'Dashboard' }}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     @vite('resources/css/app.css') {{-- atau link ke CSS kamu --}}
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
     <!-- Sidebar -->
     <aside class="w-64 bg-white border-r shadow-md">
          <div class="p-6 font-bold text-lg">🖥 Kasir Dion</div>
          <nav class="space-y-4 px-6">
  <a href="/" class="flex items-center gap-2 p-2 rounded-md hover:bg-blue-100 {{ Request::is('/') ? 'bg-blue-500 text-white' : '' }}">
  <span>📊</span> Dashboard
  </a>
               <a href="/produk" class="flex items-center gap-2 p-2 rounded-md hover:bg-blue-100 {{ Request::is('produk') ? 'bg-blue-500 text-white' : '' }}">
                    <span>📦</span> Produk
               </a>
               <a href="/transaksi" class="flex items-center gap-2 p-2 rounded-md hover:bg-blue-100 {{ Request::is('pembelian') ? 'bg-blue-500 text-white' : '' }}">
                    <span>🛒</span> Pembelian
               </a>
               <a href="/user" class="flex items-center gap-2 p-2 rounded-md hover:bg-blue-100 {{ Request::is('user') ? 'bg-blue-500 text-white' : '' }}">
                    <span>👤</span> User
               </a>
          </nav>
     </aside>

     <!-- Main Content --> 
     <div class="flex-1 flex flex-col">
          <!-- Navbar -->
          <header class="bg-white shadow-md p-4 flex justify-between items-center">
               <div class="relative w-full max-w-sm">
                    <input type="text"
                             class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 text-black placeholder-gray-500"
                             placeholder="Search..." />
                    <div class="absolute left-3 top-1/2 transform-translate-y-1/2 text-gray-400">
                 🔍
                    </div>
             </div>
            
               <div x-data="{ open: false }" class="relative">
                    <!-- Button Foto Profil -->
                    <button @click="open = !open"
                              class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500 cursor-pointer">
                         👤
                    </button>
            
                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-40 bg-white rounded shadow p-2 z-50">
                        
                         <!-- Link Profile -->
                         <a href="/profile"
                             class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">
                         {{Auth::user()->name}}
                         </a>
            
                         <!-- Logout Form -->
                         <form method="GET" action="{{route('logout')}}">
                              @csrf
                              <button type="submit"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100 cursor-pointer">
                                   Logout
                              </button>
                         </form>
                    </div>
             </div>
            
          </header>

          <!-- Page Content -->
          <main class="p-6">
               {{ $slot }}
          </main>
     </div>
</div>

</body>
</html>