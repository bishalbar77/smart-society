
@extends('content')
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
		{{
		
		<link href="assets/css/themes/layout/header/base/light.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/header/menu/light.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/brand/dark.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/aside/dark.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
        <link rel="shortcut icon" href="https://keenthemes.com/metronic/themes/metronic/theme/html/demo1/dist/assets/media/logos/favicon.jpeg" />
	}}
		@yield('styles')
		@yield('divfile')
		<!--end::Main-->
		protected $hidden = [
        'password', 'remember_token',
    ];
	Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});