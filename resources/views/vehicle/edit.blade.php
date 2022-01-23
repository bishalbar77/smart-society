{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<!--begin::Card-->
<!--begin::Card-->
<div class="card">
<div class="card-header">
<h3 class="card-title">Edit Vehicle</h3>
</div>
<!--begin::Form-->
    <form class="form"  method="POST" action="{{ route('vehicle.update',$Vehicle->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="card-body">
            

            <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Approve or Reject:</label>
                        <select class="form-control form-control-solid" name="status" id="kt_select2_2" required>
                            <option value="Approve">Approve</option>
                            <option value="Reject">Reject</option>
                        
                        </select>   <span class="invalid-feedback" role="alert">
                    <strong></strong>
                    </span> 
                        
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