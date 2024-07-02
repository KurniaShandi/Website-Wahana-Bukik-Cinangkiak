@extends('auth.layouts.main')
@section('contents')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="{{ route('home-frontend') }}" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assets_backend/img/logo.png') }}" alt="">
                            <span class="d-none d-lg-block">Wisata Bukik Cinangkiak</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>

                            <form action="{{ route('register-proses') }}" data-toggle="validator" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="yourName" required>
                                    @error('nama_lengkap')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                    <input type="hidden" name="nama_provinsi" id="nama_provinsi">
                                    @error('provinsi')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Kabupaten</label>
                                    <select name="kabupaten" id="kab_kota" class="form-control">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                    <input type="hidden" name="nama_kabupaten" id="nama_kabupaten">
                                    @error('kabupaten')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control">
                                    @error('alamat')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" name="username" class="form-control" id="yourUsername"
                                            required>
                                        @error('username')
                                            <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    @error('password')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="inputNumber" class="form-label">Foto</label>
                                    <input class="form-control" name="foto" type="file" id="formFile">
                                    @error('foto')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name="terms" type="checkbox" value=""
                                            id="acceptTerms" required>
                                        <label class="form-check-label" for="acceptTerms">I agree and accept the
                                            <a href="#">terms and conditions</a></label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Already have an account? <a href="{{ route('index-login') }}">Log
                                            in</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
