@extends('layout.default')
@section ('title')
	Ver Alumno
@stop
@section('content')

	<h2>Informacion del Alumno:
	{{-- {{$lvl = Auth::user()->level}} --}}
	</h2>  
	<div class="jumbotron text-center">
		<img src="../images/avatares/{!! $datos -> enlace_avatar !!}" alt="{!! $datos -> nombre !!}" class="img-responsive avatar img-circle" ></img>
		<div class="ranking">
			<span class="label label-default ranking_label">{{$datos->my_puntuacion()}}</span>
		</div>

		<h2><strong>{{ $datos->user }}</strong></h2>
		
		<ul class="perfil_alumno">
			<li><strong class="label label-default">Nombre: </strong><span>{{$datos->nombre}}</span></li>
			<li><strong class="label label-default">Apellidos: </strong><span>{{$datos->apellidos}}</span></li>
			<li><strong class="label label-default">E-mail: </strong><span>{{$datos->mail}}</span></li>
			<li><strong class="label label-default">Centro: </strong><span>{{$datos->my_centro()}}</span></li>
			<li><strong class="label label-default">Profesor: </strong><span>{{$datos->my_profesor()}}</span></li>
		</ul>
	</div>
	<h2><strong>Notas: </strong></h2>
			
			 <table id="notas_alumnos" class="table table-striped table-bordered" cellspacing="6" width="75%">
			<thead>
                <th style="width: 35%">Tema</th>
                <th style="width: 45%">Tarea</th>
                <th>Nota</th>
            </tr>
        </thead> 
        <tbody>	
			@foreach($datos->my_notas()  as $nota)
			<tr>
        		<td>{!! $nota->my_tarea()->my_tema()->titulo !!}</td>
        		<td>{!! $nota->my_tarea()->nombre !!}</td>
        		<td>{!! $nota->nota !!}</td>
        		
        	</tr>        	
			@endforeach
			<tr>
				<td></td>
				<td><strong>Total: </strong></td>
        		<td><strong>{!! $datos->my_puntuacion()!!}</strong></td>
        	</tr>
		</tbody>
	</table>
			

@if (Auth::es_admin())
<div class="row col-md-2 pull-right">
	<a href="{!!  URL::to('alumno') !!}">
		<i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i>
	</a>
</div>
@endif
<a href="{!!  URL::previous() !!}">
		<i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i>
</a>
@stop