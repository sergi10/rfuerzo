@extends('layout.default')
@section ('title')
	Crear Tarea
@stop
@section('content')
	<h2>Crear Tarea:</h2>  
    
    {{-- 'nombre', 'descripcion', 'file', 'audio', 'enlace_imagen_imagen', 'enlace_imagen_audio', 'tema_id' --}}

    @include('layout.errores') 
{{--     
    <ul>
            @foreach($errors->all() as $error)
                <li class="caja_errores col-md-9">{!!  $error  !!}</li>
            @endforeach
     </ul> 
--}}
    {!! Form::open(array('url' => 'tarea', 'method' => 'post', 'files'=> true)) !!}
    <div class="form-horizontal">
            <div class="form-group">
            {!! Form::label('nombre', 'Titulo', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('nombre', Input::old('nombre'), $attributes = $errors->has('nombre') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::textarea('descripcion', Input::old('descripcion'), $attributes = $errors->has('nombre') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>             
            <div class="form-group">
            {!! Form::label('file', 'File', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::file('file', Input::old('file'), $attributes = $errors->has('file') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
        </br>
            <div class="form-group">
            {!! Form::label('tema_id', 'tema', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::select('tema_id', $temas) !!}
                </div>
            </div>
            @include('layout.enviar') 
    </div>
    {!!  Form::close()  !!} 

@stop