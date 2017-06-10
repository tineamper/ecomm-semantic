<!DOCTYPE html>

<html>
	<head>
		<title>Product Catalog</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=yes">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="shortcut icon" type="image/png" href="{{URL::asset('customized/objects/Thumbnail.png')}}">
		

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('customized/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.css')}}">

		<!--JS-->
		<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/semantic.js') }}"></script>

		<!--DATATABLES-->
		<!--Data Table plugins and design-->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatable/dataTables.semanticui.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatable/responsive.semanticui.min.css')}}">

		<script type="text/javascript" src="{{ URL::asset('js/datatable/jquery.dataTables.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/dataTables.semanticui.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/dataTables.responsive.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/responsive.semanticui.min.js') }}"></script>

		<!--Smart Search-->
		<link href="{{ URL::asset('selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
		<script type="text/javascript" src='{{ URL::asset("selectize/js/standalone/selectize.min.js") }}'></script>


 
	    
	</head>

	<body>
		<div class='containerPC'>

			<div class='upperNav'>
				<img class='logo' src="customized/objects/Thumbnail.png">
				<a class='title' href="#!">SPORTS PRODUCT CATALOG</a>

				<ul class='links'>
					<li class="selected">
					<a class='linkStyle' id = "tab1" data-tab="home" onclick = "window.location='{{url('home')}}'">HOME</a></li>
					<li class="selected">
					<a class='linkStyle' id = "tab2" data-tab="category" onclick = "window.location='{{url('category')}}'">CATEGORY</a></li>
					<li class="selected">
					<a class='linkStyle' id = "tab3" data-tab="product" onclick = "window.location='{{url('product')}}'">PRODUCT</a></li>
				</ul>
			</div>
	

		<div class = "mainbody">
			
			@yield('bodysection')
			
		</div>

	</div>	

	</body>

</html>