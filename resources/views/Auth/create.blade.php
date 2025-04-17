<x-navbar>
    <div class="container mt-5">
        <a href="/user" class="btn btn-primary">Kembali</a>
        <h2 class="text-center mb-4">Tambah Produk</h2>
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
                
            @endif
            <div class="mb-3">  
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan name produk" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email produk" required>
            </div> 
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="" class="form-select" required>
                    <option value="">-----------</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password " required>
            </div>
           
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>
</x-navbar>