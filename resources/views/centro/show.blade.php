@extends('layout.default')
@section ('title')
	Ver Centro
@stop
@section('content')
	<h2>Informacion del Centro:</h2>  
	<div class="jumbotron text-center">
		<h2>{{ $datos->nombre}}</h2>
		<p>
			<strong>Nombre: </strong>{{$datos->nombre}}<br>
			<strong>Dirección: </strong>{{$datos->direccion}}<br>
		</p>
	</div>
<div class="row">
	<strong>Profesores: </strong>
	<table id="profesores_centro" class="table table-striped table-bordered" cellspacing="6" width="35%">
			<thead>
                <th style="width: 55%">Nombre</th>
                <th style="width: 35%"></th>
                <th></th>
            </tr>
        </thead> 
        <tbody>	
			@foreach($datos->Profesores  as $profe)
			<tr>
        		<td>{!! $profe->nombre!!} {!! $profe->apellidos !!}</td>
        		<td><img src="../images/avatares/{!! $profe->enlace_avatar !!}" alt="{!! $profe->nombre !!}" class="img-responsive img-rounded" height="32" width="42"></img></td>
        		<td><a class="btn btn-small btn-success" href="{{ URL::to('profesor/' . $profe->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                </td>
        	</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="row col-md-2 pull-right">
    	<a class="btn btn-small btn-primary" href="{{ URL::to('profesor/create') }}"> 
		<i class="glyphicon glyphicon-plus"></i> Nuevo Profesor </a>
</div>
</br>    
<div class="row">
		<strong>Alumnos: </strong>
		 <table id="alumnos_centro" class="table table-striped table-bordered" cellspacing="6" width="35%">
			<thead>
                <th style="width: 55%">Nombre</th>
                <th style="width: 35%"></th>
                <th></th>
            </tr>
        </thead> 
        <tbody>	
			@foreach($datos->Alumnos  as $alumno)
			<tr>
        		<td>{!!$alumno->nombre !!} {!! $alumno->apellidos !!}</td>
        		<td><img src="../images/avatares/{!! $alumno->enlace_avatar !!}" alt="{!! $alumno->nombre !!}" class="img-responsive img-rounded" height="42" width="42"></img></td>
        		<td>
					<a class="btn btn-small btn-success" href="{{ URL::to('alumno/' . $alumno->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
        		</td>
        	</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="row col-md-2 pull-right">
    <a class="btn btn-small btn-primary" href="{{ URL::to('alumno/create') }}"> 
	<i class="glyphicon glyphicon-plus"></i> Nuevo Alumno </a>
</div>
</br> 
<div class="row col-md-2 pull-right">
	<a href="{!!  URL::to('centro') !!}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i></a>
</div>
@stop