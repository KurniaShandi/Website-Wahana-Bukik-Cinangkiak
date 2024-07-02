<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasan = Ulasan::with(['wahana', 'user'])->get();
        return view('backend.pages.ulasan.index', [
            'ulasan' => $ulasan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wahana = Wahana::all();
        $user = User::all();
        return view('backend.pages.ulasan.create', [
            'wahana' => $wahana,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wahana_id' => 'required',
            'user_id' => 'required',
            'komentar' => 'required',
        ], [
            'wahana_id.required' => 'Nama Wahana harus diisi',
            'user_id.required' => 'Nama Pengguna harus diisi',
            'komentar.required' => 'Komentar harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'user_id' => $request->user_id,
            'wahana_id' => $request->wahana_id,
            'komentar' => $request->komentar,
        ];

        Ulasan::create($data);

        return redirect()->route('index-ulasan')->with('success', 'Data Ulasan berhasil disimpan.');
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
        $user = User::all();
        $ulasan = Ulasan::find($id);
        return view('backend.pages.ulasan.edit', [
            'wahana' => $wahana,
            'user' => $user,
            'ulasan' => $ulasan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'wahana_id' => 'required',
            'user_id' => 'required',
            'komentar' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $ulasan = Ulasan::find($id);

        $ulasan->update([
            'user_id' => $request->user_id,
            'wahana_id' => $request->wahana_id,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('index-ulasan')->with('success', 'Data Ulasan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ulasan = Ulasan::find($id);
        $ulasan->delete();

        return redirect()->route('index-ulasan')->with('success', 'Data Ulasan berhasil dihapus.');
    }
}
