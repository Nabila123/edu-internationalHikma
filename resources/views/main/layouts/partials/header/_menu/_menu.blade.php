<div class="header-bottom-inner">
    <div class="row align-items-center">
        <div class="col-lg-3 col-sm-9">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('assets/media/images/icon/logo.png') }}" alt="logo" /></a>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7 d-none d-lg-block">
            <div class="main-menu">
                <nav>
                    <ul id="m_menu_active">
                        <li class="active">
                            <a href="{{ route('main.home') }}">Home</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Profile</a>
                            <ul class="submenu w-250px">
                                <li><a href="{{ route('main.home') }}">Tentang Sekolah</a></li>
                                <li><a href="{{ route('main.home') }}">Sejarah Sekolah</a></li>
                                <li><a href="{{ route('main.home') }}">Profile Yayasan</a></li>
                                <li><a href="{{ route('main.home') }}">Profile Pengajar</a></li>
                                <li><a href="{{ route('main.home') }}">Visi Misi Sekolah</a></li>
                                <li><a href="{{ route('main.home') }}">Standar Kompetensi Lulusan</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Akademik</a>
                            <ul class="submenu w-200px">
                                <li><a href="{{ route('main.home') }}">Program Unggulan</a></li>
                                <li>
                                    <a href="{{ route('main.home') }}">Asrama</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('main.home') }}">Prestasi</a></li>
                        <li><a href="{{ route('main.home') }}">Galeri</a></li>
                        <li>
                            <a href="javascript:void(0);">Berita</a>
                            <ul class="submenu">
                                <li><a href="{{ route('main.home') }}">Kabar</a></li>
                                <li><a href="{{ route('main.home') }}">Blog</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('main.home') }}">Karir</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-12 d-block d-lg-none">
            <div id="mobile_menu"></div>
        </div>
    </div>
</div>
