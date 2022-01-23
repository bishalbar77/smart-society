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
											<h3 class="card-label">Permission Table
											<div class="text-muted pt-2 font-size-sm">All permissions are listed below</div></h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											<div class="dropdown dropdown-inline mr-2">
												<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-md">
													<!--begin::Svg Icon | path:media/svg/icons/Design/PenAndRuller.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
															<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>Export</button>
												<!--begin::Dropdown Menu-->
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													<!--begin::Navigation-->
													<ul class="navi flex-column navi-hover py-2">
														<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-print"></i>
																</span>
																<span class="navi-text">Print</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-copy"></i>
																</span>
																<span class="navi-text">Copy</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
																</span>
																<span class="navi-text">Excel</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-text-o"></i>
																</span>
																<span class="navi-text">CSV</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-pdf-o"></i>
																</span>
																<span class="navi-text">PDF</span>
															</a>
														</li>
													</ul>
													<!--end::Navigation-->
												</div>
												<!--end::Dropdown Menu-->
											</div>
											<!--end::Dropdown-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
			<div class="card">
		<div class="card-body">
            <form id="clear">
                <div class="row">
                  <!--ID-->
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
					<div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col0" data-column="4">
                            <label>Customer ID</label>
                            <input type="text" name="empid" class="form-control column_filter" id="col4_filter" placeholder="Customer ID">
                        </div>
                    </div>
                  
					<!--desig-->
				  <div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col1" data-column="5">
                            <label>Designation</label>
                            <select name="Designation" class="form-control column_filter" id="col5_filter">
							<option value="">All</option>
							<option>Manager</option>
							<option>Security</option>
							<option>Moderator</option>
							<option>Service Staff</option>
							<option>HR</option>
							<option>Sales Manager</option>
							<option>A/C manager</option>
							<option>Agent</option>
							<option>Admin</option>
                            </select>
                        </div>
                    </div>
					<!--status-->
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <div class="form-group" id="filter_col1" data-column="6">
                            <label>Status</label>
                            <select name="status" class="form-control column_filter" id="col6_filter">
							<option value="">All</option>
									<option>Active</option>
                                    <option>Disabled</option>
                            </select>
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
										<table class="table table-bordered table-hover table-checkable" id="ex">
										<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								
								<th>Type</th>
								<!-- <th scope="col">Role</th> -->
								<th scope="col" class="pl-15">Actions</th>
							</tr>
						</thead>
						<tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            
                            <td>
                                {{ $permission->id ?? '' }}
                            </td>
                            <td>
                                {{ $permission->title ?? '$permission->name' }}
                            </td>
							<td></td>
                            <td>
                                @can('permission_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('permissions.show', $permission->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('permission_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('permissions.edit', $permission->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('permission_delete')
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

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
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="js/pages/crud/datatables/search-options/advanced-search.js?v=7.0.3"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>