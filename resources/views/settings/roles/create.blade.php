@extends('layouts.app')

@section('pageTitle')

@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h2>{{ $pageTitle }}</h2>
                </div>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="required fw-semibold fs-6 mb-2">Nama</label>
                                <input id="name" name="name" type="text"
                                    class="form-control mb-3 mb-lg-0 @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mt-10">
                            <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <tbody class="text-gray-600 fw-semibold">
                                        <tr>
                                            <td class="text-gray-800">
                                                {{ strtoupper('Administrator Access') }}
                                            </td>
                                            <td>
                                                <label
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="kt_roles_select_all">
                                                    <span class="form-check-label" for="kt_roles_select_all">
                                                        Select all
                                                    </span>
                                                </label>
                                            </td>
                                        </tr>
                                        @foreach ($permissions[0] as $permission)
                                            <tr>
                                                <td class="text-gray-800 min-w-325px">
                                                    {{ strtoupper($permission) }}
                                                </td>
                                                @foreach ($permissions[1][$permission] as $dt)
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom me-9">
                                                            <input class="form-check-input check_all" type="checkbox"
                                                                id="permissions" name="permissions[]"
                                                                value="{{ $dt[0] }}"
                                                                {{ collect(old('permissions'))->contains($dt[0]) ? 'checked' : '' }}>
                                                            <span class="form-check-label" for="kt_roles_select_all">
                                                                {{ $dt[1] }}
                                                            </span>
                                                        </label>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-center pt-15">
                            <a href="{{ route('roles.index') }}" class="btn btn-light">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label"> Submit </span>
                                <span class="indicator-progress"> Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $("#kt_roles_select_all").on("click", function() {
            var checkAll = $("#kt_roles_select_all").is(":checked")

            if (checkAll == true) {
                $(".check_all").each(function() {
                    $(this).attr("checked", true);
                });
            } else {
                $(".check_all").each(function() {
                    $(this).attr("checked", false);
                });
            }

        });
    </script>
@endpush
