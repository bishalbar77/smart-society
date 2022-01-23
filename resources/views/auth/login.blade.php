@extends('layouts.app')

@section('content')
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-column flex-row-auto">

                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<!--begin::Aside header-->
						<a href="#" class="login-logo text-center pt-lg-25 pb-10">
							<img src="media/logos/logo-1.png" class="max-h-70px" alt="" />
						</a>
						<!--end::Aside header-->
						<!--begin::Aside Title-->
						<h3 class="font-weight-bolder text-center font-size-h4 text-dark-50 line-height-xl">User Experience &amp; Interface Design
						<br />Strategy SaaS Solutions</h3>
						<!--end::Aside Title-->
					</div>
					
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-position-y: calc(100% + 5rem); background-image: url(media/svg/illustrations/login-visual-5.svg)"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column p-10">
                <div class="text-right d-flex justify-content-center">
						<div class="top-signin text-right d-flex justify-content-end pt-5 pb-lg-0 pb-10">
							<span class="font-weight-bold text-muted font-size-h4">Having issues?</span>
							<a href="javascript:;" class="font-weight-bold text-primary font-size-h4 ml-2" id="kt_login_signup">Get Help</a>
						</div>
					</div>
					<!--begin::Wrapper-->
					<div class="d-flex flex-row-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form">
                    <form class="form" id="kt_login_singin_form" method="POST" action="{{ route('login') }}">

                    <div class="pb-5 pb-lg-15">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
									
								</div>


                        @csrf
                        <div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
									
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control h-auto py-7 px-6 rounded-lg border-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
								</div>
                        
									

                            
                                

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        
                        <div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Your Password</label>
                                    
									
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control h-auto py-7 px-6 rounded-lg border-0" name="password" required autocomplete="current-password" >
								</div>
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <!-- <div class="form-group row"> -->
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> -->

                               
                            <!-- </div> -->
                        <!-- </div> -->

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="form-group row mb-0"> -->
                        <div class="pb-lg-0 pb-5">
                            <!-- <div class="col-md-8 offset-md-4"> -->
                                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                                    Sign in
                                </button>
                        </div>
                                @if (Route::has('password.request'))
                                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> -->
                                @endif
                            <!-- </div> -->
                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
</div>

</body
@endsection
