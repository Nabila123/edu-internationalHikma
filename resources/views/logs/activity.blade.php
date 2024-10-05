@extends('layouts.app')
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title text-gray-600">Logs Activity</h3>
                <div class="card-toolbar">
                    {{-- <form class="form" method="get" action="/permissions/search">
                        <input id="keyword" name="keyword" type="text" data-kt-permissions-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15" placeholder="Pencarian Data">
                    </form> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-row-bordered gy-5">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th rowspan="2" class="text-center w-25px">#</th>
                                <th colspan="2" class="text-center">USER AKTIVITY </th>
                                <th rowspan="2" class="text-center">Status</th>
                                <th rowspan="2">Waktu</th>
                                @if (getRolesId() == 1)
                                    <th class="text-end" rowspan="2">Action</th>
                                @endif
                            </tr>
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th class="text-center">Causer (Eksekutor)</th>
                                <th class="text-center">Subject (Target)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $d)
                                <tr>
                                    <td class="text-center">{{ $d->noPage }}</td>
                                    <td class="text-center">{{ $d->nama }}</td>
                                    <td class="text-center">
                                        <div class="fw-bolder">
                                            {{ ucwords(strtolower($d->log_name)) }}
                                        </div>
                                        @if (getRolesId() == 1)
                                            <div class="badge badge-light-success">
                                                Kode : {{ $d->subject_id }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="badge {{ $d->color }}">{{ ucfirst($d->description) }}</span>
                                    </td>
                                    <td>
                                        {{ formatTanggalPanjang($d->created_at) }} <br>
                                        {{ Date('H:i', strtotime($d->created_at)) }}
                                    </td>
                                    @if (getRolesId() == 1)
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                            </a>

                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 detail-button"
                                                        data-bs-toggle="modal" data-bs-target="#modal_detail_activity"
                                                        data-id="{{ $d->id }}"> Detail </a>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {!! $datas->withQueryString()->links('layouts.paginate') !!}
            </div>
        </div>
    </div>



    <div class="modal fade" tabindex="-1" id="modal_detail_activity">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Modal title</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">Attribute</th>
                                        </tr>
                                        <tr>
                                            <th>Nama Title</th>
                                            <th>Value Lama</th>
                                            <th>Value Baru</th>
                                        </tr>
                                    </thead>
                                    <tbody id="atribute"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        function displayComparisonTable(newData, oldData) {
            var tableBody = $('#atribute');
            tableBody.empty();

            newData.forEach(function(item) {
                var oldItem = oldData.find(function(oldItem) {
                    return oldItem.title === item.title;
                });

                var newRow = '<tr>';
                newRow += '<td>' + item.title + '</td>';
                newRow += '<td>' + (oldItem ? oldItem.value : '') + '</td>';
                newRow += '<td>' + item.value + '</td>';
                newRow += '</tr>';

                tableBody.append(newRow);
            });
        }

        $('.detail-button').click(function() {
            let id = $(this).data('id');

            $('.modal-title').html('<h2>Detail Activity</h2>');

            $.ajax({
                type: 'get',
                url: '{{ url('/logs/activity/show/') }}/' + id,
                dataType: 'json',
                success: function(data) {
                    displayComparisonTable(data.atribute, data.old);
                }
            });
        });
    </script>
@endpush
