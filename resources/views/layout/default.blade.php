<!doctype html>
<html>
<head>
	<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
 <title>@yield('title','RFuerzo')</title>
 
 	{!! Html::style('../assets/css/bootstrap.css') !!}
 	{!! Html::style('../assets/css/popup.css') !!}
 	{!! Html::style('../assets/css/jquey-ui.css') !!}
 	{{-- {!! Html::style('//code.jquery.com/ui/1.11.2/themes/smothness/jquey-ui.css') !!} --}}
 	{!! Html::script('../assets/js/jquery.popup.min.js') !!}
 	{!! Html::script('../assets/js/responsivevoice.js') !!}
 	{{-- {!! Html::script('../assets/js/jquery.popup.min.js') !!} --}}
 {{-- 	
 	<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquey-ui.css">
 --}}
 	<link rel="shortcut icon" href="../assets/img/index.jpeg">
</head>
<body>
<div class="container">
  <header> @include('layout.header') </header>
  <div class="contents"> @yield('content') </div>
  <footer> @include('layout.footer') </footer>
</div>
</body>
</html>
