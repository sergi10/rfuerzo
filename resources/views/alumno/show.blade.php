@extends('layout.default')
@section ('title')
	Ver Alumno
@stop
@section('content')

	<h2>Informacion del Alumno:</h2>  
	<div class="jumbotron text-center">
		<h2><strong>{{ $datos -> nombre }}</strong></h2>
		<h2><strong>Avatar: </strong></h2>
		<img src="../images/avatares/{!! $datos -> enlace_avatar !!}" alt="{!! $datos -> nombre !!}" class="img-responsive img-rounded" width="100"></img><br>
		{{-- 'id','nombre','apellidos','mail','user','pass','avatar', 'f-nac', 'centro_id' --}}
		<p style="display: inline-block;">
			<strong>Nombre: </strong>{{$datos -> nombre}}<br>
			<strong>Apellidos: </strong>{{$datos -> apellidos}}<br>
			<strong>E-mail: </strong>{{$datos -> mail}}<br>
			<strong>Centro: </strong>{{$datos -> my_centro()}}<br>
			<strong>Profesor: </strong>{{$datos -> my_profesor()}}<br>
			</p>
	</div>
	<h2><strong>Notas: </strong></h2>

			{{-- <strong>Notas: </strong>{{$datos -> my_notas()}}<br> --}}
			 <table id="notas_alumnos" class="table table-striped table-bordered" cellspacing="6" width="75%">
			 <p hidden>{{ $puntuacion = 0}}</p>
			<thead>
                <th>Mapa</th>
                <th style="width: 30%">Tarea</th>
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
        	{{-- @foreach($datos as $key => $value) --}}
        		{{-- <td>{!! $value->tarea_id !!}</td> --}}
                {{-- <td>{!! $value->tarea_id !!}</td> --}}
                {{-- <td>{!! $value->nota !!}</td> --}}
				{{-- {{$nota->tarea_id}}  {{$nota->nota}}<br> --}}
			@endforeach
			<tr>
				<td></td>
				<td><strong>Total: </strong></td>
        		<td><strong>{!! $puntuacion !!}</strong></td>
        	</tr>
		</tbody>
	</table>
			{{-- <strong>imagen: </strong>{{$datos -> enlace_avatar}}<br> --}}


<div class="row">
<a href="{!!  URL::to('alumno') !!}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i></a>
</div>
@stop