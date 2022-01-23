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
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
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
											<h3 class="card-label">Visitor Datatable
											<div class="text-muted pt-2 font-size-sm">All visitor are listed below</div></h3>
										</div>
										<div>
										<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">Add Visitor</button>
											<!-- Modal--></div>
											<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
											<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Visitor</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<i aria-hidden="true" class="ki ki-close"></i>
											</button>
											</div>
											<div class="modal-body">
											<form action="/storevisitor" method="post">
											@csrf
											<div class="form-group row">
											<div class="col-lg-12 pb-3">
											<label>Name</label>
											<input type="text" class="form-control" name="name" />
											</div>
											<div class="col-lg-12 pb-3">
											<label>Contact Number</label>
											<input type="text" class="form-control" name="phone" />
											</div>
											<div class="col-lg-12 pb-3">
											<label>E-mail(Optional)</label>
											<input type="text" class="form-control" name="email" />
											</div>
											<div class="col-lg-12 pb-3">
											<label>Vehicle Number(Optional)</label>
											<input type="text" class="form-control" name="vehicle_no" />
											</div>
											
											<div class="col-lg-12 pb-3">
											<label>Visiting Flat Number</label>
											<input type="text" class="form-control" name="flat_no" />
											</div>
											<div class="col-lg-12 pb-3">
											<label>Purpose of Visit</label>
											<input type="text" class="form-control" name="purpose" />
											</div>
											</div>
											</div>
											<div class="modal-footer">
											<input type="submit" class="btn btn-primary font-weight-bold" value="Submit" />
											</form>
												<!--end::Dropdown Menu-->
											</div>
											<!--end::Dropdown-->
										</div>
										
											<!--end::Dropdown-->
											</div>
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
                        <div class="form-group" id="filter_col0" data-column="1">
                            <label>ID</label>
                            <input type="text" name="Name" class="form-control column_filter" id="col1_filter" placeholder="Name">
                        </div>
                    </div>
				 <div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col1" data-column="2">
                            <label>Phone</label>
                            <input type="text" name="Phone" class="form-control column_filter" id="col2_filter" placeholder="Phone">
                        </div>
                    </div>
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="3">
                            <label>Flat No</label>
                            <input type="text" name="Flat No" class="form-control column_filter" id="col3_filter" placeholder="Flat No">
                        </div>
                    </div>
				 <!--phone-->
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="4">
                            <label>Vehicle No.</label>
                            <input type="phone" name="Vehicle No." class="form-control column_filter" id="col4_filter" placeholder="Vehicle Number">
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
	  <th scope="col">ID</th>
      <th scope="col">Phone</th>
	  <th scope="col">Flat No.</th>
      <th scope="col">Vehicle No.</th>
	  <th scope="col">Purpose</th>
	  <th scope="col">In Time</th>
	  <th scope="col">Out Time</th>
	  <th scope="col">Date</th>
	  <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($visitors as $visitors)
  <tr>
      <td>{{ $visitors->name }}</td>
	  <td>{{ $visitors->getpass }}</td>
      <td>{{ $visitors->phone }}</td>
	  <td>{{ $visitors->flat_no }}</td>
	  <td>{{ $visitors->vehicle_no }}</td>
	  <td>{{ $visitors->purpose }}</td>
	  <td>{{ $visitors->in_time }}</td>
	  <td>
	  @if($visitors->out_time!='')
	  {{ $visitors->out_time }}
	  @else
	  <a href="{{ route('visitor.show', $visitors->id )}}" type="button" class="btn btn-sm btn-danger">Clock out</a>
	  @endif
	  </td>
	  <td>{{ strftime("%d %b %Y",strtotime($visitors->in_time)) }}</td>
	  <td>
	  <form action="{{ route('visitor.destroy', $visitors->id )}}" method="POST" onsubmit="return confirm('Confirm delete');" style="display: inline-block;">
		<input type="hidden" name="_method" value="DELETE">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" class="btn btn-sm btn-danger btn-hover-primary btn-icon mr-2" value="D">
	</form></td>
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