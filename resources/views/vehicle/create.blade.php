{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<!--begin::Card-->
<!--begin::Card-->
<div class="card">
<div class="card-header">
<h3 class="card-title">Add Vehicle</h3>
</div>
@include('flash')
<!--begin::Form-->
    <form class="form"  method="POST" action="{{ route('vehicle.store') }}" enctype="multipart/form-data">
    @csrf
        <div class="card-body">
            <div class="form-group row">
            <div class="col-lg-4">
                <label>Name:</label>
                <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" autocomplete="user_name"/>
                @error('user_name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="form-text text-muted">Please Enter vehicle owner name</span>
                </div>

                <div class="col-lg-4">
                <label>Contact Number:</label>
                <input type="text" class="form-control @error('user_number') is-invalid @enderror" id="user_number" name="user_number" autocomplete="user_number"/>
                @error('user_number')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="form-text text-muted">Please Enter vehicle owner contact number</span>
                </div>

                <div class="col-lg-4">
                <label>Vehicle Number:</label>
                <input type="text" class="form-control @error('vehicle_number') is-invalid @enderror" id="vehicle_number" name="vehicle_number" autocomplete="vehicle_number"/>
                @error('vehicle_number')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="form-text text-muted">Please Enter Vehicle Number</span>
                </div>

                

               
                
            </div>

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Driving license (Optional)</label>
                    <div class="custom-file">
							<input type="file" class="custom-file-input @error('Driving_license_photo') is-invalid @enderror" id="image" name="Driving_license_photo" accept=".png, .jpg, .jpeg"/>
								<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
                    @error('Driving_license_photo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
    

                

                   <div class="col-lg-4">
                    <label>Pollution Certificate (Optional)</label>
                    <div class="custom-file">
							<input type="file" class="custom-file-input @error('Driving_license_photo') is-invalid @enderror" id="image" name="pollution_photo" accept=".png, .jpg, .jpeg"/>
								<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
                    @error('pollution_photo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>

                    <div class="col-lg-4">
                <label>Vehicle Type:</label>
                <select class="form-control" name="vehicle_type" id="kt_select2_2" @error('vehicle_type') is-invalid @enderror" id="vehicle_type" name="vehicle_type" required>
                    <option>Two wheeler without gear</option>
                    <option>Two wheeler with gear</option>
                    <option>Three wheeler</option>
                    <option>Four Wheeler</option>
                    <option>Others</option>

                </select>
			
                @error('vehicle_type')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>

                   </div>


            <div class="form-group row">
            <div class="col-lg-4">
                    <label>User type:</label>
                    <select class="form-control" name="user_type" required>
                    <option value="Owner">Owner</option>
                    <option value="Tenant">Tenant</option>
                    <option value="Visitor">Visitor</option>
                    <option vlaue="Staff">Staff</option>
                    <option vlaue="other">Others</option>
                </select>
                </div>
                   </div>

            
            </div>
            <input type="hidden" name="type" value="Staff">
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


@endsection

{{-- Scripts Section --}}
@section('scripts')

<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>	
<script src="js/pages/crud/forms/widgets/select2.js?v=7.0.3"></script>	

@endsection 