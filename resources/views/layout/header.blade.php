



<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand"href="{{URL::to('/home')}}"> RFuerzo </a>
				
				<ul class="nav navbar-nav">
					@if (Auth::guest())
						<li><a class="navbar-brand" href="{{URL::to('/home')}}">Home</a></li>
					@endif					
					
					@if (Auth::level() > 0)
						<li><a class="navbar-brand" href="{{URL::to('/notas')}}">Notas</a></li>
						<li><a class="navbar-brand" href="{{URL::to('/tema')}}">Temas</a></li>
					@endif
					<li><a class="navbar-brand" href="{{URL::to('/tarea')}}">Tareas</a></li>
					@if (Auth::es_admin()) 
					<li><a class="navbar-brand" href="{{URL::to('/centro')}}">Centros</a></li>	
					<li><a class="navbar-brand" href="{{URL::to('/profesor')}}">Profesores</a></li>					
					<li><a class="navbar-brand" href="{{URL::to('/alumno')}}">Alumnos</a></li>
					@endif
					<li><a class="navbar-brand" href="{{URL::to('/about')}}">About</a></li>
				</ul>
			</div>
				<ul class="nav navbar-nav navbar-right">

					@if (Auth::check())
						<li> 
							<span  class="nombre_login">{{Auth::user()->name}}</span>
						</li>
						<li>
							@if (Auth::es_admin())
								<a href="{{URL::to('profesor/'.Auth::get_owner())}}" class="label label-danger">Administrador</a>
							@endif
							@if (Auth::level() == 1)
								<a href="{{URL::to('profesor/'.Auth::get_owner())}}" class="label label-info">Profesor</a>
							@endif
						</li>
						<li><a href="{{URL::to('auth/logout')}}" class="link_login">logout<i class=" glyphicon glyphicon-log-out"></i></a></li>
					@else
						<li><a href="{{URL::to('auth/login')}}" class="link_login">login<i class="glyphicon glyphicon-user"></i></a></li>
					@endif
				</ul>	  
			
		</div>