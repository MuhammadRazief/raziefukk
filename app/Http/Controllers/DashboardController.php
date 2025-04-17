<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){

        $jumlahProduk = Produk::count();
        // $jumlahTransaksi = Transaksi::count();
        $jumlahUser = User::count();
        if(!auth()->check()){
            return redirect()->route('login');
        }else{
            return view('dashboard' ,compact('jumlahProduk','jumlahUser'));
        }
        
    }
}
