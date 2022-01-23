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
<form class="form" method="post" id="kt_form" action="/rentstore" enctype="multipart/form-data">
@csrf
<div class="row justify-content-center">
<div class="col-xl-12">
<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
<h5 class="text-dark font-weight-bold mb-10">Society Purchase Information</h5>



<div class="form-group row">
<div class="col-lg-4">
<label>Recipient Name:</label>
<input type="text" class="form-control  form-control-solid @error('name') is-invalid @enderror" id="name" name="name" placeholder="First Name" />
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="col-lg-4">
<label>Email:</label>
<input type="email" class="form-control  form-control-solid @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" />
</div>
<div class="col-lg-4">
<label>Contact:</label>
<input type="tel" class="form-control  form-control-solid @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Contact No" />
@error('phone')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>


<div class="form-group row">
<div class="col-lg-4">
<label>INVOICE No. (Optional)</label>
<input type="text" class="form-control  form-control-solid @error('flat_no') is-invalid @enderror" name="flat_no"> 
@error('flat_no')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="col-lg-4">
<label>Transaction Date:</label>
<input type="date" class="form-control form-control-solid"  name="txt_dat" id="txt_dat"/>		
</div>
<input type="hidden" value="Debit" name="type"> 

<div class="col-lg-4">
<label>Remark:</label>
<input type="text" class="form-control form-control-solid"  name="remark" id="remark"/>	
</div>

</div>

<div class="form-group row">
<div class="col-lg-4">
<label>Mode of Payment:</label>
<select class="form-control form-control-solid  @error('ddl_payment') is-invalid @enderror" id="kt_select2_4" name="ddl_payment">
<option value>Select mode of payment</option>
<option value = "account-Transfer">account-Transfer</option>
<option value = "wallet-Transfer">UPI Transfer</option>
<option value = "Cash">Cash</option>
<option value = "Trial-Period">Trial-Period</option>
@error('ddl_payment')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</select>
</div>
<div class="col-lg-4">
<label>AC/UPI Details:</label>
<input type="text" class="form-control form-control-solid" name="txt_ac">
		
</div>
<div class="col-lg-4">
<label>Amount Paid:</label>
<input type="number" class="form-control form-control-solid"  name="txt_amount" id="txt_amount"/>	
</div>
</div>
<div class="form-group row">
<div class="col-lg-4">
<label>Remittance Cause</label>
<input class="form-control form-control-solid @error('month') is-invalid @enderror" name="month"> 
@error('month')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="col-lg-4">
<label>Transaction Reference:</label>
<input type="text" class="form-control form-control-solid"  name="txt_ref" id="txt_ref"/>				
</div>

</div>
</div>
<!--end::Wizard Step 4-->
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