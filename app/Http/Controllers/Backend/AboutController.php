<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('backend.pages.about.index', [
            'about' => $about,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required|numeric',
            'email' => 'required|email',
            'link_youtube' => 'required|url',
            'link_facebook' => 'required|url',
            'link_instagram' => 'required|url',
            'link_email' => 'required|url',
            'link_twitter' => 'required|url',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'nomor_hp.required' => 'Nomor HP harus diisi',
            'nomor_hp.numeric' => 'Nomor HP harus berupa angka',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'link_youtube.required' => 'Link YouTube harus diisi',
            'link_youtube.url' => 'Link YouTube tidak valid',
            'link_facebook.required' => 'Link Facebook harus diisi',
            'link_facebook.url' => 'Link Facebook tidak valid',
            'link_instagram.required' => 'Link Instagram harus diisi',
            'link_instagram.url' => 'Link Instagram tidak valid',
            'link_email.required' => 'Link Email harus diisi',
            'link_email.url' => 'Link Email tidak valid',
            'link_twitter.required' => 'Link Twitter harus diisi',
            'link_twitter.url' => 'Link Twitter tidak valid',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg',
            'foto.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $foto = $request->file('foto');
        $foto->storeAs('/public/images/foto/', $foto->hashName());

        $data = [
            'foto' => $foto->hashName(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
            'link_youtube' => $request->link_youtube,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_email' => $request->link_email,
            'link_twitter' => $request->link_twitter,
        ];

        About::create($data);

        return redirect()->route('index-about')->with('success', 'Data About berhasil disimpan.');
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
        $about = About::find($id);
        return view('backend.pages.about.edit', [
            'about' => $about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required|numeric',
            'email' => 'required|email',
            'link_youtube' => 'required|url',
            'link_facebook' => 'required|url',
            'link_instagram' => 'required|url',
            'link_email' => 'required|url',
            'link_twitter' => 'required|url',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $about = About::find($id);
        $foto = $request->file('foto');

        if ($foto) {
            // hapus foto lama
            Storage::exists('images/foto/' . $about->foto);
            Storage::delete('images/foto/' . $about->foto);
            // upload foto baru
            $foto->storeAs('/images/foto/', $foto->hashName());
            $about->update([
                'foto' => $foto->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
                'email' => $request->email,
                'link_youtube' => $request->link_youtube,
                'link_facebook' => $request->link_facebook,
                'link_instagram' => $request->link_instagram,
                'link_email' => $request->link_email,
                'link_twitter' => $request->link_twitter,
            ]);
        } else {
            $about->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
                'email' => $request->email,
                'link_youtube' => $request->link_youtube,
                'link_facebook' => $request->link_facebook,
                'link_instagram' => $request->link_instagram,
                'link_email' => $request->link_email,
                'link_twitter' => $request->link_twitter,
            ]);
        }

        return redirect()->route('index-about')->with('success', 'Data Wahana berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::find($id);

        // Hapus foto about jika ada
        Storage::exists('images/foto/' . $about->foto);
        Storage::delete('images/foto/' . $about->foto);

        // Hapus data about dari database
        $about->delete();

        return redirect()->route('index-about')->with('success', 'Data about berhasil dihapus.');
    }
}
