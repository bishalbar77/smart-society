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
											<div class="wizard-number"></div>
													
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
						<form class="form" method="post" id="kt_form" action="/servicecentres" enctype="multipart/form-data">
                        @csrf
		<!--end::Wizard Step 1-->
		<!--begin::Wizard Step 2-->
		<div class="my-5 step" data-wizard-type="step-content">
		<h5 class="text-dark font-weight-bold mb-10">Society Information</h5>	
			<div class="form-group row">
					<div class="col-lg-4">
						<label>Society Legal Name</label>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="Society Legal Name" required />
						@error('fname')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
					
					<div class="col-lg-4">
						<label>Society Contact No:</label>
							<input type="tel" class="form-control @error('phone1') is-invalid @enderror" required  id="phone1" name="phone1" placeholder="Society Contact No" />	
							@error('phone1')
							    <span class="invalid-feedback" role="alert">
								    <strong>{{ $message }}</strong>
							    </span>
						    @enderror	
					</div>  
			
			<div class="col-lg-4">
						<label>Society Email:</label>
                            <input type="email" class="form-control  @error('email1') is-invalid @enderror" required  name="email1" id="email1" palceholder="Society Email"/> 
							@error('email1')
							    <span class="invalid-feedback" role="alert">
								    <strong>{{ $message }}</strong>
							    </span>
						    @enderror
			</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-4">
						<label>Society Addressline 1:</label>
				            <div class="input-group">
								<input type="text" class="form-control"  name="badd" id="badd" required />
								@error('badd')
								    <span class="invalid-feedback" role="alert">
									    <strong>{{ $message }}</strong>
								    </span>
							    @enderror
							        <div class="input-group-append">
										<span class="input-group-text">
										    <i class="la la-map-marker"></i>
										</span>
									</div>
							</div>
					</div>
					<div class="col-lg-4">
           				<label>District:</label>
            			<input class="form-control" name="district1" required autocomplete="district1" id="district1">
						@error('district1')
								    <span class="invalid-feedback" role="alert">
									    <strong>{{ $message }}</strong>
								    </span>
							    @enderror
           			 </div>
				
				<div class="col-lg-4">
						<label> Society Pincode:</label>
						<input id="pincode1" type="text" class="form-control" name="pincode1" required autocomplete="pincode1" autofocus/>
						@error('pincode1')
								    <span class="invalid-feedback" role="alert">
									    <strong>{{ $message }}</strong>
								    </span>
							    @enderror
				</div>	
					</div>
				<div class="form-group row">
					<div class="col-lg-4">
            			<label>City</label>
            			<input id="city1" type="text" class="form-control" name="city1" required autocomplete="city1"/>
						@error('city1')
								    <span class="invalid-feedback" role="alert">
									    <strong>{{ $message }}</strong>
								    </span>
							    @enderror
           			 </div>
				
				<div class="col-lg-4">
            			<label>State</label>
           				<input id="state1" type="text" class="form-control" name="state1" required autocomplete="state1"/>
						   @error('state1')
								    <span class="invalid-feedback" role="alert">
									    <strong>{{ $message }}</strong>
								    </span>
							    @enderror
            		</div>
					<div class="col-lg-4">
            			<label>Country</label>
            			<input id="country1" type="text" class="form-control" name="country1" required autocomplete="country1"/>
						@error('country1')
								    <span class="invalid-feedback" role="alert">
									    <strong>{{ $message }}</strong>
								    </span>
							    @enderror
            		</div>	
					</div>	
                    									
			</div>
	
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