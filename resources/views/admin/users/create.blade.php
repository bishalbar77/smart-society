{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<!--begin::Card-->
<!--begin::Card-->
<div class="card">
<div class="card-header">
<h3 class="card-title">Add Society Manager</h3>
</div>
<!--begin::Form-->
    <form class="form"  method="POST" action="{{ route('society.register') }}">
    @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-4">
                <label>First Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" required name="name" autocomplete="name"/>
                @error('fname')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="form-text text-muted">Please enter your First Name</span>
                </div>

                <div class="col-lg-4">
                <label>Last Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="ltname" required name="ltname" autocomplete="ltname"/>
                @error('lname')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="col-lg-4">
                <label>Contact Phone</label>
                <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="la la-phone"></i>
                </span>
                </div>
                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"  required  name="phone" required autocomplete="phone" autofocus/>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                </div>
            </div>

            <div class="form-group row">
                

                <div class="col-lg-4">
                <label>Email Address</label>
                <div class="input-group ">
                <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="la la-at"></i>
                </span>
                </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  required  name="email" value="{{ old('email') }}" required autocomplete="email">
                <span class="form-text text-muted"></span>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                </div>

                <div class="col-lg-4">
                <label>Date-of-birth:</label>

                <div class="input-group date">
                <input type="date" class="form-control" required  value="05/20/2017" id="dob" name="dob" autocomplete="dob"/>
                <div class="input-group-append">

                </div>
                </div>
                <span class="form-text text-muted">Please enter date of birth</span>

                </div>

                <div class="col-lg-4">
                <label>Address:</label>
                <div class="input-group">
                <input type="text" id="add" type="text" required  class="form-control" name="add" autocomplete="add" autofocus />
                <div class="input-group-append">
                <span class="input-group-text">
                <i class="la la-map-marker"></i>
                </span>
                </div>
                </div>
                <span class="form-text text-muted">Please enter your address</span>
                </div>
            </div>

            

            <div class="form-group row">
            <div class="col-lg-3">
            <label>Post/Pincode</label>
            <input id="pincode" type="text" class="form-control " name="pincode" required autocomplete="pincode" autofocus/>
            <span class="form-text text-muted">Please enter your Postcode or Pincode</span>

            </div>

            <div class="col-lg-1">
            <label>.</label>
            <input type="button" class="btn btn-success form-control" value="Auto" onclick="get_details()">
            </div>

            <div class="col-lg-4">
            <label>District:</label>
            <input class="form-control" name="district" required autocomplete="district" autofocus id="district">

            <span class="form-text text-muted">Please Select District</span>
            </div>
            <!--begin::Row-->

            <!--end::Group-->
            <!--begin::Group-->
            <div class="col-lg-4">
            <label>City</label>
            <input id="city" type="text" class="textbox form-control " name="city" required autocomplete="city" autofocus/>
            <span class="form-text text-muted">Please enter your City.</span>
            </div>
            </div>
            <!--end::Group-->

            <!--end::Row-->
            <!--begin::Row-->
            <div class="form-group row">
            <div class="col-lg-4">
            <label>State</label>
            <input id="state" type="text" class="form-control " name="state" required autocomplete="state" autofocus/>
            <span class="form-text text-muted">Please enter your State.</span>
            </div>
            <div class="col-lg-4">
            <label>Country</label>
            <input id="country" type="text" class="form-control " name="country" required autocomplete="country" autofocus/>
            </div>
            <!--end::Group-->
            <div class="col-lg-4">
            <label>Role:</label>
            <select class="form-control " name="roles[]" id="kt_select2_2" required>
                    @foreach($roles as $role)
                    @if ($role->id == 3 || $role->id == 4 || $role->id == 6)
						@continue
					@endif
                        <option value="{{ $role-> id }}">{{ $role-> name }}</option>
                    @endforeach
                </select>
				</div>
            </div>
            <input type="hidden" name="type" value="Management">
            <div class="card-footer">
            <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
            </div>
        </div>
    </form>
<!--end::Form-->
</div>

</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')

<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>	
<script src="js/pages/crud/forms/widgets/select2.js?v=7.0.3"></script>	

@endsection 