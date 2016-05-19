@extends('layout.default')
@section ('title')
	Ver Alumno
@stop
@section('content')

	<h2>Informacion del Alumno:
	{{$lvl = Auth::user()->level}}
	</h2>  
	<div class="jumbotron text-center">
		<h2><strong>{{ $datos -> nombre }}</strong></h2>
		<h2><strong>Avatar: </strong></h2>
		<img src="../images/avatares/{!! $datos -> enlace_avatar !!}" alt="{!! $datos -> nombre !!}" class="img-responsive img-rounded" width="100"></img><br>
		<p style="display: inline-block;">
			<strong>Nombre: </strong>{{$datos -> nombre}}<br>
			<strong>Apellidos: </strong>{{$datos -> apellidos}}<br>
			<strong>E-mail: </strong>{{$datos -> mail}}<br>
			<strong>Centro: </strong>{{$datos -> my_centro()}}<br>
			<strong>Profesor: </strong>{{$datos -> my_profesor()}}<br>
			</p>
	</div>
	<h2><strong>Notas: </strong></h2>
			
			 <table id="notas_alumnos" class="table table-striped table-bordered" cellspacing="6" width="75%">
			 <p hidden>{{ $puntuacion = 0}}</p>
			<thead>
                <th style="width: 35%">Tema</th>
                <th style="width: 45%">Tarea</th>
                <th>nota</th>
            </tr>
        </thead> 
        <tbody>	
			@foreach($datos -> my_notas()  as $nota)
			<tr>
        		<td>{!! $nota->alumno_id !!}</td>
        		<td>{!! $nota->tarea_id !!}</td>
        		<td>{!! $nota->nota !!}</td>
        		<p hidden>{{ $puntuacion += $nota->nota}}</p>
        	</tr>        	
			@endforeach
			<tr>
				<td></td>
				<td><strong>Total: </strong></td>
        		<td><strong>{!! $puntuacion !!}</strong></td>
        	</tr>
		</tbody>
	</table>
			


<div class="row col-md-2 pull-right">
	<a href="{!!  URL::to('alumno') !!}">
		<i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i>
	</a>
</div>
@stop