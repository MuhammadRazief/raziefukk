
<x-navbar>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <a href="{{ route('produk.index') }}" class="btn btn-primary mb-3">Kembali</a>
            <h2 class="text-center mb-4">Edit Produk</h2>
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" placeholder="Masukkan nama produk" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Produk</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" placeholder="Masukkan harga produk" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Produk</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}" placeholder="Masukkan stok produk" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                </div>
                <button type="submit" class="btn btn-success w-100">Update</button>
            </form>
        </div>
    </body>
    </html>
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
</x-navbar>