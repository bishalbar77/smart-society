{{-- Header --}}
<div id="kt_header" class="header {{ Metronic::printClasses('header', false) }}" {{ Metronic::printAttrs('header') }}>

    {{-- Container --}}
    <div class="container-fluid d-flex align-items-center justify-content-between">
        @if (config('layout.header.self.display'))

            @php
                $kt_logo_image = 'logo-light.png';
            @endphp

            @if (config('layout.header.self.theme') === 'light')
                @php $kt_logo_image = 'logo-dark.png' @endphp
            @elseif (config('layout.header.self.theme') === 'dark')
                @php $kt_logo_image = 'logo-light.png' @endphp
            @endif

            {{-- Header Menu --}}
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                
            </div>

        @else
            <div></div>
        @endif

        @include('layout.partials.extras._topbar')
    </div>
</div>
