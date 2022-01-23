{{-- Aside --}}

@php
    $kt_logo_image = 'society-logo.png';
@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'logo-dark.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'society-logo.png' @endphp
@endif

<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                </a>
            </div>
        @endif

        <div
            id="kt_aside_menu"
            class="nav flex-column aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1" 
            {{ Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav">
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="/" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fa fa-bars text-primary"></i>
                        </span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                @if(Auth::user()->id==1)
                <li class="menu-item" aria-haspopup="true">
                    <a href="/admin/users" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-user-tie text-info"></i>
                        </span>
                        <span class="menu-text">User Management</span>
                    </a>
                </li> 
                <li class="menu-item" aria-haspopup="true">
                    <a href="/admin/society" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-user text-danger"></i>
                        </span>
                        <span class="menu-text">Society Admins</span>
                    </a>
                </li> 
                @endif
                {{-- @can('user_access')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fas fa-user-tie text-info"></i>
                        </span>
                        <span class="menu-text">User Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/admin/society/users" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Manage Users</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/managercreate" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                @endcan --}}
                @can('staff_access')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fas fa-users text-danger"></i>
                        </span>
                        <span class="menu-text">Staff Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/admin/society/staff" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Manage Staffs</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/staffcreate" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create Staff</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @can('visitor_access')
                <li class="menu-item" aria-haspopup="true">
                    <a href="/visitor" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fa fa-user-circle text-success"></i>
                        </span>
                        <span class="menu-text">Visitor</span>
                    </a>
                </li> 
                
                @endcan
                @can('complain_access')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fas fa-ticket-alt text-warning"></i>
                        </span>
                        <span class="menu-text">Grievance</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/ticket" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Manage Grievances</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/addticket" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create Ticket</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @can('vehicle_access')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fas fa-car-side text-info"></i>
                        </span>
                        <span class="menu-text">Vehicle Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/admin/vehicle" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Manage Vehicles</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/admin/vehicle/create" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create Vehicle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> 
                @endcan
                @can('hospitality_access')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fa fa-bed text-primary"></i>
                        </span>
                        <span class="menu-text">Hospitality Packages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/memberpack" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Manage Rooms</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/hospitality" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create New Hospitality</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @can('residents_access')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fas fa-user-tie text-success"></i>
                        </span>
                        <span class="menu-text">Residents</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/residents" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Manage Residents</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/addowner" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create New Owners</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/addtenant" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create New Tenant</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> 
                
                @endcan
                @if(Auth::user()->id==1)
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fas fa-users text-warning"></i>
                        </span>
                        <span class="menu-text">Society</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/servicecentres/show" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Manage Society</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/societycreate" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create Society</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                
                @can('residents_access')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <i class="fas fa-cogs text-danger"></i>
                        </span>
                        <span class="menu-text">Roles & Permission</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/roles" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Manage Roles</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/roles/create" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Create New Roles</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> 
                @endcan
                @can('reports_access')
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fas fa-money-check-alt text-warning"></i>
                        </span>
                        <span class="menu-text">Reports</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/pay" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Society Debit</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/accept" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Society Credit</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/receipts" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Credit Receipts</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/debit/receipts" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Debit Receipts</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/audit" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Audit</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @can('account_access')
                <li class="menu-item" aria-haspopup="true">
                    <a href="/setup" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fa fa-sliders-h text-success"></i>
                        </span>
                        <span class="menu-text">Account Setup</span>
                    </a>
                </li> 
                @endcan
                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                        <i class="fas fa-wrench text-info"></i>
                        </span>
                        <span class="menu-text">Setup</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/changePassword" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Change Password</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/ajax" class="menu-link" >
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">User Datatable</span>
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> 
            </ul>
        </div>
    </div>

</div>
