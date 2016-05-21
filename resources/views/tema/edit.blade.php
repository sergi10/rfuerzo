@extends('layout.default')
@section ('title')
	Editar Tema
@stop
@section('content')
	<h2>Editar Tema {{ $datos -> nombre}}:</h2>  
  @include('layout.errores') 
   
    {!! Form::model($datos, array('route' => array('tema.update', $datos->id), 'method' => 'PUT')) !!}
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
                    {!! Form::file('enlace', Input::old('enlace'), $attributes = $errors->has('enlace') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>      
        @include('layout.enviar') 
    </div>
    {!!  Form::close()  !!} 
@stop