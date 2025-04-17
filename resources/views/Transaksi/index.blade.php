<x-navbar>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary my-2">Tambah Transaksi</a>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Kode Transaksi</th>
                    <th scope="col" class="px-6 py-3">Nama Produk</th>
                    <th scope="col" class="px-6 py-3">Jumlah</th>
                    <th scope="col" class="px-6 py-3">Total Harga</th>
                    <th scope="col" class="px-6 py-3">Tanggal Transaksi</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $transaksi->kode_transaksi }}</td>
                    <td class="px-6 py-4">{{ $transaksi->produk->nama }}</td>
                    <td class="px-6 py-4">{{ $transaksi->jumlah }}</td>
                    <td class="px-6 py-4">Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $transaksi->tanggal_transaksi }}</td>
                    <td class="flex items-center px-6 py-4">
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-primary mx-2">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-navbar>