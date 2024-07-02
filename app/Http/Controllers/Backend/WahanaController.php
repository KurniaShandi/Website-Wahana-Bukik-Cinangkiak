<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WahanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wahana = Wahana::all();
        return view('backend.pages.wahana.index', [
            'wahana' => $wahana,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.wahana.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_wahana' => 'required|unique:wahanas,nama_wahana',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_wahana.required' => 'Nama Wahana harus diisi',
            'nama_wahana.unique' => 'Nama Wahana sudah digunakan',
            'harga.required' => 'Harga harus diisi dengan angka',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg',
            'foto.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $foto = $request->file('foto');
        $foto->storeAs('/images/foto/', $foto->hashName());

        // Menyimpan data siswa ke dalam database
        $data = [
            'nama_wahana' => $request->nama_wahana,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $foto->hashName(),
        ];

        Wahana::create($data);

        return redirect()->route('index-wahana')->with('success', 'Data Wahana berhasil disimpan.');
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
        $wahana = Wahana::find($id);
        return view('backend.pages.wahana.edit', [
            'wahana' => $wahana,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_wahana' => 'required|unique:wahanas,nama_wahana,' . $id,
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $wahana = Wahana::find($id);
        $foto = $request->file('foto');

        if ($foto) {
            // hapus foto lama
            Storage::exists('images/foto/' . $wahana->foto);
            Storage::delete('images/foto/' . $wahana->foto);
            // upload foto baru
            $foto->storeAs('/images/foto/', $foto->hashName());
            $wahana->update([
                'nama_wahana' => $request->nama_wahana,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'foto' => $foto->hashName(),
            ]);
        } else {
            $wahana->update([
                'nama_wahana' => $request->nama_wahana,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
            ]);
        }

        return redirect()->route('index-wahana')->with('success', 'Data Wahana berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wahana = Wahana::find($id);

        // Hapus foto wahana jika ada
        Storage::exists('images/foto/' . $wahana->foto);
        Storage::delete('images/foto/' . $wahana->foto);

        // Hapus data wahana dari database
        $wahana->delete();

        return redirect()->route('index-wahana')->with('success', 'Data wahana berhasil dihapus.');
    }
}
