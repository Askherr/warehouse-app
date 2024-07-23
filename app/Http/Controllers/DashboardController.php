<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\DataStok;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKaryawan = Karyawan::count();
        $jumlahBarangMasuk = BarangMasuk::count();
        $jumlahBarangKeluar = BarangKeluar::count();
        $jumlahStok = DataStok::count();

        $data=[
            "jumlahkaryawan"=> $jumlahKaryawan,
            "jumlahbarangkeluar"=> $jumlahBarangKeluar,
            "jumlahbarangmasuk"=> $jumlahBarangMasuk,
            "jumlahstok"=> $jumlahStok
        ];

        // return Voyager::view('voyager::index',compact('jumlahKaryawan', 'jumlahBarangMasuk', 'jumlahBarangKeluar', 'jumlahStok'));;
        return response()->json( $data );
    }
}
