<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalWahanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::with('wahana')->get();
        return view('backend.pages.jadwal-wahana.index', [
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wahana = Wahana::all();
        return view('backend.pages.jadwal-wahana.create', [
            'wahana' => $wahana,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wahana_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'stock' => 'required',
            'hari_operasional' => 'required|array',
        ], [
            'wahana_id.required' => 'Wahana harus diisi',
            'waktu_mulai.required' => 'Waktu mulai operasional harus diisi',
            'waktu_selesai.required' => 'Waktu selesai operasional harus diisi',
            'hari_operasional.required' => 'Hari Operasional harus diisi',
            'stock.required' => 'Stock Tiket harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Menggabungkan nilai array menjadi string yang dipisahkan koma
        $hari_operasional = implode(',', $request->hari_operasional);

        // Menyimpan data siswa ke dalam database
        $data = [
            'wahana_id' => $request->wahana_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'hari_operasional' => $hari_operasional,
            'stock' => $request->stock,
        ];

        Jadwal::create($data);

        return redirect()->route('index-jadwal-wahana')->with('success', 'Data Jadwal Wahana berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wahana = Wahana::all();
        $jadwal = Jadwal::find($id);
        return view('backend.pages.jadwal-wahana.edit', [
            'wahana' => $wahana,
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'wahana_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'stock' => 'required',
            'hari_operasional' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $jadwal = Jadwal::find($id);

        // Menggabungkan nilai array menjadi string yang dipisahkan koma
        $hari_operasional = implode(',', $request->hari_operasional);

        $jadwal->update([
            'wahana_id' => $request->wahana_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'hari_operasional' => $hari_operasional,
            'stock' => $request->stock,
        ]);

        return redirect()->route('index-jadwal-wahana')->with('success', 'Data Jadwal Wahana berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $jadwal = Jadwal::find($id);

        // Hapus data jadwal dari database
        $jadwal->delete();

        return redirect()->route('index-jadwal-wahana')->with('success', 'Data Jadwal wahana berhasil dihapus.');
    }
}
