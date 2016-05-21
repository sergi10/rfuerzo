@extends('layout.default')
@extends('layout.default')
@section ('title')
	Crear Tema
@stop
@section('content')
	<h2>Crear Tema:</h2>  
    {{-- protected $fillable = array('titulo', 'descripcion', 'enlace','enlace_imagen', 'profesor_id'); --}}
    @include('layout.errores') 

    {{-- <ul>
            @foreach($errors->all() as $error)
                <li>{!!  $error  !!}</li>
            @endforeach
        </ul>
     --}}
     <br></br>
<div></div>
    {!! Form::open(array('url' => 'tema', 'method' => 'post', 'files'=> true)) !!}
    <div class="form-horizontal">
            <div class="form-group">
            {!! Form::label('titulo', 'Titulo', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('titulo', Input::old('titulo'), $attributes = $errors->has('titulo') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('descripcion', Input::old('descripcion'), $attributes = $errors->has('descripcion') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             
            <div class="form-group">
            {!! Form::label('enlace', 'Imagen', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::file('enlace', Input::old('enlace'), $attributes = $errors->has('nombre') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('profesor_id', 'Profesor', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::select('profesor_id', $profesores) !!}
                </div>
            </div>
            @include('layout.enviar') 
    </div>
    {!!  Form::close()  !!} 
@stop