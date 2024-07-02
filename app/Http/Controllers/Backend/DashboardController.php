<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['wahana', 'user', 'jadwal'])->where('status', 'pending')->get();
        return view('backend.dashboard', [
            'transaksi' => $transaksi,
        ]);
    }
}
