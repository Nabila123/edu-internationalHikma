@extends('layouts.app')
@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title text-gray-600">Logs Login</h3>
            <div class="card-toolbar">
                <form class="form" method="get" action="/permissions/search">
                    <input id="keyword" name="keyword" type="text" data-kt-permissions-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Pencarian Data">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-row-bordered gy-5">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800">
                            <!-- <th class="table-sort-desc">authenticatable_type</th> -->
                            <th class="table-sort-asc">User</th>
                            <!-- <th>IP Address</th> -->
                            <th>Perangkat</th>
                            <th>Login</th>
                            <th>Status Login</th>
                            <th>Logout</th>
                            <!-- <th>cleared_by_user</th> -->
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $d)
                        <tr>
                            <!-- <td>{{ $d->authenticatable_type }}</td> -->
                            <td>{{ $d->name }}</td>
                            <!-- <td>{{ $d->ip_address }}</td> -->
                            <td>{{ $d->user_agent }}</td>
                            <td>
                                <span class="badge badge-light fw-bold">
                                    @if($d->login_at != NULL)
                                    {{ Carbon\Carbon::parse($d->login_at)->diffForHumans() }}
                                    @else
                                    -
                                    @endif
                                </span>
                            </td>
                            @if($d->login_successful == 1)
                            <td><span class="badge badge-light-success fw-bold">Berhasil</span></td>
                            @elseif($d->login_successful == 0)
                            <td><span class="badge badge-light-warning fw-bold">Gagal</span></td>
                            @endif
                            <td>
                                <span class="badge badge-light fw-bold">
                                    @if($d->logout_at != NULL)
                                    {{ Carbon\Carbon::parse($d->logout_at)->diffForHumans() }}
                                    @else
                                    -
                                    @endif
                                </span>
                            </td>
                            <!-- <td>{{ $d->cleared_by_user }}</td> -->
                            <td>{{ @json_decode($d->location)->city }}</td>
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
@endsection