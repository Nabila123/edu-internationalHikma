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

        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
            <a href="#" class="menu-link">
                <span class="menu-title">Main Layouting</span>
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
