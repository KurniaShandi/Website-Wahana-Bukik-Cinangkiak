@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Data Ulasan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Ulasan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="text-end" style="margin-top: 20px;">
                            <a href="{{ route('create-ulasan') }}" class="btn btn-primary mb-3">Tambah Data</a>
                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Wahana</th>
                                    <th>Nama Pengguna</th>
                                    <th>Komentar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ulasan as $data)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $data->wahana ? $data->wahana->nama_wahana : 'Nama wahana tidak tersedia' }}</td>
                                        <td>{{ $data->user ? $data->user->nama_lengkap : 'Nama Pengguna tidak tersedia' }}</td>
                                        <td>{{ $data->komentar }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-success btn-sm me-2" title="Edit"
                                                    onclick="window.location.href='{{ route('edit-ulasan', $data->id) }}'">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="confirmDelete({{ $data->id }})">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </div>
                                            <form id="deleteForm_{{ $data->id }}"
                                                action="{{ route('destroy-ulasan', $data->id) }}" method="POST" style="display:none;">
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
