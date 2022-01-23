<!--Login Page is been divided into two... this is the top bar of the page which is common for all 
and the input box nd all are in auth folders-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>MySociety | Sign In</title>
		<meta name="description" content="Singin page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="css/pages/login/login-3.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="plugins/global/plugins.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="css/style.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="css/themes/layout/header/base/light.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="css/themes/layout/header/menu/light.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="css/themes/layout/brand/dark.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<link href="css/themes/layout/aside/dark.css?v=7.0.3" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="media/logos/favicon.ico" />
    
</head>

            @yield('content')
        

</html>
