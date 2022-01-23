
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
								<div class="card-body">
            <form id="clear">
                <div class="row">

                  <!--ID-->
                  <div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="0">
                            <label>Record ID</label>
                            <input type="text" name="Record ID" class="form-control column_filter" id="col0_filter" placeholder="Record ID">
                        </div>
                    </div>
                  
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="1">
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control column_filter" id="col1_filter" placeholder="Name">
                        </div>
                    </div>
				 <!--Email-->
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="2">
                            <label>Email</label>
                            <input type="text" name="Email" class="form-control column_filter" id="col2_filter" placeholder="Email">
                        </div>
                    </div>
				 <!--phone-->
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="3">
                            <label>Contact No.</label>
                            <input type="phone" name="phone" class="form-control column_filter" id="col3_filter" placeholder="Phone number">
                        </div>
                    </div>
				 <!--Employee ID-->
					
					<!--status-->
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col1" data-column="4">
                            <label>Status</label>
                            <select name="status" class="form-control column_filter" id="col4_filter">
							<option value="">All</option>
									<option>Active</option>
                                    <option>Disabled</option>
                            </select>
                        </div>
                    </div>
            </div>
              
                </form>
				
                <div class="row mt-8">
                    <Button type="button" onclick="ClearFields();" class="btn btn-secondary">Reset</Button>
                </div>
				<a href="" class="p-4"> </a>
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="ex">
											<thead>
												<tr>
													<th>ID</th>
													<th>Society Name</th>
													<th>Society Email</th>
													<th>Society Phone</th>
													<th>Status</th>
													<th>Type</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
											@foreach($posts as $post)
												<tr>
													<td>{{ $post->id }}</td>
													<th>{{ $post->fname }}</th>
													<td>{{ $post->email1 }}</td>
													<td>{{ $post->phone1 }}</td>
													<td><span class="label label-lg font-weight-bold label-light-success label-inline">Active</span></td>
													<td><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">{{ $post->type }}</span></td>
													<td>
													<!--view-->
														<a href="{{ route('center', $post->id )}}" 
														class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="View">
														<i class="far fa-eye text-info"></i></a>
													</td>
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
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
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
		
		<script src="js/pages/crud/datatables/search-options/advanced-search.js?v=7.0.3"></script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="plugins/global/plugins.bundle.js?v=7.0.3"></script>
		<script src="plugins/custom/prismjs/prismjs.bundle.js?v=7.0.3"></script>
		<script src="js/scripts.bundle.js?v=7.0.3"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
	</body>
	<!--end::Body-->
</html>