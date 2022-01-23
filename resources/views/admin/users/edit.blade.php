{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card">
<!--begin::Header-->
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
    <h3 class="card-label">Edit User {{ $user-> name}}
    <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
    </div>

    </div>


        <form action ="{{route ('admin.users.update' , $user) }}" method ="POST">
            <div class="card-body">

                <div class="form-group row">
                    <div class="col-lg-4">
                    <label>First Name:</label>
                    <input type="text" class="form-control form-control-solid form-control-lg @error('name') is-invalid @enderror" id="name" name="name"  value="{{ $user->name }}"   autocomplete="name"/>
                    @error('fname')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="form-text text-muted">Please enter your First Name</span>
                    </div>

                    <div class="col-lg-4">
                    <label>Last Name:</label>
                    <input type="text" class="form-control form-control-solid form-control-lg @error('name') is-invalid @enderror" id="ltname" name="ltname"  value="{{ $user->ltname }}"   autocomplete="ltname"/>
                    @error('lname')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="col-lg-4">
                    <label>Contact Phone</label>
                    <div class="input-group input-group-solid input-group-lg">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="la la-phone"></i>
                    </span>
                    </div>
                    <input id="phone" type="number" class="form-control form-control-solid form-control-lg @error('phone') is-invalid @enderror" name="phone"  value="{{ $user->phone }}"   required autocomplete="phone" autofocus/>
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
                    <div class="input-group input-group-solid input-group-lg">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="la la-at"></i>
                    </span>
                    </div>
                    <input id="email" type="email" class="form-control form-control-solid form-control-lg form-control @error('email') is-invalid @enderror" name="email"   value="{{ $user->email }}"   required autocomplete="email">
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
                    <input type="date" class="form-control form-control-solid form-control-lg" id="dob" value="{{ $user->dob }}"   name="dob" autocomplete="dob"/>
                    <div class="input-group-append">

                    </div>
                    </div>
                    <span class="form-text text-muted">Please enter date of birth</span>

                    </div>

                    <div class="col-lg-4">
                    <label>Address:</label>
                    <div class="input-group">
                    <input type="text" id="add" type="text" class="form-control form-control-solid form-control-lg" name="add"  value="{{ $user->add }}"   autocomplete="add" autofocus />
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
                    <div class="col-lg-4">
                    <label>Post/Pincode</label>
                    <input id="pincode" type="text" class="form-control form-control-solid form-control-lg " name="pincode"  value="{{ $user->pincode }}"   required autocomplete="pincode" autofocus/>
                    <span class="form-text text-muted">Please enter your Postcode or Pincode</span>

                    </div>

                    <div class="col-lg-4">
                    <label>District:</label>
                    <input class="form-control form-control-solid form-control-lg" name="district" required autocomplete="district"  value="{{ $user->district }}"   autofocus id="district">

                    <span class="form-text text-muted">Please Select District</span>
                    </div>
                    <!--begin::Row-->

                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="col-lg-4">
                    <label>City</label>
                    <input id="city" type="text" class="textbox form-control form-control-solid form-control-lg " name="city"   value="{{ $user->city }}"  required autocomplete="city" autofocus/>
                    <span class="form-text text-muted">Please enter your City.</span>
                    </div>
                </div>
                <!--end::Group-->

            <!--end::Row-->
            <!--begin::Row-->
                <div class="form-group row">
                    <div class="col-lg-4">
                    <label>State</label>
                    <input id="state" type="text" class="form-control form-control-solid form-control-lg " name="state"  value="{{ $user->state }}"   required autocomplete="state" autofocus/>
                    <span class="form-text text-muted">Please enter your State.</span>
                    </div>

                    <div class="col-lg-4">
                    <label>Country</label>
                    <input id="country" type="text" class="form-control form-control-solid form-control-lg " name="country"  value="{{ $user->country }}"   required autocomplete="country" autofocus/>
                    </div>
                    <!--end::Group-->
                    <div class="col-lg-4">
                    <label>Blood Group:</label>
                    <input type="text" class="form-control form-control-solid form-control-lg" id="bgroup" name="bgroup"  value="{{ $user->bgroup }}"   autocomplete="bgroup" />
                    <span class="form-text text-muted">Please enter Blood Group</span>
                    </div>
                </div>
                
                
            
                @csrf
                {{ method_field('PUT')}}
                <br>
                <div class="col-lg-4">
            <label>Role:</label>
            
            <select class="form-control form-control-solid" name="roles[]" id="kt_select2_2" required>
                    @foreach($roles as $role)
                    @if ($role->id == 1)
						@continue
					@endif
                    @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                        <option value="{{ $role-> id }}">{{ $role-> name }}</option>
                    @endforeach
                </select>
				</div>
                <br>
                <br>
                <div class="form-group pl-5">
                <button type="submit" class="btn btn-success">
                Update
                </button>
                </div>
            
        <!--end: Datatable-->
        </form>
       
    </div>
<!--end::Body-->
</div>
<!--end::Card-->


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
