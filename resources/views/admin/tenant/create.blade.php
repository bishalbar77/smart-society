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
						<!--begin::Wizard Nav-->
							<div class="wizard-nav">
								<div class="wizard-steps">
									<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
										<div class="wizard-wrapper">
												<div class="wizard-label">
													</div>
												</div>
											</div>
											<div class="wizard-step" data-wizard-type="step">
												<div class="wizard-wrapper">
														<div class="wizard-label">
															</div>
														</div>
												</div>													
												</div>
											</div>
											<!--end::Wizard Nav-->
											<!--begin::Card-->
		<div class="card card-custom gutter-b">
			<!--begin::Body-->
			<div class="card-body p-0">
				<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
					<div class="col-xl-12 col-xxl-12">
						<!--begin::Wizard Form-->
						<form class="form" method="post" id="kt_form" action="/storetenant" enctype="multipart/form-data">
                        @csrf
						<div class="row justify-content-center">
							<div class="col-xl-12">
									<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
									<h5 class="text-dark font-weight-bold mb-10">Personal Information</h5>
																			
									
								
                                    <div class="form-group row">
                <div class="col-lg-4">
                <label>First Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="name"/>
                @error('fname')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="form-text text-muted">Please enter your First Name</span>
                </div>

                <div class="col-lg-4">
                <label>Last Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="ltname" name="ltname" autocomplete="ltname"/>
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
                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" autofocus/>
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
                <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="la la-at"></i>
                </span>
                </div>
                <input id="email" type="email" class="form-control form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                <input type="date" class="form-control" value="05/20/2017" id="dob" name="dob" autocomplete="dob"/>
                <div class="input-group-append">

                </div>
                </div>
                <span class="form-text text-muted">Please enter date of birth</span>

                </div>

                <div class="col-lg-4">
                <label>Address:</label>
                <div class="input-group">
                <input type="text" id="add" type="text" class="form-control" name="add" autocomplete="add" autofocus />
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
            <select class="form-control form-control-solid" name="roles[]" id="kt_select2_2" required>
                    @foreach($roles as $role)
                    @if ($role->id!=4)
						@continue
					@endif
                        <option value="{{ $role-> id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
				</div>
            </div>
            <div class="form-group row">
            <div class="col-lg-4">
            <label>Flat No.</label>
            <select id="flat_no" type="text" class="form-control " name="flat_no" required autocomplete="flat_no" autofocus>
            <option>Select Flat</option>
            @foreach($user as $user)
            @if($user->ownership=='Owner')
            <option>{{ $user->flat_no }}</option>
            @endif
            @endforeach
            </select>
            </div>
            </div>
			</div>	
		<!--end::Wizard Step 1-->
		<!--begin::Wizard Step 2-->
		<div class="my-5 step" data-wizard-type="step-content">
		<h5 class="text-dark font-weight-bold mb-10">Upload Documents</h5>	
			<div class="form-group row">
					<div class="col-lg-4">
						<label>Aadhar Card No.</label>
						<input type="text" class="form-control" id="aadhar" name="aadhar" placeholder="Aadhar Card No." />
					</div>
					
					<div class="col-lg-4">
						<label>PAN Card No:</label>
                        <input type="text" class="form-control" id="pan" name="pan" placeholder="PAN/GST-NUMBER" />	
					</div>  
			
                    <div class="col-lg-4">
				<label>Citizen of India</label>
				<br><br>
				<input type="radio" value="Indian" name="citizen_type"> YES
				<a class="p-5"></a>
				<input type="radio"  value="Others" name="citizen_type"> NO
				</div>
			</div>
			<div class="form-group row">
            <div class="col-lg-4">
                	<label>Upload Resident Image:</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="resident" name="resident" placeholder="Upload Resident Image" accept=".png, .jpg, .jpeg"/>
								<label class="custom-file-label" for="customFile">Choose file</label>
						</div>        
                </div>
				<div class="col-lg-4">
                	<label>Upload PAN certificate:</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile" name="file" placeholder="Upload GST Certificate" accept=".pdf"/>
								<label class="custom-file-label" for="customFile">Choose file</label>
								
						</div>        
                </div>
				
			
				<div class="col-lg-4">
                	<label>Upload Aadhar Card:</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image" placeholder="Upload Business Logo" accept=".png, .jpg, .jpeg"/>
								<label class="custom-file-label" for="customFile">Choose file</label>
								@error('image')
                                    
									<strong>{{ $message }}</strong>
								
							@enderror
						</div>        
                </div>
				</div>
                    									
			</div>							
         
	<!--begin::Wizard Step 4-->
	
	
	<!--begin::Wizard Actions-->
	<div class="d-flex justify-content-between border-top pt-10 mt-15">
		<div class="mr-2">
			<button id="prev-step" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-prev">Previous</button>
		</div>
		<div>
		<button type="submit" class="btn btn-primary mr-2">Submit</button>
			<button id="next-step" class="btn btn-primary font-weight-bolder px-9 py-4" data-wizard-type="action-next">Next</button>
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
<script>
 function hideA(x) {
   if (x.checked) {
     document.getElementById("A").style.visibility = "hidden";
     document.getElementById("B").style.visibility = "visible";
   }
 }

 function showA(x) {
   if (x.checked) {
     document.getElementById("A").style.visibility = "visible";
   }
 }
</script>
<script>
var $sub = $('select.sub');
$('#ddl_payment').first().change(function() {
  $sub.hide();
  if (this.selectedIndex > 0)
    $sub.eq(this.selectedIndex - 1).show();
}).change();
		</script>
				<script type="text/javascript">
			$(document).ready(function() {
  // By Default Disable radio button
  $(".second").attr('disabled', true);
  $(".wrap").css('opacity', '.2'); // This line is used to lightly hide label for disable radio buttons.
  // Disable radio buttons function on Check Disable radio button.
  $("form input:radio").change(function() {
    if ($(this).val() == "Disable") {
      $(".second").attr('checked', false);
      $(".second").attr('disabled', true);
      $(".wrap").css('opacity', '.2');
    }
    // Else Enable radio buttons.
    else {
      $(".second").attr('disabled', false);
      $(".wrap").css('opacity', '1');
    }
  });
});
		</script>
<script src="js/pages/crud/forms/widgets/select2.js?v=7.0.3"></script>
@endsection