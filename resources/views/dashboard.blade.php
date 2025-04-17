<x-navbar>
    <div class="">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <p class="text-gray-500">Selamat datang di dashboard aplikasi kasir Dion</p>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold">Total Penjualan</h2>
                <p class="text-gray-500">Rp. 10.000.000</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold">Total Produk</h2>
                <p class="text-gray-500">{{$jumlahProduk}} Produk</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold">Total Pembelian</h2>
                <p class="text-gray-500">Rp. 5.000.000</p>
            </div>
        </div>
    </div>
    <div class="mt-8">
        <h2 class="text-xl font-semibold">Grafik Penjualan</h2>
        <div class="bg-white shadow-md rounded-lg p-4 mt-4">
            <canvas id="salesChart"></canvas>
        </div>
</x-navbar>