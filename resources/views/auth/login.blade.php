@extends('layout.default')
@section('title')
	Acceso
@stop

@section('content')
	@if (Input::old())
			<span class"erroneo"><h2>Error de validación</h2></span>
		
	@endif
    {!! Html::ul($errors -> all(),['class' => 'caja_errores col-md-4']) !!}
    <br></br>
<div></div>
    {!! Form::open(array('url' => 'auth/login', 'method' => 'POST')) !!}
    	<div class="form-horizontal col-md-9" >
            <div class="form-group col-md-6">
            {!! Form::label('usuario', 'Usuario', ['class' => 'col-sm-2 control-label glyphicon glyphicon-user ']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('usuario', Input::old('nombre'),$attributes = $errors->has('usuario') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>	
            <div class="form-group col-md-6">
            {!! Form::label('pass', 'Password', ['class' => 'col-sm-2 control-label glyphicon glyphicon-asterisk']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    
                    {!! Form::password('pass', Input::old('pass'),$attributes = $errors->has('pass') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
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
    	
    {!!  Form::close()  !!} 
@stop

<div>
<hr/>
@include('layout.footer')
<hr/>
</div>