<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\Wahana;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function LaporanPenjualan()
    {
        $transaksi = Transaksi::with(['wahana', 'user', 'jadwal'])->get();
        $pdf = PDF::loadView('pdf.laporan-penjualan', array('transaksi' => $transaksi));
        return $pdf->stream();
    }

    public function LaporanWahana()
    {
        $wahana = Wahana::all();
        $pdf = PDF::loadView('pdf.laporan-ketersedian-wahana', array('wahana' => $wahana));
        return $pdf->stream();
    }

    public function LaporanUlasan()
    {
        $ulasan = Ulasan::with(['wahana', 'user'])->get();
        $pdf = PDF::loadView('pdf.laporan-ulasan', array('ulasan' => $ulasan));
        return $pdf->stream();
    }

    public function LaporanPengunjung()
    {
        $user = User::where('role', 'pengunjung')->get();
        $pdf = PDF::loadView('pdf.laporan-pengunjung', array('user' => $user));
        return $pdf->stream();
    }
}
