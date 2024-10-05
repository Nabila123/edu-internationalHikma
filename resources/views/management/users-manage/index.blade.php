@extends('layouts.app')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack "
        data-select2-id="select2-data-kt_app_toolbar_container">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Data User Login
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">
                        Home </a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    Menagement Kos </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    User Login </li>
            </ul>
        </div>

    </div>
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    {{-- <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <form class="form" method="get" action="/users/search">
                            <input id="keyword" name="keyword" type="text" data-kt-users-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Pencarian Data">
                        </form>
                    </div> --}}
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        @can('users-create')
                            <button type="button" class="btn btn-primary buttonCreate" data-bs-toggle="modal"
                                data-bs-target="#modalUser">
                                <i class="ki-duotone ki-plus fs-2"></i> Tambah User </button>
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
                                    <th class="min-w-25px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                        style="width: 25px;">
                                        #
                                    </th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                        style="width: 284.328px;">
                                        Nama User
                                    </th>
                                    <th class="text-center min-w-125px sorting" tabindex="0"
                                        aria-controls="kt_table_users" rowspan="1" colspan="1"
                                        aria-label="Last login: activate to sort column ascending"
                                        style="width: 166.547px;">Registrasi
                                    </th>
                                    <th class="text-center min-w-125px sorting" tabindex="0"
                                        aria-controls="kt_table_users" rowspan="1" colspan="1"
                                        aria-label="Role: activate to sort column ascending" style="width: 166.547px;">
                                        Role
                                    </th>
                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 136.391px;">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($datas as $d)
                                    <tr>
                                        <td>{{ $d->noPage }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex flex-column">
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary mb-1">{{ $d->name }}</a>
                                                    <span>Uname : {{ $d->username }}</span>
                                                    <span>Email : {{ $d->email }}</span>
                                                    <span>No Hp : {{ $d->noHp }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $d->approve }} <br>
                                            <div class="badge badge-light-primary fs-8">
                                                {{ formatTanggalPanjang($d->created_at) }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-uppercase mb-2">{{ $d->roles }}</span> <br>
                                            <div class="badge {{ getBadgeStatus($d->status) }} fs-8">
                                                {{ $d->status }}
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
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 buttonDetail"
                                                        data-bs-toggle="modal" data-bs-target="#modalUser"
                                                        data-id="{{ $d->id }}"> Detail </a>
                                                </div>

                                                @can('users-update')
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3 buttonUpdate"
                                                            data-bs-toggle="modal" data-bs-target="#modalUser"
                                                            data-id="{{ $d->id }}"> Edit
                                                        </a>
                                                    </div>
                                                @endcan

                                                @can('users-delete')
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3 buttonDelete"
                                                            data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                            data-id="{{ $d->id }}"> Delete </a>
                                                    </div>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $datas->withQueryString()->links('layouts.paginate') !!}
                </div>
            </div>
        </div>
    </div>
    @include('management.users-manage.modalUsers')
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        function show(params) {
            $.ajax({
                type: 'get',
                url: '{{ url('/users/') }}/' + params + '/edit',
                dataType: 'json',
                success: function(data) {
                    $("#roleId").val(data.role.role_id).trigger('change');
                    $('#name').val(data.user.name);
                    $('#username').val(data.user.username);
                    $('#email').val(data.user.email);
                    $('#noHp').val(data.user.noHp);
                }
            });
        }


        $('.buttonCreate').click(function() {
            $('.titleModalUser').html('Tambah Data User Pengguna');

            $("#roleId").val('').trigger('change');
            $('#name').val('');
            $('#username').val('');
            $('#password').val('');
            $('#email').val('');
            $('#noHp').val('');

            $('#forUsername').show();
            $('#forPassword').show();
            $('#btnModalUser').show();

            $('#password').attr('required', 'required');
            $('#roleId').prop('disabled', false);

            $('#formModalUser').attr('action', '{{ route('users.store') }}');
        });

        $('.buttonUpdate').click(function() {
            let id = $(this).data('id');

            $('.titleModalUser').html('Update Data User Pengguna');

            $('#forUsername').hide();
            $('#forPassword').hide();
            $('#btnModalUser').show();

            $('#password').removeAttr('required');
            $('#roleId').prop('disabled', true);

            $('#formModalUser').prepend('<input id="edit" type="hidden" name="_method" value="patch">');
            $('#formModalUser').attr('action', '{{ url('/users/') }}/' + id);

            show(id);
        });

        $('.buttonDetail').click(function() {
            let id = $(this).data('id');

            $('.titleModalUser').html('Detail Data User Pengguna');

            $('#forUsername').show();
            $('#forPassword').hide();
            $('#btnModalUser').hide();

            show(id);
        });

        $('.buttonResetAkun').click(function() {
            let id = $(this).data('id');

            $('.titleModalOther').html('Reset Akun User Pengguna');
            $('.bodyModalOther').html('Fitur Ini Digunakan Untuk Reset Username & Password User !!!');
            $('#formModalOther').attr('action', '{{ url('/users/reset/') }}/' + id);
        });

        $('.buttonDelete').click(function() {
            let id = $(this).data('id');

            $('.modal-title').html('Hapus Data User');
            $('#formModalDelete').attr('action', '{{ url('/users/') }}/' + id);
        });

        $('#showPass').click(function() {
            var password = document.getElementById("password");

            if (password.type == "password") {
                password.type = "text";
                $('#showPass-icon').addClass('ki-eye-slash');
                $('#showPass-icon').removeClass('ki-eye');
            } else {
                password.type = "password";
                $('#showPass-icon').removeClass('ki-eye-slash');
                $('#showPass-icon').addClass('ki-eye');
            }
        });

        $(document).ready(function() {
            $('#username').change(function() {
                var username = $('#username').val();

                $.ajax({
                    type: 'get',
                    url: '{{ url('/users/checkUsername') }}',
                    data: {
                        'username': username
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data == 0) {
                            $('.username').html('Username Sudah Digunakan !!');
                            $('.username').addClass('invalid-feedback');
                            $('#username').addClass('is-invalid');

                            $('.username').removeClass('valid-feedback');
                            $('#username').removeClass('is-valid');
                        } else {
                            $('.username').html('Username Dapat Digunakan !!');
                            $('.username').addClass('valid-feedback');
                            $('#username').addClass('is-valid');

                            $('.username').removeClass('invalid-feedback');
                            $('#username').removeClass('is-invalid');
                        }
                    }
                });
            });

            $('#email').change(function() {
                var email = $('#email').val();

                $.ajax({
                    type: 'get',
                    url: '{{ url('/users/checkEmail') }}',
                    data: {
                        'email': email
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data == 0) {
                            $('.email').html('Email Sudah Digunakan !!');
                            $('.email').addClass('invalid-feedback');
                            $('#email').addClass('is-invalid');

                            $('.email').removeClass('valid-feedback');
                            $('#email').removeClass('is-valid');
                        } else {
                            $('.email').html('Email Dapat Digunakan !!');
                            $('.email').addClass('valid-feedback');
                            $('#email').addClass('is-valid');

                            $('.email').removeClass('invalid-feedback');
                            $('#email').removeClass('is-invalid');
                        }
                    }
                });
            });
        });
    </script>
    <!--end::Javascript-->
@endpush
