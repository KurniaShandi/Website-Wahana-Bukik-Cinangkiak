<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'username'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'username'     => $request->username,
            'password'  => $request->password,
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } else if (Auth::user()->role == 'pengunjung') {
                return redirect()->route('home-frontend');
            }
        } else {
            return redirect()->route('index-login')->with('failed', 'Email atau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home-frontend')->with('success', 'Kamu berhasil logout');
    }

    public function edit()
    {
        return view('auth.edit-profile');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'provinsi.required' => 'Provinsi harus diisi',
            'kabupaten.required' => 'Kabupaten harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password harus diisi',
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
            'nama_lengkap' => $request->nama_lengkap,
            'foto' => $foto->hashName(),
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'pengunjung',
        ];

        User::create($data);

        return redirect()->route('index-users')->with('success', 'Data User berhasil disimpan.');
    }
}
