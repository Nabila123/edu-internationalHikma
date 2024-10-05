@extends('layouts.app')
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="card card-flush">
            <div class="card-header mt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1 me-5">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <form class="form" method="get" action="/permissions/search">
                            <input id="keyword" name="keyword" type="text" data-kt-permissions-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Pencarian Data">
                        </form>
                    </div>
                </div>

                <div class="card-toolbar">
                    @can('permissions-create')
                        <button type="button" class="btn btn-light-primary create-button" data-bs-toggle="modal"
                            data-bs-toggle="modal" data-bs-target="#modalShow" data-animation="true">
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                        fill="currentColor"></rect>
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                        transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                        fill="currentColor"></rect>
                                </svg>
                            </span>

                            Tambah
                        </button>
                    @endcan
                </div>
            </div>

            <div class="card-body pt-0">
                <div id="kt_permissions_table_wrapper" class=" dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle text-center table-row-dashed fs-6 gy-5 mb-0 no-footer"
                            id="table">
                            <thead>
                                <tr class=" text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-center">#</th>
                                    <th class="text-start">Name</th>
                                    <th>Guard Name</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($datas as $d)
                                    <tr>
                                        <td class="text-center">{{ $d->noPage }}</td>
                                        <td class="text-start">{{ $d->name }}</td>
                                        <td>{{ $d->guard_name }}</td>
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"> Actions <i
                                                    class="ki-duotone ki-down fs-5 ms-1"></i>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true" style="">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 detail-button"
                                                        data-bs-toggle="modal" data-bs-target="#modalShow"
                                                        data-id="{{ $d->id }}"> Detail </a>
                                                </div>

                                                @can('permissions-update')
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3 edit-button"
                                                            data-bs-toggle="modal" data-bs-target="#modalShow"
                                                            data-id="{{ $d->id }}"> Edit </a>
                                                    </div>
                                                @endcan

                                                @can('permissions-delete')
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3 delete-permission"
                                                            data-bs-toggle="modal" data-bs-target="#data-modal-delete"
                                                            data-id="{{ $d->id }}"
                                                            data-kt-users-table-filter="delete_row"> Delete </a>
                                                    </div>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-end mt-10">
                        {!! $datas->withQueryString()->links('layouts.paginate') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('permissions.modalPermission')
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $('.create-button').click(function() {
            $('.modal-title').html('Tambah Data');
            $('#edit').remove();
            $('.modal-content form').attr('action', '{{ url('/permissions/') }}');
            $('#name').val('');
            $('#guard_name').val('');
        });

        $('#table').on('click', '.detail-button', function() {
            let id = $(this).data('id');

            $('.modal-title').html('Detail Data');
            $('.hidden_button').remove();

            $.ajax({
                type: 'get',
                url: '{{ url('/permissions/') }}/' + id + '/edit',
                dataType: 'json',
                success: function(data) {
                    $('#name').val(data.permission.name);
                    $('#guard_name').val(data.permission.guard_name);
                }
            });
        });

        $('#table').on('click', '.edit-button', function() {
            let id = $(this).data('id');

            $('.modal-title').html('Ubah Data');
            $('.modal-content form').prepend('<input id="edit" type="hidden" name="_method" value="patch">');
            $('.modal-content form').attr('action', '{{ url('/permissions/') }}/' + id);

            $.ajax({
                type: 'get',
                url: '{{ url('/permissions/') }}/' + id + '/edit',
                dataType: 'json',
                success: function(data) {
                    $('#name').val(data.permission.name);
                    $('#guard_name').val(data.permission.guard_name);
                }
            });
        });

        $('#table').on('click', '.delete-permission', function() {
            let id = $(this).data('id');

            $('.modal-title').html('Hapus Data Permission');
            $('.modal-content form').attr('action', '{{ url('/permissions/') }}/' + id);
        });
    </script>
@endpush
