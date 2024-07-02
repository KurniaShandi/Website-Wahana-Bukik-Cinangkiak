@extends('backend.layouts.main')
@section('contents')
    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="text-end" style="margin-top: 20px;">
                            <a href="{{ route('create-transaksi') }}" class="btn btn-primary mb-3">Tambah Data</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pemesanan</th>
                                        <th>Wahana</th>
                                        <th>Pengunjung</th>
                                        <th>Jadwal</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th>Kode Tiket</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $data)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="barcode">
                                                    {!! DNS1D::getBarcodeHTML($data->kode_pemesanan, 'C128', 1.5, 30) !!}
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        {{ $data->kode_pemesanan }}
                                                    </small>
                                                </p>
                                            </td>
                                            <td>{{ $data->wahana->nama_wahana }}</td>
                                            <td>{{ $data->user->nama_lengkap }}</td>
                                            <td>{{ $data->jadwal->hari_operasional }}
                                                ({{ \Carbon\Carbon::parse($data->jadwal->waktu_mulai)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($data->jadwal->waktu_selesai)->format('H:i') }})
                                            </td>
                                            <td>
                                                <img src="{{ url('images/bukti_pembayaran/' . $data->bukti_pembayaran) }}"
                                                    class="rounded img-fluid" alt="profile"
                                                    style="width: 100px; height: 100px;" />
                                            </td>
                                            <td>
                                                @if($data->status == 'sukses')
                                                    <span class="btn btn-success btn-sm" style="pointer-events: none;">Sukses</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm" style="pointer-events: none;">Pending</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->kode_tiket }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <form action="{{ route('update-transaksi', $data->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-success btn-sm me-2" title="Oke">
                                                            <i class="bi bi-check-lg"></i> Oke
                                                        </button>
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                                        onclick="confirmDelete({{ $data->id }})">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                                <form id="deleteForm_{{ $data->id }}"
                                                    action="{{ route('destroy-transaksi', $data->id) }}" method="POST"
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
        </div>
    </section>
@endsection
