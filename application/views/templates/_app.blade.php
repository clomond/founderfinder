<!DOCTYPE HTML>
<html lang="en-GB">
<head>

	<meta charset="UTF-8">
	<title>{{ $viewName }}</title>
	@section('css')
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/style-backbone.css') }}
	{{ HTML::style('css/bootswatch.css') }}
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/vader/jquery-ui.css" />
	@yield_section
	
</head>
<body>
	<div id="wrapper">
		<div id="header-area" class="row-fluid header">

		</div>
	
		<div class="content">
			@yield('content')
		</div>

	</div>
	
	<!-- Java script libraries -->
	@section('js')
	{{ HTML::script('js/lib/jquery-1.8.1.min.js') }}
	{{ HTML::script('js/lib/underscore-min.js') }}
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	{{ HTML::script('js/lib/bootstrap.min.js') }}
	{{ HTML::script('js/lib/backbone-min.js') }}
	{{ HTML::script('js/backbone/base/base.js') }}
	@yield_section
	<!-- Javascript application -->
</body>
</html>