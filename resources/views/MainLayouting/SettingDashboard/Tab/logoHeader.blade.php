<div id="kt_app_content_container" class="app-container  container-xxl ">
    <div class="card">
        <div class="card-header border-0 pt-6">
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
                                <th class="min-w-125px text-center sorting" tabindex="0"
                                    aria-controls="kt_table_users" rowspan="1" colspan="1"
                                    aria-label="User: activate to sort column ascending" style="width: 100px;">
                                    Logo
                                </th>
                                <th class="text-center min-w-125px text-center sorting" tabindex="0"
                                    aria-controls="kt_table_users" rowspan="1" colspan="1"
                                    aria-label="Last login: activate to sort column ascending"
                                    style="width: 166.547px;">Ket Posisi
                                </th>
                                <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="width: 136.391px;">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @php $noPage = 1; @endphp
                            @foreach ($datas['logo'] as $item)
                                <tr>
                                    <td>{{ $noPage++ }}</td>
                                    <td>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="me-7">
                                                <div
                                                    class="symbol symbol-100px symbol-lg-150px symbol-fixed position-relative">
                                                    <img src="{{ asset($item->logo) }}" alt="image">
                                                </div>
                                            </div>
                                            <div class="mt-3 me-7">
                                                <div class="badge badge-light-primary text-uppercase">
                                                    {{ $item->kategori }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center text-uppercase">{{ $item->posisi }}</td>
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
                                                    <a href="#" class="menu-link px-3 buttonUpdateLogo"
                                                        data-bs-toggle="modal" data-bs-target="#modalLogos"
                                                        data-id="{{ $item->uuid }}" data-kategori="{{ $item->kategori }}">
                                                        Update
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
        function show(uuid) {
            var button = document.querySelector("#formModalLogos");
            button.setAttribute("data-kt-indicator", "on");

            $.ajax({
                type: 'get',
                url: '{{ url('main/setting-dashboard/logo/') }}/' + uuid,
                dataType: 'json',
                success: function(data) {
                    $('#imagePreview').attr('src', data.logo);
                    button.removeAttribute("data-kt-indicator");
                }
            });
        }

        $('.buttonUpdateLogo').click(function() {
            let id = $(this).data('id');
            let kategori = $(this).data('kategori');

            $('.titleModalLogos').html('Update Logo - ' + kategori);
            $('#formModalLogos').prepend('<input id="edit" type="hidden" name="_method" value="patch">');
            $('#formModalLogos').attr('action', '{{ url('main/setting-dashboard/logo/') }}/' + id);

            show(id);

        });
    </script>
@endpush
