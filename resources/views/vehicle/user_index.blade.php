<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		{{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="css/style.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
		{{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.jpeg') }}" />
        <link href="css/pages/wizard/wizard-4.css?v=7.0.3" rel="stylesheet" type="text/css" />
        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}

        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Includable CSS --}}
        @yield('styles')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body  id="kt_body" {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

        @if (config('layout.page-loader.type') != '')
            @include('layout.partials._page-loader')
        @endif
		
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<div class="content  d-flex flex-column flex-column-fluid">
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Card-->
								<div class="card card-custom">
								<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h3 class="card-label"> Vehicle Management
											<div class="text-muted pt-2 font-size-sm">All vehicles are listed below</div></h3>
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
			<div class="card">
		<div class="card-body">
            <form id="clear">
                <div class="row">
                                   
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="0">
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control column_filter" id="col0_filter" placeholder="Name">
                        </div>
                    </div>
				 <!--Email-->
				 <div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col1" data-column="1">
                            <label>Phone</label>
                            <input type="text" name="Phone" class="form-control column_filter" id="col1_filter" placeholder="Phone">
                        </div>
                    </div>
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="2">
                            <label>Vehicle Number</label>
                            <input type="text" name="Flat No" class="form-control column_filter" id="col2_filter" placeholder="Flat No">
                        </div>
                    </div>
				 <!--phone-->
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="3">
                            <label>Ticket</label>
                            <input type="phone" name="Vehicle No." class="form-control column_filter" id="col3_filter" placeholder="Vehicle Number">
                        </div>
                    </div>
            </div>
              
                </form>
				<div class="row mt-8">
				<div class="col-lg-12">
				<button class="btn btn-secondary btn-secondary--icon" onclick="ClearFields();">
					<span>
						<i class="la la-close"></i>
						<span>Reset</span>
					</span>
				</button></div>
			</div>
            </div>
        </div>
										<!--Advance Search grp-->
										<a href="" class="p-4"> </a>
										
										<!-- <table class="table table-separate table-head-custom table-checkable" id="profiler"> -->
										<table class="table table-bordered table-hover table-checkable" id="ex" class="display" style="width:100%">
										<thead>
    <tr>
	<th scope="col">Name</th>
	<th scope="col">Contact</th>
      <th scope="col">Vehicle Number</th>
	  <th scope="col">Ticket</th>
	  <th scope="col">In Time</th>
	  <th scope="col">Out Time</th>
      <th scope="col">Status</th>
	  <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Vehicle as $user)
  
  <tr>
  <td>{{ $user->user_name }}</td>
  <td>{{ $user->user_number }}</td>
      <td>{{ $user->vehicle_number }}</td>
	  <td>{{ $user->vehicle_pass }}</td>
	  <td>{{ strftime("%d %b %Y, %H:%M:%S",strtotime($user->in_time)) }}</td>
	  <td>
	  @if($user->out_time!='')
	  {{ strftime("%d %b %Y, %H:%M:%S",strtotime($user->out_time)) }}
	  @else
	  <a href="{{ route('vehicles.show', $user->id )}}" type="button" class="btn btn-sm btn-danger">Clock out</a>
	  @endif
	  </td>
	  <td>
	  @if( $user->status==="Approve")
        <span class="label label-lg font-weight-bold label-light-success label-inline">{{ $user->status }}</span>
    
		@elseif($user->status==="Reject")
        <span class="label label-lg font-weight-bold label-light-danger label-inline">Disabled</span>
		@elseif($user->status==="O")
        <span class="label label-lg font-weight-bold label-light-primary label-inline">Out-of-doors</span>
        @else
        <span class="label label-lg font-weight-bold label-light-info label-inline">{{ $user->status }}</span>
        
		@endif
		</td>
	  <td>
		<a href="{{ route('vehicle.show', $user->id )}}" 
		class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="View">
		<i class="far fa-eye text-info"></i></a>

		{{-- <a href="{{ route('vehicle.edit', $user->id )}}" data-toggle="tooltip" title="Only for admins" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2">
		<i class="far fa-edit text-primary"></i></a>
		</td> --}}
		</tr>

			@endforeach


		</tbody>
										</table>
										
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
					</div>
				</div>				
			</div>
			</div>
			@include('layout.base._layout')
		<!--end::Main-->
		@foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
            <script src="plugins/global/plugins.bundle.js?v=7.0.3"></script>
        @endforeach
		<script>
		 function filterGlobal () {
		$('#ex').DataTable().search(
			$('#global_filter').val(),
		
		).draw();
		}
		
		function filterColumn ( i ) {
			$('#ex').DataTable().column( i ).search(
				$('#col'+i+'_filter').val()
			).draw();
		}
		
		$(document).ready(function() {
			$('#ex').DataTable({sDom: 'lrtip'});
			
			$('input.global_filter').on( 'keyup click', function () {
				filterGlobal();
			} );
		
			$('input.column_filter').on( 'keyup click', function () {
				filterColumn( $(this).parents('div').attr('data-column') );
			} );
		} );

        $('select.column_filter').on('change', function () {
            filterColumn( $(this).parents('div').attr('data-column') );
        } );
		</script>
		<script>
				$(document).ready(function() {
			var table = $('#ex').DataTable();
		
			$('#ex tbody').on( 'click', 'tr', function () {
				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			} );
		
			$('#button').click( function () {
				table.row('.selected').remove().draw( false );
			} );
		} );
		</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="plugins/global/plugins.bundle.js?v=7.0.3"></script>
		<script src="plugins/custom/prismjs/prismjs.bundle.js?v=7.0.3"></script>
		<script src="js/scripts.bundle.js?v=7.0.3"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
		<script src="plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
		<script src="plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="js/pages/crud/datatables/search-options/advanced-search.js?v=7.0.3"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>