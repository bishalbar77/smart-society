{{-- Extends layout --}} 
@extends('layout.default') 
{{-- Content --}} 
@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        @include('flash')
        <div class="row">
            <div class="col-sm-12">
                <!--begin::Advance Table Widget 2-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark"> {{ $Vehicle->vehicle_pass }}</span>
                        </h3>
                       
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3 pb-0">
                        <!--begin::Table-->
                        <div class="form-group">
                            <div class="form-group">
                                <label for="category">Owner Name</label>
                                <input type="text" class="form-control" id="closed" value="{{ ($Vehicle->user_name) }} " readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="category">Owner Number</label>
                                <input type="text" class="form-control" id="closed" value="{{ ($Vehicle->user_number) }} " readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Vehicle number</label>
                            <input type="text" class="form-control" id="title" value="{{ $Vehicle->vehicle_number }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="comment">Vehicle type</label>
                            <input class="form-control" id="message" value="{{ $Vehicle->vehicle_type }}" readonly>
                        </div>
                        <div class="form-row">
                                <label for="category">User type</label>
                                <input type="text" class="form-control" id="status" value="{{ $Vehicle->user_type }}" readonly>
                            </div>
    
                          
                       
                        
                       
                        <br>
                        <br>
                        
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table Widget 2-->
            </div>
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row">


        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

@endsection {{-- Styles Section --}} @section('styles')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" /> @endsection {{-- Scripts Section --}} @section('scripts') {{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

{{-- page scripts --}}
<script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection