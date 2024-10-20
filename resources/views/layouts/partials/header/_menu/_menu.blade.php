<div class="
        app-header-menu
        app-header-mobile-drawer
        align-items-stretch
    "
    data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
    data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
    data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">

    <div class=" menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
        id="kt_app_header_menu" data-kt-menu="true">
        <div class="menu-item">
            <a href="/" class="menu-link">
                <span class="menu-title">Home</span>
            </a>
        </div>

        @canany(['main-layouting-profile-tentang-sekolah-read', 'main-layouting-profile-sejarah-sekolah-read',
            'main-layouting-profile-profile-yayasan-read', 'main-layouting-profile-profile-pengajar-read',
            'main-layouting-profile-visi-misi-read', 'main-layouting-profile-standart-kompetensi-read',
            'main-layouting-akademik-program-unggulan-read', 'main-layouting-akademik-asrama-read',
            'main-layouting-prestasi-read', 'main-layouting-galeri-read', 'main-layouting-berita-kabar-read',
            'main-layouting-berita-blog-read', 'main-layouting-kontak-read', 'main-layouting-karier-read'])
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                <a href="#" class="menu-link">
                    <span class="menu-title">Main Layouting</span>
                    <span class="menu-arrow"></span>
                </a>

                <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">

                    @can('main-layouting-setting-read')
                        <div class="menu-item">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-gear fs-2">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <span class="menu-title">Setting & Dashboard</span>
                            </a>
                        </div>
                    @endcan

                    @canany(['main-layouting-profile-tentang-sekolah-read', 'main-layouting-profile-sejarah-sekolah-read',
                        'main-layouting-profile-profile-yayasan-read', 'main-layouting-profile-profile-pengajar-read',
                        'main-layouting-profile-visi-misi-read', 'main-layouting-profile-standart-kompetensi-read'])
                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                            class="menu-item menu-lg-down-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-school fs-6"></i>
                                </span>
                                <span class="menu-title text-dark">Profile Sekolah</span>
                                <span class="menu-arrow text-dark w-15px h-15px"><i class="ki-duotone ki-right">
                                    </i></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                @can('main-layouting-profile-tentang-sekolah-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.profile.tentang-sekolah.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Tentang Sekolah</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('main-layouting-profile-sejarah-sekolah-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.profile.sejarah-sekolah.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Sejarah Sekolah</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('main-layouting-profile-profile-yayasan-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.profile.profile-yayasan.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Profile Yayasan</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('main-layouting-profile-profile-pengajar-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.profile.profile-pengajar.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Profile Pengajar</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('main-layouting-profile-visi-misi-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.profile.visi-misi.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Visi Misi Sekolah</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('main-layouting-profile-standart-kompetensi-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.profile.standart-kompetensi.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Standart Kompetensi Kelulusan</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcanany

                    @canany(['main-layouting-akademik-program-unggulan-read', 'main-layouting-akademik-asrama-read'])
                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                            class="menu-item menu-lg-down-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-school-circle-check fs-6"></i>
                                </span>
                                <span class="menu-title text-dark">Akademik</span>
                                <span class="menu-arrow text-dark w-15px h-15px"><i class="ki-duotone ki-right">
                                    </i></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                @can('main-layouting-akademik-program-unggulan-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.akademik.program-unggulan.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Program Unggulan</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('main-layouting-akademik-asrama-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.akademik.asrama.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Asrama</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcanany

                    @can('main-layouting-prestasi-read')
                        <div class="menu-item">
                            <a href="{{ route('main.prestasi.index') }}" class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-graduation-cap fs-6"></i>
                                </span>
                                <span class="menu-title">Prestasi</span>
                            </a>
                        </div>
                    @endcan

                    @can('main-layouting-galeri-read')
                        <div class="menu-item">
                            <a href="{{ route('main.galeri.index') }}" class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-images fs-6"></i>
                                </span>
                                <span class="menu-title">Galeri</span>
                            </a>
                        </div>
                    @endcan

                    @canany(['main-layouting-berita-kabar-read', 'main-layouting-berita-blog-read'])
                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                            class="menu-item menu-lg-down-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-newspaper fs-6"></i>
                                </span>
                                <span class="menu-title text-dark">Berita</span>
                                <span class="menu-arrow text-dark w-15px h-15px"><i class="ki-duotone ki-right">
                                    </i></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                @can('main-layouting-berita-kabar-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.berita.kabar.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Kabar</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('main-layouting-berita-blog-read')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('main.berita.blog.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-dark">Blog</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcanany

                    @can('main-layouting-karier-read')
                        <div class="menu-item">
                            <a href="{{ route('main.karier.index') }}" class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-handshake fs-6"></i>
                                </span>
                                <span class="menu-title">Karier / Lowongan</span>
                            </a>
                        </div>
                    @endcan

                    @can('main-layouting-kontak-read')
                        <div class="menu-item">
                            <a href="{{ route('main.kontak-kami.index') }}" class="menu-link">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-address-card fs-6"></i>
                                </span>
                                <span class="menu-title">Kontak Sekolah</span>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        @endcanany

        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
            <a href="#" class="menu-link">
                <span class="menu-title">Management</span>
                <span class="menu-arrow"></span>
            </a>

            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">

                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                    class="menu-item menu-lg-down-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-book-square fs-2">
                                <span class="path1 fs-2"></span>
                                <span class="path2 fs-2"></span>
                                <span class="path3 fs-2"></span>
                            </i>
                        </span>
                        <span class="menu-title text-dark">Rekapan Mutasi</span>
                        <span class="menu-arrow text-dark w-15px h-15px"><i class="ki-duotone ki-right">
                            </i></span>
                    </span>
                    <div
                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-dark">History Biller</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-dark">Mutasi Biller</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-dark">Mutasi CMS</span>
                            </a>
                        </div>
                    </div>
                </div>

                @can('users-read')
                    <div class="menu-item">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-profile-circle fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                            <span class="menu-title">Pengguna / User</span>
                        </a>
                    </div>
                @endcan
            </div>
        </div>

        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
            <a href="#" class="menu-link">
                <span class="menu-title">Logs</span>
                <span class="menu-arrow"></span>
            </a>

            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                <div class="menu-item">
                    <a href="{{ route('logs.auth') }}" class="menu-link">
                        <span class="menu-title">Login</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a href="{{ url('logs-system') }}" class="menu-link">
                        <span class="menu-title">System</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a href="{{ route('logs.activity') }}" class="menu-link">
                        <span class="menu-title">Activity</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
