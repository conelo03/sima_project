<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky pt-3 text-white">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('home') ? 'bg-info' : '' }}" href="/home">
                            <i class="bi bi-house-door-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ $title === 'Profil' ? 'bg-info' : '' }}" href="/profil">
                            <i class="bi bi-person-circle"></i> Profil
                        </a>
                    </li>
                    @if (auth()->user()->jabatan === 'Pengurus' || auth()->user()->jabatan === 'Ketua')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('agenda*') ? 'bg-info' : '' }}"
                                href="/agenda">
                                <i class="bi bi-calendar-fill"></i> Agenda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('pengajuan*') ? 'bg-info' : '' }}"
                                href="/pengajuan">
                                <i class="bi bi-file-earmark-plus-fill"></i>
                                Pengajuan Surat
                            </a>
                        </li>
                        @if (auth()->user()->jabatan === 'Ketua')
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Request::is('absensi*') ? 'bg-info' : '' }}"
                                    href="/absensi">
                                    <i class="bi bi-clipboard-check-fill"></i>
                                    Absensi
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link text-white dropdown-toggle {{ Request::is('arsip*', 'surat-masuk*', 'surat-keluar*', 'lainnya*') ? 'bg-info' : '' }}"
                                    href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-folder-fill"></i> Arsip
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('surat-masuk*') ? 'bg-info' : '' }}"
                                            href="/surat-masuk">Surat Masuk</a></li>
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('surat-keluar*') ? 'bg-info' : '' }}"
                                            href="/surat-keluar">Surat Keluar</a></li>
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('lainnya*') ? 'bg-info' : '' }}"
                                            href="/lainnya">Dokumen Lainnya</a></li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ Request::is('arsip*', 'surat-masuk*', 'surat-keluar*', 'lainnya*') ? 'bg-info' : '' }}"
                                href="/arsip">
                                <i class="bi bi-folder-fill"></i> Arsip
                            </a>
                        </li>
                        <div class="ms-3">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('surat-masuk*') ? 'bg-info' : '' }}"
                                    href="/surat-masuk">
                                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                    Surat Masuk
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('surat-keluar*') ? 'bg-info' : '' }}"
                                    href="/surat-keluar">
                                    <i class="bi bi-file-earmark-arrow-up-fill"></i>
                                    Surat Keluar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('lainnya*') ? 'bg-info' : '' }}" href="/lainnya">
                                    <i class="bi bi-file-earmark-fill"></i>
                                    Dokumen Lainnya
                                </a>
                            </li>
                        </div> --}}
                    @elseif(auth()->user()->jabatan === 'Pembina')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('agenda*') ? 'bg-info' : '' }}"
                                href="/agenda">
                                <i class="bi bi-calendar-fill"></i> Agenda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('absensi*') ? 'bg-info' : '' }}"
                                href="/absensi">
                                <i class="bi bi-clipboard-check-fill"></i>
                                Absensi
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link text-white dropdown-toggle {{ Request::is('arsip*', 'surat-masuk*', 'surat-keluar*', 'lainnya*') ? 'bg-info' : '' }}"
                                    href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-folder-fill"></i> Arsip
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('surat-masuk*') ? 'bg-info' : '' }}"
                                            href="/surat-masuk">Surat Masuk</a></li>
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('surat-keluar*') ? 'bg-info' : '' }}"
                                            href="/surat-keluar">Surat Keluar</a></li>
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('lainnya*') ? 'bg-info' : '' }}"
                                            href="/lainnya">Dokumen Lainnya</a></li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('arsip*', 'surat-masuk*', 'surat-keluar*', 'lainnya*') ? 'bg-info' : '' }}"
                                href="/arsip">
                                <i class="bi bi-folder-fill"></i> Arsip
                            </a>
                        </li>
                        <div class="ms-3">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('surat-masuk*') ? 'bg-info' : '' }}"
                                    href="/surat-masuk">
                                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                    Surat Masuk
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('surat-keluar*') ? 'bg-info' : '' }}"
                                    href="/surat-keluar">
                                    <i class="bi bi-file-earmark-arrow-up-fill"></i>
                                    Surat Keluar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('lainnya*') ? 'bg-info' : '' }}" href="/lainnya">
                                    <i class="bi bi-file-earmark-fill"></i>
                                    Dokumen Lainnya
                                </a>
                            </li>
                        </div> --}}
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('user*') ? 'bg-info' : '' }}" href="/user">
                                <i class="bi bi-person-lines-fill"></i> User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('agenda*') ? 'bg-info' : '' }}"
                                href="/agenda">
                                <i class="bi bi-calendar-fill"></i> Agenda
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link text-white dropdown-toggle {{ Request::is('arsip*', 'surat-masuk*', 'surat-keluar*', 'lainnya*') ? 'bg-info' : '' }}"
                                    href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-folder-fill"></i> Arsip
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('surat-masuk*') ? 'bg-info' : '' }}"
                                            href="/surat-masuk">Surat Masuk</a></li>
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('surat-keluar*') ? 'bg-info' : '' }}"
                                            href="/surat-keluar">Surat Keluar</a></li>
                                    <li><a class="dropdown-item nav-link text-black {{ Request::is('lainnya*') ? 'bg-info' : '' }}"
                                            href="/lainnya">Dokumen Lainnya</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('absensi*') ? 'bg-info' : '' }}"
                                href="/absensi">
                                <i class="bi bi-clipboard-check-fill"></i>
                                Absensi
                            </a>
                        </li>
                    @endif
                    <li class="nav-item" style="height: 30em">
                        <div class="nav-link text-secondary">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="bg-dark ps-0 text-white border-0"><i
                                        class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color:#EDFBFE">

            @yield('container')

        </main>
    </div>
</div>
