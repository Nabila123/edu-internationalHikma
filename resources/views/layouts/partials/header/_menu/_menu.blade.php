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
                <span class="menu-title">Management</span>
                <span class="menu-arrow"></span>
            </a>

            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
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
