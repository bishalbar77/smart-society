{{-- Extends layout --}}
@extends('layout.default')
{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
<!--begin::Container-->
<div class="container">
<!--begin::Card-->
<div class="card card-custom card-transparent">
<div class="card-body p-0">
<!--begin::Wizard-->
<div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
<!--end::Wizard Nav-->
<!--begin::Card-->
<div class="card card-custom gutter-b">
<!--begin::Body-->
<div class="card-body p-0">
<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
<div class="col-xl-12 col-xxl-12">
<!--begin::Wizard Form-->
<form class="form" method="post" id="kt_form" action="/storeticket" enctype="multipart/form-data">
@csrf
<div class="row justify-content-center">
<div class="col-xl-12">
<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
<h5 class="text-dark font-weight-bold mb-10">Raise a Ticket</h5>



<div class="form-group row">
<div class="col-lg-4">
<label>Resident Name:</label>
<input type="text" class="form-control  form-control-solid @error('name') is-invalid @enderror" required id="name" name="name" placeholder="Name" />
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="col-lg-4">
<label>Email:</label>
<input type="email" class="form-control  form-control-solid @error('email') is-invalid @enderror" required id="email" placeholder="Enter email" name="email" />
</div>
<div class="col-lg-4">
<label>Contact:</label>
<input type="tel" class="form-control  form-control-solid @error('phone') is-invalid @enderror" required  id="phone" name="phone" placeholder="Contact No" />
@error('phone')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>


<div class="form-group row">
<div class="col-lg-4">
<label>Flat No:</label>
<select class="form-control  form-control-solid @error('flat_no') is-invalid @enderror" name="flat_no" id="kt_select2_1" required > 
<option value="N/A">Select Living Type</option>
@foreach($user as $users)
<option value="{{ $users->flat_no}}">{{ $users->flat_no}}</option>
@endforeach
@error('flat_no')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</select>
</div>
<div class="col-lg-4">
<label>Issue Type</label>
<select class="form-control form-control-solid  @error('ddl_payment') is-invalid @enderror" id="kt_select2_4" name="issue" required >
<option value>Select Issue Type</option>
<option value = "Water">Water</option>
<option value = "Electricity">Electricity</option>
<option value = "Housing">Housing</option>
<option value = "Payments">Payments</option>
<option value = "Others">Others</option>
@error('ddl_payment')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</select>
</div>

<div class="col-lg-4">
<label>Resident Type</label>
<select class="form-control  form-control-solid @error('type') is-invalid @enderror" name="type" id="kt_select2_2"> 
<option>Select Resident Type</option>
<option>Owner</option>
<option>Tenant</option>
<option>other</option>
@error('type')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</select>
</div>
</div>

<div class="form-group row">
<div class="col-lg-4">
<label>Subject</label>
<input type="text" class="form-control form-control-solid" required name="subject" id="subject"/>		
</div>
</div>
</div>
<!--end::Wizard Step 4-->

<!--begin::Wizard Actions-->
<div class="d-flex justify-content-between border-top pt-10 mt-15">
<div class="mr-2">
<button id="prev-step" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-prev">Previous</button>
</div>
<div>
<button type="submit" class="btn btn-primary mr-2">Submit</button>

</div>
</div>
<!--end::Wizard Actions-->
</div>
</div>
<div class="col-lg-8">


</div>
</form>
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Card-->
</div>
<!--end::Wizard-->
</div>
</div>
<!--end::Card-->
</div>
<!--end::Container-->
</div>
@endsection


{{-- Scripts Section --}}
@section('scripts')
		
<script src="js/pages/custom/user/add-user.js?v=7.0.3"></script>
<script>
        function get_detail(){
            var pincode1=jQuery('#pincode1').val();
            if(pincode1==''){
                jQuery('#city1').val('');
                jQuery('#state1').val('');
                jQuery('#district1').val('');
                jQuery('#country1').val('');
                
            }else{
                jQuery.ajax({
                    url:'get1.php',
                    type:'post',
                    data:'pincode1='+pincode1,
                    success:function(data){
                        if(data=='no'){
                            jQuery('#city1').val('');
							jQuery('#state1').val('');
							jQuery('#district1').val('');
							jQuery('#country1').val('');
                        }else{
                            var getData=$.parseJSON(data);
                            jQuery('#city1').val(getData.city1);
                            jQuery('#state1').val(getData.state1);
                            jQuery('#district1').val(getData.district1);
                            jQuery('#country1').val(getData.country1);
                        }
                    }
                });
            }
        }
        </script>
<script src="js/pages/crud/forms/widgets/select2.js?v=7.0.3"></script>
@endsection