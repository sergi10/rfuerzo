@extends('layout.default')
@section ('title')
	Editar Alumno
@stop
@section('content')
	<h2>Editar Alumno {{ $datos -> nombre}}:</h2>  
    @include('layout.errores') 
   {{-- <ul>
            @foreach($errors->all() as $error)
                <li class="caja_errores col-md-4">{!!  $error  !!}</li>
            @endforeach
    </ul> --}}
<br></br>
<div></div>

    {!! Form::model($datos, array('route' => array('alumno.update', $datos->id), 'method' => 'PUT')) !!}
    <div class="form-horizontal">
           <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('nombre', Input::old('nombre'), $attributes = $errors->has('nombre') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('apellidos', Input::old('apellidos'), $attributes = $errors->has('apellidos') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('mail', 'E-mail', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                {{-- <div class="col-sm-9 col-sm-offset-1  @if($errors->has('mail')) erroneo @endif"> --}}
                    {!! Form::email('mail', Input::old('mail'), $attributes = $errors->has('mail') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('user', 'User', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('user', Input::old('user'), $attributes = $errors->has('user') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('pass', 'Pass', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::password('pass', Input::old('pass'), $attributes = $errors->has('pass') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('nacimiento', 'Nacimiento', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                     {!! Form::date('nacimiento', '', array('id'=>'calendario'),$attributes = $errors->has('f-nac') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">           
                <div class="form-group col-md-5">
                {!! Form::label('centro_id', 'Centro', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-9 col-sm-offset-1">
                        {!! Form::select('centro_id', $centros) !!}
                    </div>
                </div>    
                <div class="form-group col-md-5">
                {!! Form::label('profesor_id', 'Profesor', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-9 col-sm-offset-1">
                        {!! Form::select('profesor_id', $profesores) !!}
                    </div>
                </div>
            </div>
            @include('layout.enviar') 
        </div>
            
        {!!  Form::close()  !!} 

    @include('layout.zcalendar') 

@stop