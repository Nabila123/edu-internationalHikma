<div id="kt_app_content_container" class="app-container  container-xxl ">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <span class="text-danger fs-8">*Maximal Hanya 3 Data Saja</span>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    {{-- @can('main-layouting-setting-create')
                        <button type="button" class="btn btn-primary buttonCreate" data-bs-toggle="modal"
                            data-bs-target="#modalHeader">
                            <i class="ki-duotone ki-plus fs-2"></i> Tambah Data </button>
                    @endcan --}}
                </div>
            </div>
        </div>
        <div class="card-body py-4">
            <div id="kt_table_users_wrapper" class="dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 no-footer" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-25px sorting" tabindex="0" aria-controls="kt_table_users"
                                    rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                    style="width: 25px;">
                                    #
                                </th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                    rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                    style="width: 284.328px;">
                                    Judul
                                </th>
                                <th class="text-center min-w-125px sorting" tabindex="0"
                                    aria-controls="kt_table_users" rowspan="1" colspan="1"
                                    aria-label="Last login: activate to sort column ascending"
                                    style="width: 166.547px;">Deskripsi
                                </th>
                                <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="width: 136.391px;">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @php $noPage = 1; @endphp
                            {{-- @foreach ($datas['header'] as $item)
                                <tr>
                                    <td>{{ $noPage++ }}</td>
                                    <td>{{ $item['judul'] }}</td>
                                    <td>{{ $item['deskripsi'] }}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @include('MainLayouting.SettingDashboard.modalSetting') --}}

@push('custom-scripts')
    <script>
        
    </script>
@endpush
