@extends('layout.default')
@section ('title')
	Ver Mapa
@stop
@section('content')
<script>
responsiveVoice.setDefaultVoice("Spanish Female");
</script>
	<h2>Informacion del Mapa:</h2>  
	<div class="jumbotron text-justify	">
		<h2><strong>{{ $datos -> titulo}} </strong></h2>
		{{-- protected $fillable = array('titulo', 'descripcion', 'imagen', 'audio', 'imagen', 'profesor_id'); --}}
		<p>
		{{$datos->descripcion}}<br>
		</p>
		<button class="butt js--triggerAnimation" onclick="responsiveVoice.speak('{!! $datos -> titulo !!}, {!! $datos -> descripcion !!}');" type="button" value="Play"><i class="glyphicon glyphicon-volume-up "></i>Play</button>
	</div>
	<div class="row">
			<h2><strong>Mapa:</h2> 
<img src="../images/mapas/{!! $datos -> enlace !!}" alt="{!! $datos -> titulo !!}" class="img-responsive img-rounded"  width="200"></img>
</div>
	{{-- <div class="row">
			<a href="http://translate.google.com/translate_tts?tl=es&q=prueba de lectura de texto&client"><i class="glyphicon glyphicon-volume-up ">audio:</i></a><br>
		</div> --}}

<div class="row">
<h2><strong>Tareas: </strong></h2>
 <table id="tareas_mapa" class="table table-striped table-bordered" cellspacing="6" width="75%">
			<thead>
                <th>Nombre</th>
                <th style="width: 30%">Descripcion</th>
                <th>Audio</th>
                <th>Realizar</th>
            </tr>
        </thead> 
        <tbody>
	@foreach($datos -> tareas  as $tarea)
		<tr>
			<td>{{ $tarea -> nombre}}</td>
			<td>{{ $tarea -> descripcion}}</td>
			<td><button class="butt js--triggerAnimation" onclick="responsiveVoice.speak('{!! $tarea -> nombre !!}, {!! $tarea -> descripcion !!}');" type="button" value="Play"><i class="glyphicon glyphicon-volume-up "></i></button></td>
			<td>
				{{-- <a  href="{{ URL::to('../tareas/'. $tarea -> enlace_imagen)}}" class="default_popup"><i class=" btn btn-default glyphicon glyphicon-list-alt "></i></a> --}}
				
				<a  href="{{ URL::to('../tarea/'. $tarea -> id)}}" class="default_popup"><i class=" btn btn-default glyphicon glyphicon-list-alt "></i></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>


{{-- <div class="row">
<a  href="{{ URL::to('../tareas/lengua_historia_separación_sílabas_paleolítico.htm?pw=600&amp;ph=450') }}" class="default_popup"><i class=" btn btn-default glyphicon glyphicon-list-alt "> Tarea HTML</i></a>
</div>
<div class="row">
<a  href="{{ URL::to('../tareas/lengua_historia_separación_sílabas_paleolítico.jqz?pw=600&amp;ph=450') }}" class="default_popup"><i class=" btn btn-default glyphicon glyphicon-th-list"> Tarea JQZ</i></a>
</div> --}}
<div class="row">
	<a class="btn btn-small btn-primary" href="{{ URL::to('tarea/create') }}"> 
	<i class="glyphicon glyphicon-plus"></i> Nueva Tarea </a>
	<a  href="{{ URL::to('mapa') }}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i></a>
</div>
<script>
$('.default_popup').popup();
</script>
@stop	
