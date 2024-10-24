<div id="kt_app_content_container" class="app-container  container-xxl ">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title"> </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    @can('main-layouting-setting-create')
                        <button type="button" class="btn btn-primary buttonCreateCaraosel" data-bs-toggle="modal"
                            data-bs-target="#modalCaraosel">
                            <i class="ki-duotone ki-plus fs-2"></i> Tambah Data </button>
                    @endcan
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
                                <th class="min-w-125px text-start sorting" tabindex="0" aria-controls="kt_table_users"
                                    rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                    style="width: 284.328px;">
                                    Judul
                                </th>
                                <th class="text-start min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                    rowspan="1" colspan="1"
                                    aria-label="Last login: activate to sort column ascending"
                                    style="width: 166.547px;">Deskripsi
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
                            @foreach ($datas['caraosel'] as $item)
                                <tr>
                                    <td>{{ $item->noPage }}</td>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <div class="me-7 mb-4">
                                                <div
                                                    class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative">
                                                    <img src="{{ asset($item->image) }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="text-gray-800 fw-bolder text-hover-primary mb-1">{{ $item->title }}</a>
                                                <span>{{ $item->slogan }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-justify">
                                        {{ $item->deskripsi }}
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
                                                    <a href="#" class="menu-link px-3 buttonUpdateCaraosel"
                                                        data-bs-toggle="modal" data-bs-target="#modalCaraosel"
                                                        data-id="{{ $item->uuid }}">
                                                        Update
                                                    </a>
                                                </div>
                                            @endcan

                                            @can('main-layouting-setting-delete')
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 buttonDeleteCaraosel"
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
        function showCaraosel(uuid) {
            $.ajax({
                type: 'get',
                url: '{{ url('main/setting-dashboard/caraosel/') }}/' + uuid,
                dataType: 'json',
                success: function(data) {
                    $('#judul').val(data.title);
                    $('#slogan').val(data.slogan);
                    $('#deskripsi').val(data.deskripsi);
                    $('#isActiveCaraosel').val(data.isActive).trigger('change');

                    $('#imagePreviewCaraosel').attr('src', data.image);
                    $('#imagePreviewCaraosel').removeClass('d-none');
                }
            });
        }

        $('.buttonCreateCaraosel').click(function() {
            $('.titleModalCaraosel').html('Create Caraosel');

            $('#judul').val('');
            $('#slogan').val('');
            $('#deskripsi').val('');
            $('#isActiveCaraosel').val(1).trigger('change');
            $('#imageCaraosel').val('');
            $('.imageCaraosel').text('');
            $('#imagePreviewCaraosel').addClass('d-none');

            $('#formModalCaraosel').attr('action', '{{ route('main.setting-dashboard.caraosel.store') }}');
        });

        $('.buttonUpdateCaraosel').click(function() {
            let id = $(this).data('id');

            $('#edit').remove();
            $('#judul').val('');
            $('#slogan').val('');
            $('#deskripsi').val('');
            $('#isActiveCaraosel').val(1).trigger('change');
            $('#imageCaraosel').val('');
            $('.imageCaraosel').text('');

            $('.titleModalCaraosel').html('Update Caraosel');
            $('#formModalCaraosel').prepend('<input id="edit" type="hidden" name="_method" value="patch">');
            $('#formModalCaraosel').attr('action', '{{ url('main/setting-dashboard/caraosel/') }}/' + id);

            showCaraosel(id);
        });

        $('.buttonDeleteCaraosel').click(function() {
            let id = $(this).data('id');

            $('.modal-title').html('Hapus Data Caraosel');
            $('#formModalDelete').attr('action', '{{ url('main/setting-dashboard/caraosel/') }}/' + id);
        });
    </script>
@endpush
