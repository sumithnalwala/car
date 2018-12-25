<!DOCTYPE html>
<html>
<head>
	  <!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" >
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('vendors/styles/style.css')}}">
    <!-- custome css-->
    @yield('custome_css')

</head>
<body>
	@include('dashboard.header')
	@include('dashboard.sidebar')
     
    @yield('container')
	<script src="{{asset('vendors/scripts/script.js')}}"></script>
	<script type="text/javascript">
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	</script>
	@yield('custome_js')
</body>
</html> 