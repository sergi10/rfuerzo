<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Proyecto fin de ciclo CEED 2016">
		<meta name="author" content="Sergi Estada">
		<title>@yield('title','RFuerzo')</title>

	 	{!! Html::script('../assets/js/jquery.popup.min.js') !!}
	 	{!! Html::script('../assets/js/jquery-1.12.3.js') !!}
	 	{!! Html::script('../assets/js/jquery-ui.js') !!}
	 	{!! Html::script('../assets/js/responsivevoice.js') !!}
	 	{!! Html::script('../assets/js/zebra_datepicker.js') !!}
	 
	 	{!! Html::style('../assets/css/bootstrap.css') !!}
	 	{!! Html::style('../assets/css/popup.css') !!}
	 	{!! Html::style('../assets/css/jquey-ui.css') !!}
	 	{!! Html::style('../assets/css/default.css') !!}
	 	{!! Html::style('../assets/css/rfuerzo.css') !!}

	 	<link rel="shortcut icon" href="../assets/img/index.jpeg">
	</head>
	<body>
		<div class="container">
		  <header> @include('layout.header') </header>
		  <div class="contents" style='margin-top: 4em; margitn-bottom: 4em;'> @yield('content') </div>
		  <footer> @include('layout.footer') </footer>
		</div>
	</body>
</html>
