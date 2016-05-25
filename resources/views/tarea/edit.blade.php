@extends('layout.default')
@section ('title')
	Editar Tarea 
@stop
@section('content')
	<h2>Editar Tarea  {{ $datos -> nombre}}:</h2>  

    @include('layout.errores') 

    {!! Form::model($datos, array('route' => array('tarea.update', $datos->id), 'method' => 'PUT')) !!}
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
                    {!! Form::textarea('descripcion', Input::old('descripcion'), $attributes = $errors->has('descripcion') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>             
            <br>            
       @include('layout.enviar') 
    </div>
    {!!  Form::close()  !!} 
@stop