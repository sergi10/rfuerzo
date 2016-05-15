@extends('layout.default')
@section('title')
	Acceso
@stop

@section('content')
	@if (Input::old()){
			<span class"erroneo"><h2>Error de validación</h2></span>
		}
	@endif
    <h1> OLD LOGIN PAGE</h1>
{{-- 	{!! Form::open(array('url' => 'login')) !!}
    	<div class="form-horizontal">
            <div class="form-group">
            {!! Form::label('usuario', 'Usuario', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('usuario', Input::old('nombre'),array('class' => 'form-control')) !!}
                </div>
            </div>	
            <div class="form-group">
            {!! Form::label('pass', 'Password', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::password('pass', Input::old('pass'),array('class' => 'form-control')) !!}
                </div>
            </div>	
            <div class="form-group col-md-6 pull-right">
                 <div class="form-group col-md-3">
                    {!! Form::submit('Acceder', ['class' => 'btn btn-small btn-primary']) !!}
                </div>
                 <div class="form-group col-md-3">
                    <a href="{!!  URL::previous() !!}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Cancelar</i></a>
                </div>
            </div>
    	</div>
    {!!  Form::close()  !!}  --}}
@stop

<div>
<hr/>
@include('layout.footer')
<hr/>
</div>