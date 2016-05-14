<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{URL::to('/home')}}">Home</a>					
				<a class="navbar-brand" href="{{URL::to('/tema')}}">Temas</a>
				<a class="navbar-brand" href="{{URL::to('/tarea')}}">Tareas</a>	
				<a class="navbar-brand" href="{{URL::to('/notas')}}">Notas</a>
				<a class="navbar-brand" href="{{URL::to('/centro')}}">Centros</a>	
				<a class="navbar-brand" href="{{URL::to('/profesor')}}">Profesores</a>					
				<a class="navbar-brand" href="{{URL::to('/alumno')}}">Alumnos</a>
				{{-- <a class="navbar-brand" href="{{URL::to('/about')}}">About</a> --}}
			</div>		
		</div>
	</nav>