



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
				<a class="navbar-brand" href="{{URL::to('/tema')}}">Temas</a>
				<a class="navbar-brand" href="{{URL::to('/tarea')}}">Tareas</a>
				<a class="glyphicon glyphicon-user navbar-brand float-right" href="{{URL::to('auth/login')}}" style="margin-left: 20em;">login</a>	
				  @else
				<a class="navbar-brand" href="{{URL::to('/notas')}}">Notas</a>
				<a class="navbar-brand" href="{{URL::to('/centro')}}">Centros</a>	
				<a class="navbar-brand" href="{{URL::to('/profesor')}}">Profesores</a>					
				<a class="navbar-brand" href="{{URL::to('/alumno')}}">Alumnos</a>
				{{-- <a class="glyphicon glyphicon-user navbar-brand float-right" href="{{URL::to('auth/login')}}" style="margin-left: 20em;">login</a> --}}
				{{-- <a class="navbar-brand" href="{{URL::to('/about')}}">About</a> --}}
				<span class="float-right" style="margin-left: 20em;">
					@if (Auth::check())
						{{Auth::user()->name}} {{Html::link('auth/logout','Salir')}}
						<a class="navbar-brand glyphicon glyphicon-log-out float-right" href="{{URL::to('auth/logout')}}">logout</a>
					@endif              
				</span>
				@endif         
			</div>		
		</div>
	</nav>