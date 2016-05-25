@extends('layout.default')
@section ('title')
	Ver Tarea
@stop
@section('content')
<script>
responsiveVoice.setDefaultVoice("Spanish Female");
</script>
	<h2>Informacion de la Tarea:</h2>  
	<div class="jumbotron text-center">
		<h2>{{ $datos -> nombre}}</h2>
		<p>
			{{$datos -> descripcion}}<br>
		</p>
		<button class="butt js--triggerAnimation" onclick="responsiveVoice.speak('{!! $datos -> nombre !!}, {!! $datos -> descripcion !!}');" type="button" value="Play"><i class="glyphicon glyphicon-volume-up "></i>Play</button>
	</div>

	<div class="row">
		<a  href="{{ URL::to('../tareas/'. $datos->enlace_tarea)}}"><i class=" btn btn-default glyphicon glyphicon-list-alt "> {{ $datos -> nombre}}</i></a>
    @if (Auth::level() > 0)
		<a class="btn btn-small btn-primary" href="{{ URL::to('notas/create') }}"> 
			<i class="glyphicon glyphicon-plus"></i> Añadir Nota </a>
	@endif
		<div class="row col-md-2 pull-right">
			<a  href="{{ URL::to('tarea') }}"<i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i></a>
		</div>
    </div>
@stop