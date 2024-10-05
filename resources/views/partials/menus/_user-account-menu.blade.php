<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
    data-kt-menu="true">
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <div class="symbol symbol-50px me-5">
                <img alt="{{ getUserUuid(\Auth::user()->id) }} " src="{{ asset(getUserPhoto(\Auth::user()->id)) }}"
                    onerror="this.onerror=null;this.src='assets/media/svg/avatars/blank.svg';" />

            </div>

            <div class="d-flex flex-column">
                <div class="fw-bold d-flex align-items-center fs-5">
                    {{ getNamaUser(\Auth::user()->id) }}
                </div>
                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                    {{ getEmailUser(\Auth::user()->id) }}
                </a>
            </div>
        </div>
    </div>

    <div class="separator my-2"></div>
    <div class="menu-item px-5">
        <a href="{{ route('profile.index') }}" class="menu-link px-5">
            Profile
        </a>
    </div>

    @canany(['roles-read', 'permissions-read', 'setting-backup-read'])
        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"
            class="menu-item menu-lg-down-accordion">
            <span class="menu-link">
                <span class="menu-title px-6">Setting Management</span>
                <span class="menu-arrow"></span>
            </span>

            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                @can('roles-read')
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('roles.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Roles</span>
                        </a>
                    </div>
                @endcan

                @can('permissions-read')
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('permissions.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Permissions</span>
                        </a>
                    </div>
                @endcan

                @can('setting-backup-read')
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('setting.backup-data.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Backup Data</span>
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    @endcanany

    <div class="separator my-2"></div>
    <div class="menu-item px-5">
        <a href="{{ route('logout') }}" class="menu-link px-5">
            Sign Out
        </a>
    </div>
</div>
