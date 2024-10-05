@extends('layouts.app')

@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack "
        data-select2-id="select2-data-kt_app_toolbar_container">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Data Backup Data
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
                    Setting </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    Backup Data </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card">
            @can('setting-backup-create')
                <div class="card-header border-0 pt-6">
                    <div class="card-title"> </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <a href="{{ route('setting.backup-data.create') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-2"></i> Backup Data </a>
                        </div>
                    </div>
                </div>
            @endcan

            <div class="card-body py-4">
                <div id="kt_table_users_wrapper" class="dt-bootstrap4 no-footer">
                    <div class="table-responsive mb-6">
                        <table class="table table-striped align-middle table-row-dashed fs-6 gy-5 no-footer"
                            id="kt_table_users">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-center min-w-25px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 25px;">#</th>
                                    <th class="min-w-175px text-center sorting" tabindex="0" rowspan="1" colspan="1"
                                        style="width: 175px;">
                                        Nama File</th>

                                    <th class="min-w-175px text-center sorting" tabindex="0" rowspan="1" colspan="1"
                                        style="width: 175px;">
                                        Ukuran</th>

                                    <th class="min-w-100px text-center sorting" tabindex="0" rowspan="1" colspan="1"
                                        style="width: 100px;">
                                        Tanggal</th>

                                    @canany(['setting-backup-download', 'setting-backup-delete'])
                                        <th class="text-end min-w-50px sorting_disabled" rowspan="1" colspan="1"
                                            aria-label="Actions" style="width: 50px;">Actions</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold text-center">
                                @php $noPage = 1; @endphp
                                @foreach ($datas as $backup)
                                    <tr>
                                        <td>{{ $noPage++ }}</td>
                                        <td>{{ $backup['file_name'] }}</td>
                                        <td>{{ number_format($backup['file_size'] / 1048576, 2) }} MB</td>
                                        <td>{{ date('d M Y H:i:s', $backup['last_modified']) }}</td>
                                        @canany(['setting-backup-download', 'setting-backup-delete'])
                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"> Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                </a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                                    data-kt-menu="true">
                                                    @can('setting-backup-download')
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('setting.backup-data.download', $backup['file_name']) }}"
                                                                class="menu-link px-3"> Download </a>
                                                        </div>
                                                    @endcan
                                                    @can('setting-backup-delete')
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3 deleteBackup"
                                                                data-bs-toggle="modal" data-bs-target="#modalBackupDelete"
                                                                data-id="{{ $backup['file_name'] }}"> Hapus
                                                            </a>
                                                        </div>
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcanany
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="float-end">
                        {!! $datas->withQueryString()->links('layouts.paginate') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('settings.backupData.modalBackup')
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $('.deleteBackup').click(function() {
            let id = $(this).data('id');

            $('#formBackupKosDelete').attr('action', '{{ url('/setting/backup-data/') }}/' + id);
        });
    </script>
@endpush
