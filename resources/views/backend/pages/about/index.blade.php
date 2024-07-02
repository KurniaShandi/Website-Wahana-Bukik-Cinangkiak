@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Data About</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Data About</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if ($about->count() == 0)
                            <div class="text-end" style="margin-top: 20px;">
                                <a href="{{ route('create-about') }}" class="btn btn-primary mb-3">Tambah Data</a>
                            </div>
                        @endif
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($about as $data)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ url('images/foto/' . $data->foto) }}" class="rounded img-fluid"
                                                alt="profile" style="width: 100px; height: 100px;" />
                                        </td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ Str::limit($data->deskripsi, 50) }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-success btn-sm me-2" title="Edit"
                                                    onclick="window.location.href='{{ route('edit-about', $data->id) }}'">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="confirmDelete({{ $data->id }})">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </div>
                                            <form id="deleteForm_{{ $data->id }}"
                                                action="{{ route('destroy-about', $data->id) }}" method="POST"
                                                style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <script>
                                                function confirmDelete(id) {
                                                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                                                        document.getElementById('deleteForm_' + id).submit();
                                                    }
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
