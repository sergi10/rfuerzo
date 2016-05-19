



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
				<span class=" navbar-brand float-right" style="margin-left: 20em;">
					@if (Auth::check())
					<span class="float-right">{{Auth::user()->name}}</span>
						<a href="{{URL::to('auth/logout')}}">logout<i class="glyphicon glyphicon-log-out"></i></a>
					@else
						<a href="{{URL::to('auth/login')}}">login<i class="glyphicon glyphicon-user"></i></a>
					@endif
				</span>				        
				
			</div>		
		</div>
	</nav>