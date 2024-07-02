<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Payment;
use App\Models\Transaksi;
use App\Models\Ulasan;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wahana = Wahana::all();
        return view('frontend.pages.destinasi', [
            'wahana' => $wahana,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jadwal_id' => 'required|exists:jadwals,id',
            'jumlah_tiket' => 'required|integer|min:1',
            'total_bayar' => 'required|numeric|min:0',
            'payment_id' => 'required|exists:payments,id',
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $jadwal = Jadwal::find($request->jadwal_id);
        if ($jadwal->stock < $request->jumlah_tiket) {
            return redirect()->back()->with('error', 'Stock tiket tidak mencukupi.');
        }

        $jadwal->stock -= $request->jumlah_tiket;
        $jadwal->save();

        $huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $kode_pemesanan = strtoupper(substr(str_shuffle($huruf), 0, 7));

        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $bukti_pembayaran->storeAs('/images/bukti_pembayaran/', $bukti_pembayaran->hashName());

        $jumlah_tiket = $request->jumlah_tiket;
        $kode_tiket_array = [];

        for ($i = 0; $i < $jumlah_tiket; $i++) {
            $huruf_angka = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $kode_tiket = strtoupper(substr(str_shuffle($huruf_angka), 0, 7));
            $kode_tiket_array[] = $kode_tiket;
        }
        $kode_tiket_string = implode(',', $kode_tiket_array);

        $data = [
            'kode_pemesanan' => $kode_pemesanan,
            'bukti_pembayaran' => $bukti_pembayaran->hashName(),
            'kode_tiket' => $kode_tiket_string,
            'jumlah_tiket' => $request->jumlah_tiket,
            'tanggal_transaksi' => now(),
            'total_bayar' => $request->total_bayar,
            'status' => 'pending',
            'jadwal_id' => $request->jadwal_id,
            'user_id' => Auth::id(),
            'wahana_id' => $request->wahana_id,
            'payment_id' => $request->payment_id,
        ];

        Transaksi::create($data);

        return redirect()->route('home-frontend')->with('success', 'Data Transaksi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wahana = Wahana::find($id);
        $jadwal = Jadwal::where('wahana_id', $id)->get();
        $ulasan = Ulasan::with('user')->where('wahana_id', $id)->get();
        $payment = Payment::all();
        return view('frontend.pages.destinasi-detail', [
            'wahana' => $wahana,
            'jadwal' => $jadwal,
            'payment' => $payment,
            'ulasan' => $ulasan,
        ]);
    }

    public function storeUlasan(Request $request)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Anda harus login untuk memberikan komentar.');
        }

        $validator = Validator::make($request->all(), [
            'komentar' => 'required',
        ], [
            'komentar.required' => 'Komentar harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'user_id' => Auth::id(),
            'wahana_id' => $request->wahana_id,
            'komentar' => $request->komentar,
        ];

        Ulasan::create($data);

        return redirect()->route('home-frontend')->with('success', 'Komentar berhasil disimpan.');
    }

    public function booking()
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('index-login')->with('error', 'Anda harus login untuk melihat riwayat booking.');
        }

        $transaksi = Transaksi::with(['wahana', 'user', 'jadwal'])
            ->where('user_id', Auth::id())
            ->where('status', 'success')
            ->get();
        return view('frontend.pages.index-booking', [
            'transaksi' => $transaksi,
        ]);
    }

    public function showBooking(string $id)
    {
        $transaksi = Transaksi::with(['wahana', 'user', 'jadwal'])
            ->where('id', $id)
            ->first();
        return view('frontend.pages.booking-detail', [
            'transaksi' => $transaksi,
        ]);
    }
}
