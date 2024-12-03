<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="nav-icon fas fa-industry"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        @role('sekretaris')
            <li class="nav-item">
                <a href="{{ route('kategori') }}" class="nav-link {{ request()->routeIs('kategori') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Kategori
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('barang') }}" class="nav-link {{ request()->routeIs('barang') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                        Daftar Harta
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('lokasi') }}" class="nav-link {{ request()->routeIs('lokasi') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-map-marker-alt mr-1"></i>
                    <p>
                        Lokasi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hartaMasuk') }}" class="nav-link {{ request()->routeIs('hartaMasuk') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>
                        Harta Masuk
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hartaKeluar') }}"
                    class="nav-link {{ request()->routeIs('hartaKeluar') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>
                        Harta Keluar
                    </p>
                </a>
            </li>
        @endrole

        @role('ketua')
            <li class="nav-item">
                <a href="{{ route('laporan') }}" class="nav-link {{ request()->routeIs('laporan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>
                        Laporan
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user') }}" class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>
        @endrole
    </ul>
</nav>
