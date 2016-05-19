



<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				@if (Auth::guest())
					<a class="navbar-brand" href="{{URL::to('/home')}}">Home</a>
				@endif					
				
				@if (Auth::level() > 0)
					<a class="navbar-brand" href="{{URL::to('/notas')}}">Notas</a>
					<a class="navbar-brand" href="{{URL::to('/tema')}}">Temas</a>
				@endif
				<a class="navbar-brand" href="{{URL::to('/tarea')}}">Tareas</a>
				@if (Auth::es_admin()) 
				<a class="navbar-brand" href="{{URL::to('/centro')}}">Centros</a>	
				<a class="navbar-brand" href="{{URL::to('/profesor')}}">Profesores</a>					
				<a class="navbar-brand" href="{{URL::to('/alumno')}}">Alumnos</a>
				@endif
				<a class="navbar-brand" href="{{URL::to('/about')}}">About</a>
				<span class="float-right" style="margin-left: 20em;">
					@if (Auth::check())
						<a class="navbar-brand glyphicon glyphicon-log-out float-right" href="{{URL::to('auth/logout')}}">logout</a>
					@else
						<a class="navbar-brand glyphicon glyphicon-user float-right" href="{{URL::to('auth/login')}}">login</a>
					@endif
				</span>				        
				
			</div>		
		</div>
	</nav>