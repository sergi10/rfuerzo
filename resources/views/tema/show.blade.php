@extends('layout.default')
@section ('title')
	Ver Tema
@stop
@section('content')
<script>
responsiveVoice.setDefaultVoice("Spanish Female");
</script>
	<h2>Informacion del Tema:</h2>  
	<div class="jumbotron text-justify">
		<h2><strong>{{ $datos -> titulo}} </strong></h2>
		<p>
		{{$datos->descripcion}}<br>
		</p>
		<button class="butt js--triggerAnimation" onclick="responsiveVoice.speak('{!! $datos -> titulo !!}, {!! $datos -> descripcion !!}');" type="button" value="Play"><i class="glyphicon glyphicon-volume-up "></i>Play</button>
	</div>
	<div class="row">
		<h2><strong>Tema:</strong></h2> 
<img src="../images/temas/{!! $datos -> enlace !!}" alt="{!! $datos -> titulo !!}" class="img-responsive img-rounded"  width="200">
</div>

<div class="row">
<h2><strong>Tareas: </strong></h2>
 <table id="tareas_tema" class="table table-striped table-bordered" cellspacing="6" width="75%">
			<thead>
			<tr>
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
				
				<a  href="{{ URL::to('../tarea/'. $tarea -> id)}}" class="default_popup"><i class=" btn btn-default glyphicon glyphicon-list-alt "></i></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>


<div class="row col-md-2 pull-right">
	<a class="btn btn-small btn-primary" href="{{ URL::to('tarea/create') }}"> 
	<i class="glyphicon glyphicon-plus"></i> Nueva Tarea </a>
</div>

<div class="row col-md-2 pull-right">	
	<a  href="{{ URL::to('tema') }}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i></a>
</div>
 <script>
 $('.default_popup').popup();
 </script>
@stop	
