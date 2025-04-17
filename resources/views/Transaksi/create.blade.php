{{-- filepath: c:\xampp\htdocs\UKK_Dion\resources\views\Transaksi\create.blade.php --}}
<x-navbar>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tambah Transaksi</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Produk</label>
                <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan kode produk" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Lihat Struk</button>
        </form>
    </div>

    {{-- filepath: c:\xampp\htdocs\UKK_Dion\resources\views\Transaksi\preview.blade.php --}}
   
</x-navbar>