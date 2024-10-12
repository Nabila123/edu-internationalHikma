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
                                <li><a href="{{ route('profile.tentang-sekolah') }}">Tentang Sekolah</a></li>
                                <li><a href="{{ route('profile.sejarah-sekolah') }}">Sejarah Sekolah</a></li>
                                <li><a href="{{ route('profile.profile-yayasan') }}">Profile Yayasan</a></li>
                                <li><a href="{{ route('profile.profile-pengajar') }}">Profile Pengajar</a></li>
                                <li><a href="{{ route('profile.visi-misi-sekolah') }}">Visi Misi Sekolah</a></li>
                                <li><a href="{{ route('profile.standart-kompetensi-lulusan') }}">Standar Kompetensi
                                        Lulusan</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Akademik</a>
                            <ul class="submenu w-200px">
                                <li><a href="{{ route('akademik.program-unggulan') }}">Program Unggulan</a></li>
                                <li>
                                    <a href="{{ route('akademik.asrama') }}">Asrama</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
                        <li><a href="{{ route('galeri') }}">Galeri</a></li>
                        <li>
                            <a href="javascript:void(0);">Berita</a>
                            <ul class="submenu">
                                <li><a href="{{ route('berita.kabar') }}">Kabar</a></li>
                                <li><a href="{{ route('berita.blog') }}">Blog</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('karier') }}">Karier / Lowongan</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-12 d-block d-lg-none">
            <div id="mobile_menu"></div>
        </div>
    </div>
</div>
