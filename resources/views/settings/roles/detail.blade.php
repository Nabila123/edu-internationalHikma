@extends('layouts.app')

@section('pageTitle')

@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">

        @error('permissions')
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ $message }}
                </div>
            </div>
        @enderror
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h2>{{ $pageTitle }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="fw-semibold fs-6 mb-2">Nama</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name', $roles->name) }}" required disabled>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-10">
                        <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <tbody class="text-gray-600 fw-semibold">
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
                                                            @if (old('permissions')) {{ in_array($dt[0], old('permissions')) ? 'checked' : '' }}
                                                                @else {{ in_array($dt[0], $rolePermissions) ? 'checked' : '' }} @endif>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
