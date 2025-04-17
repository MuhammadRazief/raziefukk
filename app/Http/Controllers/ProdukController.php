<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('images'), $gambarName);

       $produk = Produk::create([
            'kode' => Str::random(10),
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambarName,
        ]);

        if($produk){
            return redirect()->route('produk.index')->with('success', 'Produk created successfully.');
        }else{
            return redirect()->route('produk.index')->with('error', 'Produk failed to create.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
public function edit(string $id)
{
    $produk = Produk::where('id', $id)->first();
    return view('Produk.edit', compact('produk'));
}

public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'nama' => 'required',
        'harga' => 'required',
        'stok' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $produk = Produk::find($id);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('images'), $gambarName);
        $produk->gambar = $gambarName;
    }

    $produk->nama = $request->nama;
    $produk->harga = $request->harga;
    $produk->stok = $request->stok;

    if ($produk->save()) {
        return redirect()->route('produk.index')->with('success', 'Produk updated successfully.');
    } else {
        return redirect()->route('produk.index')->with('error', 'Produk failed to update.');
    }
}
public function updateStok(Request $request, $id)
{
    $request->validate([
        'stok' => 'required|integer',
    ]);

    $produk = Produk::find($id);
    if ($produk) {
        $produk->stok = $request->stok + $produk->stok;
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Stok produk berhasil diperbarui.');
    }

    return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $produk = Produk::find($id);

    if ($produk) {
        // Hapus file gambar jika ada
        if ($produk->gambar && file_exists(public_path('images/' . $produk->gambar))) {
            unlink(public_path('images/' . $produk->gambar));
        }

        // Hapus produk dari database
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk deleted successfully.');
    } else {
        return redirect()->route('produk.index')->with('error', 'Produk failed to delete.');
    }
}
}
