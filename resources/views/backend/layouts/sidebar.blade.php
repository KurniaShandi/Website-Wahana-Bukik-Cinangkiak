<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#data-master-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-archive"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="data-master-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('index-users') }}">
                        <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('index-payment') }}">
                        <i class="bi bi-circle"></i><span>Payment</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('index-wahana') }}">
                        <i class="bi bi-circle"></i><span>Wahana</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('index-jadwal-wahana') }}">
                        <i class="bi bi-circle"></i><span>Jadwal Wahana</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('index-transaksi') }}">
                <i class="bi bi-cash"></i>
                <span>Transaksi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('index-ulasan') }}">
                <i class="bi bi-pencil-square"></i>
                <span>Ulasan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-file-earmark-text"></i><span>Laporan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="laporan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li style="margin-left: 40px; margin-bottom: 10px;">
                    <form action="{{ route('laporan-penjualan') }}" method="POST" target="_blank" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link p-0" style="text-decoration: none; color: inherit; font-size: 14px; background: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
                            <i class="bi bi-circle" style="font-size: 10px;"></i><span>Penjualan Harian</span>
                        </button>
                    </form>
                </li>
                <li style="margin-left: 40px; margin-bottom: 10px;">
                    <form action="{{ route('laporan-wahana') }}" method="POST" target="_blank" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link p-0" style="text-decoration: none; color: inherit; font-size: 14px; background: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
                            <i class="bi bi-circle" style="font-size: 10px;"></i><span>Ketersedian Wahana</span>
                        </button>
                    </form>
                </li>
                <li style="margin-left: 40px; margin-bottom: 10px;">
                    <form action="{{ route('laporan-ulasan') }}" method="POST" target="_blank" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link p-0" style="text-decoration: none; color: inherit; font-size: 14px; background: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
                            <i class="bi bi-circle" style="font-size: 10px;"></i><span>Umpan Balik Pelanggan</span>
                        </button>
                    </form>
                </li>
                <li style="margin-left: 40px; margin-bottom: 10px;">
                    <form action="{{ route('laporan-pengunjung') }}" method="POST" target="_blank" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link p-0" style="text-decoration: none; color: inherit; font-size: 14px; background: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
                            <i class="bi bi-circle" style="font-size: 10px;"></i><span>Pengunjung</span>
                        </button>
                    </form>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#data-konten-website" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-folder2-open"></i><span>Konten Website</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="data-konten-website" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('index-about') }}">
                        <i class="bi bi-circle"></i><span>About</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('index-payment') }}">
                        <i class="bi bi-circle"></i><span>Carousel Landing</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</aside>
