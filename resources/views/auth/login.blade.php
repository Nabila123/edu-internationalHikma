  @extends('auth.layouts')

  @section('pageTitle', 'Sign In')

  @section('content')
      <div class="d-flex flex-column flex-root" id="kt_app_root">
          <style>
              body {
                  background-image: url('assets/media/auth/bg4.jpg');
              }

              [data-bs-theme="dark"] body {
                  background-image: url('assets/media/auth/bg4-dark.jpg');
              }
          </style>

          <div class="d-flex flex-column flex-column-fluid flex-lg-row">
              <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                  <div class="d-flex flex-center flex-lg-center flex-column">
                      <a href="#" class="mb-7">
                          <img alt="Logo" src='{{ asset('assets/media/logos/custom-3.svg') }}' />
                      </a>

                      <h2 class="text-white fw-normal m-0 text-center">Selamat Datang Dihalaman Admin Panel</h2>
                  </div>
              </div>

              <div class="d-flex flex-center w-lg-50 p-10">
                  <div class="card rounded-3 w-md-550px">
                      <div class="card-body d-flex flex-column p-10 p-lg-20 pb-lg-10">
                          <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-10">
                              <form class="form w-100" novalidate="novalidate" id="formLoginAdmin" method="POST"
                                  action="{{ route('login') }}">
                                  @csrf
                                  <div class="text-center mb-11">
                                      <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                                  </div>
                                  <div class="fv-row mb-8">
                                      <input type="text" placeholder="Username" name="username" autocomplete="off"
                                          class="form-control bg-transparent @error('username') is-invalid @enderror"
                                          value="{{ old('username') }}" autofocus>
                                  </div>
                                  <div class="fv-row mb-3">
                                      <div class="input-group">
                                          <input type="password" placeholder="Masukkan Password" name="password"
                                              id="password" autocomplete="off" class="form-control bg-transparent" />
                                          <span id="showHide" onclick="showPassword()" class="input-group-text">
                                              <i class="fas fa-eye d-none" id="show_eye" data-bs-toggle="tooltip"
                                                  title="Hide Password"></i>
                                              <i class="fas fa-eye-slash" id="hide_eye" data-bs-toggle="tooltip"
                                                  title="Show Password"></i>
                                          </span>
                                      </div>
                                  </div>

                                  <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                      <div></div>
                                      {{-- <a href="../../demo1/dist/authentication/layouts/creative/reset-password.html"
                                          class="link-primary">Forgot Password ?</a> --}}
                                      <!--end::Link-->
                                  </div>

                                  <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-3">
                                      @if ($errors->has('username'))
                                          <div class="alert alert-danger">
                                              {{ $errors->first('username') }}
                                          </div>
                                      @endif
                                  </div>

                                  <div class="d-grid mb-10">
                                      <button type="submit" id="submitFormLoginAdmin" class="btn btn-primary">
                                          <span class="indicator-label">Masuk</span>
                                          <span class="indicator-progress">Please wait...
                                              <span
                                                  class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                      </button>
                                  </div>

                                  {{-- <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                                      <a href="../../demo1/dist/authentication/layouts/creative/sign-up.html"
                                          class="link-primary">Sign up</a>
                                  </div> --}}
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endsection()

  @push('custom-scripts')
      <script type="text/javascript">
          function showPassword() {
              var x = document.getElementById("password");
              var show_eye = document.getElementById("show_eye");
              var hide_eye = document.getElementById("hide_eye");
              show_eye.classList.remove("d-none");
              if (x.type === "password") {
                  x.type = "text";
                  show_eye.style.display = "block";
                  hide_eye.style.display = "none";
              } else {
                  x.type = "password";
                  show_eye.style.display = "none";
                  hide_eye.style.display = "block";
              }
          }

          $('#formLoginAdmin').submit(function() {
              var button = $('#submitFormLoginAdmin');
              button
                  .attr("data-kt-indicator", "on")
                  .prop('disabled', true);
          });
      </script>
  @endpush
