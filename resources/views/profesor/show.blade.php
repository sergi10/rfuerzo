@extends('layout.default') @section ('title')     Ver Profesor @stop
@section('content')    
 <h2>Informacion del Profesor:</h2>      
  <div class="jumbotron text-center">       
	<h2><strong>{{ $datos -> nombre }}</strong></h2>  
	<h2>{{ $datos -> nombre}}</h2>
{{-- 'id','nombre','apellidos','mail','user','pass','avatar', 'f-nac',
'centro_id' --}}         
<p>             
	<strong>Avatar: </strong>{{$datos ->
avatar}}<br>             
<strong>Nombre: </strong>{{$datos -> nombre}}<br>
<strong>Apellidos: </strong>{{$datos -> apellidos}}<br>        
 <img src="../images/avatares/{!! $datos -> enlace_avatar !!}" alt="{!! $datos ->
nombre !!}" class="img-responsive img-rounded"></img></p>         
<p style="display: inline-block;">
<strong>E-mail: </strong>{{$datos -> mail}}<br>

		<strong>Centro: </strong>{{$centro -> nombre}}<br>
		<p hidden>{{ $profe_id = $datos->id}} </p>
		</p>
	</div>
	<div class="row">
		<h2><strong>Mis temas: </strong></h2>
			@foreach($datos->temas as $tema)
				<div class="col-md-4 col-sm-6">
					<div class="thumbnail" style="min-height: 40em">
						<a href="{{ URL::to('tema/' . $tema->id) }}"><img src="../images/temas/{!! $tema -> enlace !!}" alt="{!! $tema -> titulo !!}" class="img-responsive"  width="100"></img>
						</a>
						<div class="caption">
							<h3>{{ $tema -> titulo }}<br></h3>
							<p>{{ $tema -> descripcion }}<br></p>

							<p style="float:bottom"><a href="{{ URL::to('tema/' . $tema->id) }}" class="btn btn-primary" role="button">Ver</a></p>
						</div>
					</div>
				</div>
				{{-- <img src="../images/avatares/{!! $datos -> enlace_avatar !!}" alt="{!! $datos -> nombre !!}" class="img-responsive img-rounded"></img> --}}
			@endforeach
	</div>	
	<div class="row col-md-2 pull-right">
    <a class="btn btn-small btn-primary" href="{{ URL::to('mapa/create')}}"> <i class="glyphicon glyphicon-plus"></i> Nuevo Tema </a>

	{{-- <a href="{{ route('mapa.create', array('profe_id' => $datos->id)) }}">click here</a>
    <a class="btn btn-small btn-primary" href="{{ URL::to('mapa/create{'.$datos->id.'}')}}"><i class="glyphicon glyphicon-plus"></i> Nuevo Mapa </a>
    <p>
    	{{ link_to_route('mapa.create.profe', 'Mapa con Profe Id', [$datos->id]) }}
    </p> --}}

</div>
<div class="row col-md-2 pull-right">
<a  href="{{ URL::to('profesor') }}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Volver</i></a>
</div>
@stop