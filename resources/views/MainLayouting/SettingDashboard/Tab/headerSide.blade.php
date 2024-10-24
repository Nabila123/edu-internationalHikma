<div id="kt_app_content_container" class="app-container  container-xxl ">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">

            </div>
            <div class="card-toolbar">
                <div class="d-flex flex-column justify-content-end" data-kt-user-table-toolbar="base">
                    @if ($datas['sideHeader']['total'] < 3)
                        @can('main-layouting-setting-create')
                            <button type="button" class="btn btn-primary buttonCreateHeader mb-3" data-bs-toggle="modal"
                                data-bs-target="#modalHeader">
                                <i class="ki-duotone ki-plus fs-2"></i> Tambah Data </button>
                            <span class="text-danger fs-8">*Maximal Hanya 3 Data Saja</span>
                        @endcan
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body py-4">
            <div id="kt_table_users_wrapper" class="dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 no-footer" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-25px text-center sorting" tabindex="0" aria-controls="kt_table_users"
                                    rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                    style="width: 25px;">
                                    #
                                </th>
                                <th class="text-center min-w-125px sorting" tabindex="0"
                                    aria-controls="kt_table_users" rowspan="1" colspan="1"
                                    aria-label="User: activate to sort column ascending" style="width: 284.328px;">
                                    Title & Deskripsi
                                </th>
                                <th class="text-center min-w-125px sorting" tabindex="0"
                                    aria-controls="kt_table_users" rowspan="1" colspan="1"
                                    aria-label="Last login: activate to sort column ascending"
                                    style="width: 166.547px;">Status
                                </th>
                                <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="width: 136.391px;">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @php $noPage = 1; @endphp
                            @foreach ($datas['sideHeader']['data'] as $item)
                                <tr>
                                    <td class="text-center">{{ $item->noPage }}</td>
                                    <td class="text-justify">
                                        <div class="d-flex flex-row">
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <div class="d-flex flex-column-fluid fw-bolder mb-3">
                                                    {{ $item->title }}
                                                </div>
                                                <div class="d-flex flex-column-fluid mb-4">
                                                    {{ $item->deskripsi }}
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge {{ getBadgeStatus($item->status) }} fs-8">
                                            {{ $item->status }}
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"> Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                            data-kt-menu="true">
                                            @can('main-layouting-setting-update')
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 buttonUpdateHeader"
                                                        data-bs-toggle="modal" data-bs-target="#modalHeader"
                                                        data-id="{{ $item->uuid }}">
                                                        Update
                                                    </a>
                                                </div>
                                            @endcan

                                            @can('main-layouting-setting-delete')
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 buttonDeleteHeader"
                                                        data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                        data-id="{{ $item->uuid }}">
                                                        Delete
                                                    </a>
                                                </div>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script>
        function showHeader(uuid) {
            $.ajax({
                type: 'get',
                url: '{{ url('main/setting-dashboard/side-header/') }}/' + uuid,
                dataType: 'json',
                success: function(data) {
                    $('#title').val(data.title);
                    $('#deskripsiHeader').val(data.deskripsi);
                    $('#isActiveHeader').val(data.isActive).trigger('change');
                }
            });
        }

        $('.buttonCreateHeader').click(function() {
            $('.titleModalHeader').html('Create Header');

            $('#title').val('');
            $('#deskripsi').val('');
            $('#isActiveHeader').val(1).trigger('change');

            $('#formModalHeader').attr('action', '{{ route('main.setting-dashboard.side-header.store') }}');
        });

        $('.buttonUpdateHeader').click(function() {
            let id = $(this).data('id');

            $('#edit').remove();
            $('#title').val('');
            $('#deskripsi').val('');
            $('#isActiveHeader').val(1).trigger('change');

            $('.titleModalHeader').html('Update Header');
            $('#formModalHeader').prepend('<input id="edit" type="hidden" name="_method" value="patch">');
            $('#formModalHeader').attr('action', '{{ url('main/setting-dashboard/side-header/') }}/' + id);

            showHeader(id);
        });

        $('.buttonDeleteHeader').click(function() {
            let id = $(this).data('id');

            $('.modal-title').html('Hapus Data Header');
            $('#formModalDelete').attr('action', '{{ url('main/setting-dashboard/side-header/') }}/' + id);
        });
    </script>
@endpush
