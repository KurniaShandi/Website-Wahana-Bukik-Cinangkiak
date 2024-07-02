<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html"><img src="{{ asset('assets_frontend/images/logo.png') }}"
                style="height: 40px; width: 150px; object-fit: cover;" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('home-frontend') ? 'active' : '' }}"><a
                        href="{{ route('home-frontend') }}" class="nav-link">Home</a></li>
                <li class="nav-item {{ request()->routeIs('about-frontend') ? 'active' : '' }}"><a
                        href="{{ route('about-frontend') }}" class="nav-link">Tentang</a></li>
                <li class="nav-item {{ request()->routeIs('destinasi-frontend') ? 'active' : '' }}"><a
                        href="{{ route('destinasi-frontend') }}" class="nav-link">Destination</a></li>
                <li class="nav-item {{ request()->routeIs('contact-frontend') ? 'active' : '' }}"><a
                        href="{{ route('contact-frontend') }}" class="nav-link">Contact</a></li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->nama_lengkap }}
                            <img src="{{ asset('images/foto/' . Auth::user()->foto) }}"
                                style="height: 30px; width: 30px; border-radius: 50%; object-fit: cover; margin-left: 5px;">
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#" style="color: black;"
                                    onmouseover="this.style.color='#00FF00'"
                                    onmouseout="this.style.color='green'">Profil</a></li>
                            @if (Auth::user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}" style="color: black;"
                                        onmouseover="this.style.color='#00FF00'"
                                        onmouseout="this.style.color='green'">Dashboard Admin</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('index-booking') }}" style="color: black;"
                                    onmouseover="this.style.color='#00FF00'" onmouseout="this.style.color='green'">Riwayat Booking</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" style="color: black;"
                                    onmouseover="this.style.color='#00FF00'"
                                    onmouseout="this.style.color='green'">Keluar</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('index-login') }}" class="nav-link"><i class="fa fa-user"></i> Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
