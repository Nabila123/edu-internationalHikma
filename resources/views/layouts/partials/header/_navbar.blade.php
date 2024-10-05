<div class="app-navbar flex-shrink-0">
    <div class="app-navbar-item align-items-stretch ms-1 ms-md-3"></div>
    <div class="app-navbar-item ms-1 ms-md-3"></div>
    <div class="app-navbar-item ms-1 ms-md-3"></div>
    <div class="app-navbar-item ms-1 ms-md-3"></div>
    <div class="app-navbar-item ms-1 ms-md-3"></div>
    <div class="app-navbar-item ms-1 ms-md-3"></div>

    <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
        <div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
            <span class="opacity-75 fs-8 fw-semibold lh-2 mb-1 text-uppercase">{{ getNamaUser() }}</span>
            <span class="fs-7 fw-bold lh-1 text-uppercase">{{ getRolesNameNavbar() }}</span>
        </div>
        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
            data-kt-menu-placement="bottom-end">
            <img src="{{ asset(getUserPhoto(\Auth::user()->id)) }} " alt="{{ getUserUuid(\Auth::user()->id) }} "
                onerror="this.onerror=null;this.src='assets/media/svg/avatars/blank.svg';" />
        </div>
        @include('partials.menus._user-account-menu')
    </div>
    <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
        <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
            <i class="ki-duotone ki-element-4 fs-1"><span class="path1"></span><span class="path2"></span></i>
        </div>
    </div>
</div>
