<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print PDF - Laporan Ulasan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        .header {
            text-align: center;
            padding: 10px 0;
            position: relative;
        }

        .header img {
            position: absolute;
            left: 20px;
            top: 10px;
            width: 100px;
            height: 100px;
        }

        .header h1,
        .header p {
            margin: 0;
            padding: 0;
        }

        .header h1 {
            font-size: 24px;
        }

        .header p {
            font-size: 14px;
        }

        .divider {
            border-top: 2px solid #000;
            margin: 20px 0;
        }

        .content {
            margin-top: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .text {
            font-size: 14px;
            line-height: 1.5;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            color: #fff;
        }

        .badge-light-primary {
            background-color: #007bff;
        }

        .badge-light-dark {
            background-color: #343a40;
        }

        .badge-light-info {
            background-color: #17a2b8;
        }

        .badge-light-success {
            background-color: #28a745;
        }

        .badge-light-danger {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="title">Laporan Ulasan</div>
            <div class="section">
                <table class="table">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800">
                            <th class="min-w-10px text-center">No.</th>
                            <th class="min-w-100px text-center">Nama Pengunjung</th>
                            <th class="min-w-100px text-center">Nama Wahana</th>
                            <th class="min-w-150px text-center">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ulasan as $data)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $data->user->nama_lengkap }}</td>
                                <td>{{ $data->wahana->nama_wahana }}</td>
                                <td>{{ $data->komentar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
