@extends('layout.default') @section ('title')     Ver Profesor @stop
@section('content')    
 	<h2>Informacion del Profesor:</h2> 
	{{-- {{$lvl = Auth::user()->level}} --}}
	
	<div class="jumbotron text-center">
		<img src="../images/avatares/{!! $datos->enlace_avatar !!}" alt="{!! $datos -> nombre !!}" class="img-responsive avatar img-circle" ></img>

		<h2><strong>{{ $datos->user }}</strong></h2>
		
		<ul class="perfil_alumno">
			<li><strong class="label label-default">Nombre: </strong><span>{{$datos->nombre}}</span></li>
			<li><strong class="label label-default">Apellidos: </strong><span>{{$datos->apellidos}}</span></li>
			<li><strong class="label label-default">E-mail: </strong><span>{{$datos->mail}}</span></li>
			<li><strong class="label label-default">Centro: </strong><span>{{$datos->my_centro()}}</span></li>
		</ul>
	</div>
	<div class="row">
		<h2><strong>Mis temas: </strong></h2>
			@foreach($datos->temas as $tema)
				<div class="col-md-4 col-sm-6">
					<div class="thumbnail" style="min-height: 40em">
						<a href="{{ URL::to('tema/' . $tema->id) }}"><img src="../images/temas/{!! $tema->enlace !!}" alt="{!! $tema->titulo !!}" class="img-responsive"  width="100"></img>
						</a>
						<div class="caption">
							<h3>{{ $tema->titulo }}<br></h3>
							<p>{{ $tema->descripcion }}<br></p>

							<p style="float:bottom"><a href="{{ URL::to('tema/' . $tema->id) }}" class="btn btn-primary" role="button">Ver</a></p>
						</div>
					</div>
				</div>
			@endforeach
		<div class="form-group col-md-6 pull-right">
			<div class="form-group col-md-3">
    			<a class="btn btn-small btn-primary" href="{{ URL::to('tema/create')}}"> <i class="glyphicon glyphicon-plus"></i> Nuevo Tema </a>
			</div>
		</div>
	</div>	
	<div class="row">
		<h2><strong>Mis alumnos: </strong></h2>
		 <table id="alumnos_profesor" class="table table-striped table-bordered" cellspacing="6" width="35%">
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
	<a  href="{{ URL::to('profesor') }}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i></a>
</div>
@stop