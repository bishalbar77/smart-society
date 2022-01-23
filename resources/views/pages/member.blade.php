{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')
<div class="card card-custom">
	<div class="card-header card-header-tabs-line">
		<div class="card-toolbar">
		    <ul class="nav nav-tabs nav-bold nav-tabs-line">
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
						<span class="nav-text">Add Offers</span>
					</a>
				</li>
			</ul>
		</div>
		</div>
	    <div class="card-body">
		<div class="tab-content">
			<div class="tab-pane fade show active" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
            <form class="form" action="/memberinsert" method="post" enctype="multipart/form-data">
		@csrf
			<div class="form-group row">
            		<div class="col-lg-4">
		                <label>Select Housing Type:</label>
                        <select class="form-control" name="pk_id" required>
							<option>Select Housing Type</option>
							<option>Villa</option>
							<option>Apartment</option>
						
                        </select> 
						
                    </div> 
					<div class="col-lg-4">
						<label>Number of BHK:</label>
                        <select name="off_type" class="form-control" id="ddl_type" onchange = "offer_type()" required>
							<option value="">Select BHK</option>
							<option>1 BHK</option>
							<option>2 BHK</option>
							<option>3 BHK</option>
							<option>SUIT</option>
						</select>
					</div> 
					<div class="col-lg-4">
						<label>Rent Amount:</label>
						<input type="text" class="form-control" placeholder="Amount" name="pk_amount" required/>
					</div>
                </div>
				<div class="form-group row">
				<div class="col-lg-4">
						<label>Limit Housing:</label>
						<input type="text" class="form-control" placeholder="No of Housing" name="pk_agent" required/>
					</div>
					
            		<div class="col-lg-4">
		                 <label>Limit Vehicle Parking:</label>
                            <input type="text" class="form-control" placeholder="No. Vehicle Parking" name="pk_job" required/>
                    </div>
                                                
					<div class="col-lg-4">
						<label>Limit Inventory:</label>
							<input type="text" class="form-control" placeholder="No of Inventory" name="pk_inventory" required/>
					</div>
				</div>
				<div class="form-group row">
				<div class="col-lg-4">
						<label>Block:</label>
						<input type="text" class="form-control" placeholder="Block" name="block" required/>
					</div>
					
            		<div class="col-lg-4">
		                 <label>Floor Number:</label>
                            <input type="text" class="form-control" placeholder="Floor Number" name="floor" required/>
                    </div>
                                                
					<div class="col-lg-4">
						<label>Building Number (Optional):</label>
							<input type="text" class="form-control" placeholder="Building Number" name="building" required/>
					</div>
				</div>
				<div class="form-group row"> 
					
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-lg-4"></div>
							<div class="col-lg-8">
								<button type="submit" class="btn btn-primary mr-2">Submit</button>
							</div>
					</div>
				</div>
																	
		</form>
    </div>
			
		</div>
	</div>
</div>
										
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.3"></script>
<script src="js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.3"></script>	
<script type="text/javascript">
    
	function offer_type() 
	{
	 	var selectedValue = ddl_type.options[ddl_type.selectedIndex].value;
		var sdate=document.getElementById("of_sdate");
		var edate=document.getElementById("of_edate");
		
		if (selectedValue=='Promotional')
		{
			sdate.disabled = false;
			edate.disabled = false;
		}
		else{

			sdate.disabled = true;
			edate.disabled = true;
		}
	}
</script>
@endsection
