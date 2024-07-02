<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Payment;
use App\Models\StockTiket;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with(['wahana', 'user', 'jadwal'])->get();
        return view('backend.pages.transaksi.index', [
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wahana = Wahana::all();
        $user = User::all();
        $jadwal = Jadwal::all();
        $payment = Payment::all();
        return view('backend.pages.transaksi.create', [
            'wahana' => $wahana,
            'user' => $user,
            'jadwal' => $jadwal,
            'payment' => $payment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wahana_id' => 'required|exists:wahanas,id',
            'user_id' => 'required|exists:users,id',
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
            'user_id' => $request->user_id,
            'wahana_id' => $request->wahana_id,
            'payment_id' => $request->payment_id,
        ];

        Transaksi::create($data);

        return redirect()->route('index-transaksi')->with('success', 'Data Transaksi berhasil disimpan.');
    }

    public function oke(string $id)
    {
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            $transaksi->status = 'sukses';
            if ($transaksi->save()) {
                return redirect()->route('index-transaksi')->with('success', 'Status transaksi berhasil diperbarui.');
            } else {
                return redirect()->route('index-transaksi')->with('error', 'Gagal memperbarui status transaksi.');
            }
        } else {
            return redirect()->route('index-transaksi')->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->route('index-transaksi')->with('success', 'Data Transaksi berhasil dihapus.');
    }
}
