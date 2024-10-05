@extends('layouts.app')
@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Details</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form id="account-profile" class="form" method="POST"
                            action="{{ route('profile.update', [$profile->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Nama</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="name"
                                                    class="form-control form-control-lg  mb-3 mb-lg-0"
                                                    placeholder="Masukkan Nama" value="{{ $profile->name }}" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Username</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="username" id="username"
                                            class="form-control form-control-lg" placeholder="Masukkan Username"
                                            value="{{ $profile->username }}" required />
                                        <div class="username"></div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6 required">
                                        Email
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-lg" placeholder="Masukkan Email"
                                            value="{{ $profile->email }}" required />
                                        <div class="email"></div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6 required">
                                        No Hp (Whatsapp Aktif)
                                    </label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="noHp" id="noHp"
                                            class="form-control form-control-lg" placeholder="Masukkan Whatsapp Aktif"
                                            value="{{ $profile->noHp }}" required />
                                        <div class="noHp"></div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end py-6 px-9">

                                    <button type="submit" class="btn btn-primary"
                                        id="kt_account_profile_details_submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Ubah Password</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form id="account_ubah_password" class="form" method="POST"
                            action="{{ route('profile.updatePassword') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $profile->id }}">
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Password Baru</label>
                                    <div class="col-lg-8 fv-row">
                                        <input required type="password" name="password" id="password"
                                            placeholder="Masukkan Password Baru" class="form-control form-control-lg ">
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Ulangi Password
                                        Baru</label>
                                    <div class="col-lg-8 fv-row">
                                        <input required type="password" name="curPassword" id="curPassword"
                                            placeholder="Ulangi Password Baru" class="form-control form-control-lg ">
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4"></label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="checkbox" id="showPass" class="form-check-input"> Tampilkan
                                        Password
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end py-6 px-9">

                                    <button type="submit" class="btn btn-primary"
                                        id="account_ubah_password_submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            Inputmask({
                "mask": "999 - 999 - 999 - 9999"
            }).mask("#noHp");

            $('#curPassword').keyup(function() {
                $pass = $('#password').val();
                $curPass = $('#curPassword').val();

                if ($pass == $curPass) {
                    $('#password').addClass('is-valid');
                    $('#password').removeClass('is-invalid');

                    $('#curPassword').addClass('is-valid');
                    $('#curPassword').removeClass('is-invalid');

                    $('#account_ubah_password_submit').removeAttr('disabled');

                } else {
                    $('#password').removeClass('is-valid');
                    $('#password').addClass('is-invalid');

                    $('#curPassword').removeClass('is-valid');
                    $('#curPassword').addClass('is-invalid');

                    $('#account_ubah_password_submit').attr('disabled', 'disabled');
                }
            });

            $('#showPass').click(function() {
                var showPassword = document.getElementById("showPass");
                var password = document.getElementById("password");
                var curPassword = document.getElementById("curPassword");

                if (showPassword.checked == true) {
                    password.type = "text";
                    curPassword.type = "text";
                } else {
                    password.type = "password";
                    curPassword.type = "password";
                }

            });

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
@endpush
