<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">

        @include('layouts.partials._header')

        <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    <div id="kt_app_toolbar" class="app-toolbar pt-10" data-select2-id="select2-data-kt_app_toolbar">
                        @yield('toolbar')
                    </div>
                    <div id="kt_app_content" class="app-content  flex-column-fluid ">
                        @yield('content')
                    </div>
                </div>

                @include('layouts.partials._footer')

            </div>
        </div>
    </div>
</div>
