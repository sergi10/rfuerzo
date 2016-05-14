@extends('layout.default')
@section('title')
	ALumnos
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Alumnos</div>

				<div class="panel-body">
					Listado de Alumnos
				</div>
			</div>
		</div>
	</div>
</div>
	
@stop
<div>
<hr/>
@include('layout.footer')
<hr/>
</div>