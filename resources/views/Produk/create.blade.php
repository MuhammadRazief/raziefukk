{{-- filepath: c:\xampp\htdocs\UKK_Dion\resources\views\Produk\create.blade.php --}}
<x-navbar>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <a href="/produk" class="btn btn-primary">Kembali</a>
            <h2 class="text-center mb-4">Tambah Produk</h2>
            <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                    
                @endif
                <div class="mb-3">  
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama produk" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Produk</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga produk" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Produk</label>
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan stok produk" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Masukkan URL gambar produk" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>

        <script>
            const hargaInput = document.getElementById('harga');

            hargaInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/[^,\d]/g, ''); // Hapus karakter non-digit
                if (value) {
                    const formatter = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    });
                    e.target.value = formatter.format(value).replace('IDR', 'Rp').trim(); // Format ke Rp
                }
            });
        </script>
    </body>
    </html>
</x-navbar>