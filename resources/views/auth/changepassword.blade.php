{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="card">
<div class="card-header">
    <h3 class="card-title"><span class="card-label font-weight-bolder text-default pb-4">Reset Password</span></h3>                              
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2 mt-5">
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="row">
															<div class="col-xl-2"></div>
															<div class="col-xl-7">
                                                            <div class="row mb-5">
																	<label class="col-3"></label>
																	<div class="col-9">
																		<div class="alert alert-custom alert-light-danger fade show py-4" role="alert">
																			<div class="alert-icon">
																				<i class="flaticon-warning"></i>
																			</div>
																			<div class="alert-text font-weight-bold">Configure user passwords to expire periodically.
																			<br />Users will need warning that their passwords are going to expire, or they might inadvertently get locked out of the system!</div>
																			<div class="alert-close">
																				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																					<span aria-hidden="true">
																						<i class="la la-close"></i>
																					</span>
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}

                        <div class="row">
																	<label class="col-3"></label>
																	<div class="col-9">
																		<h6 class="text-dark font-weight-bold mb-10">Change Or Recover Your Password:</h6>
																	</div>
																</div>
																<!--end::Row-->
																<!--begin::Group-->
																<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }} row">
																	<label class="col-form-label col-3 text-lg-right text-left">Current Password</label>
																	<div class="col-9">
																		<input class="form-control form-control-lg form-control-solid mb-1"id="current-password" type="password" name="current-password" required/>
																		<a href="#" class="font-weight-bold font-size-sm">Forgot password ?</a>
                                                                       
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
																	</div>
																</div>
																<!--end::Group-->
																<!--begin::Group-->
																<div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }} row">
																	<label class="col-form-label col-3 text-lg-right text-left">New Password</label>
																	<div class="col-9">
																		<input class="form-control form-control-lg form-control-solid" id="new-password" type="password"  name="new-password" required/>
                                                                        @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                                                                    </div>
																</div>
																<!--end::Group-->
																<!--begin::Group-->
																<div class="form-group row">
																	<label class="col-form-label col-3 text-lg-right text-left">Verify Password</label>
																	<div class="col-9">
																		<input class="form-control form-control-lg form-control-solid" id="new-password-confirm" type="password" name="new-password_confirmation" required />
																	</div>
																</div>
																<!--end::Group-->
															</div>
														</div>
                        <div class="form-group row">
                        <div class="col-lg-4"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

</div>



@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
{{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

{{-- page scripts --}}
<script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
