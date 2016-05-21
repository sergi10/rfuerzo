@extends('layout.default')
@section('title')
	Acceso
@stop
@section('content')
	@if (Input::old())
			<div class"col-md-offset-4"><h2>Error de validación</h2></div>		
	@endif
    @include('layout.errores') 
    <br></br>
    
    {!! Form::open(array('url' => 'auth/login', 'method' => 'POST')) !!}
    <div>
        <div class="row">
            <div class="col-md-offset-4 col-md-4 ">
                <div class="form-login">
                    <h4>Formulario de acceso</h4>
                    {!! Form::label('usuario', 'Usuario', ['class' => 'label-control ']) !!}
                        <div class="">
                            {!! Form::text('usuario', '',$attributes = $errors->has('usuario') ? array('class' => 'form-control erroneo'):array('class' => 'form-control input-sm chat-input','placeholder'=>'User Name')) !!}
                        </div>
                    </br>
                    {!! Form::label('pass', 'Password', ['class' => 'label-control']) !!}
                        <div class="">                    
                            {!! Form::password('pass', '',$attributes = $errors->has('pass') ? array('class' => 'form-control erroneo'):array('class' => 'form-control input-sm chat-input','placeholder'=>'password')) !!}
                        </div>
                
                    </br>
                    <div class="wrapper">
                        <span class="group-btn"> 
                        {!! Form::submit('Acceder', ['class' => 'btn  btn-primary btn-md glyphicon glyphicon-user']) !!} 
                        </span>
                    </div>
                </div>            
            </div>
        </div>
    </div>  
    {!!  Form::close()  !!} 
@stop
