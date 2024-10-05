@extends('auth.layouts')

@section('pageTitle', 'Two Step Verification')

@section('content')
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
	<!--begin::Page bg image-->
	<style>body { background-image: url('assets/media/auth/bg4.jpg'); } [data-bs-theme="dark"] body { background-image: url('assets/media/auth/bg4-dark.jpg'); }</style>
	<!--end::Page bg image-->
	<!--begin::Authentication - Two-stes -->
	<div class="d-flex flex-column flex-column-fluid flex-lg-row">
		<!--begin::Aside-->
		<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
			<!--begin::Aside-->
			<div class="d-flex flex-center flex-lg-start flex-column">
				<!--begin::Logo-->
				<a href="../../demo1/dist/index.html" class="mb-7">
					<img alt="Logo" src="assets/media/logos/custom-3.svg" />
				</a>
				<!--end::Logo-->
				<!--begin::Title-->
				<h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2>
				<!--end::Title-->
			</div>
			<!--begin::Aside-->
		</div>
		<!--begin::Aside-->
		<!--begin::Body-->
		<div class="d-flex flex-center w-lg-50 p-10">
			<!--begin::Card-->
			<div class="card rounded-3 w-md-550px">
				<!--begin::Card body-->
				<div class="card-body d-flex flex-column p-10 p-lg-20 pb-lg-10">
					<!--begin::Wrapper-->
					<div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
						<!--begin::Form-->
						<form class="form w-100 mb-13" novalidate="novalidate" data-kt-redirect-url="../../demo1/dist/index.html" id="kt_sing_in_two_steps_form">
							<!--begin::Icon-->
							<div class="text-center mb-10">
								<img alt="Logo" class="mh-125px" src="assets/media/svg/misc/smartphone-2.svg" />
							</div>
							<!--end::Icon-->
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Two Step Verification</h1>
								<!--end::Title-->
								<!--begin::Sub-title-->
								<div class="text-muted fw-semibold fs-5 mb-5">Enter the verification code we sent to</div>
								<!--end::Sub-title-->
								<!--begin::Mobile no-->
								<div class="fw-bold text-dark fs-3">******7859</div>
								<!--end::Mobile no-->
							</div>
							<!--end::Heading-->
							<!--begin::Section-->
							<div class="mb-10">
								<!--begin::Label-->
								<div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Type your 6 digit security code</div>
								<!--end::Label-->
								<!--begin::Input group-->
								<div class="d-flex flex-wrap flex-stack">
									<input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
									<input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
									<input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
									<input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
									<input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
									<input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
								</div>
								<!--begin::Input group-->
							</div>
							<!--end::Section-->
							<!--begin::Submit-->
							<div class="d-flex flex-center">
								<button type="button" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bold">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<!--end::Submit-->
						</form>
						<!--end::Form-->
						<!--begin::Notice-->
						<div class="text-center fw-semibold fs-5">
							<span class="text-muted me-1">Didn’t get the code ?</span>
							<a href="#" class="link-primary fs-5 me-1">Resend</a>
							<span class="text-muted me-1">or</span>
							<a href="#" class="link-primary fs-5">Call Us</a>
						</div>
						<!--end::Notice-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Footer-->
					<div class="w-lg-500px d-flex flex-stack">
						<!--begin::Languages-->
						<div class="me-10">
							<!--begin::Toggle-->
							<button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
								<img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="assets/media/flags/united-states.svg" alt="" />
								<span data-kt-element="current-lang-name" class="me-1">English</span>
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
								<span class="svg-icon svg-icon-5 svg-icon-muted rotate-180 m-0">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</button>
							<!--end::Toggle-->
							<!--begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="English">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">English</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/spain.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">Spanish</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="German">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/germany.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">German</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="Japanese">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/japan.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">Japanese</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link d-flex px-5" data-kt-lang="French">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/france.svg" alt="" />
										</span>
										<span data-kt-element="lang-name">French</span>
									</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu-->
						</div>
						<!--end::Languages-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::Authentication - Two-stes-->
</div>
<!--end::Root-->

@endsection()

@push('custom-scripts')
<script src="assets/js/custom/authentication/sign-in/two-steps.js"></script>
@endpush