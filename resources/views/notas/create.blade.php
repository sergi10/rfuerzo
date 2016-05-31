@extends('layout.default')
@section ('title')
	Crear Notas
@stop
@section('content')
	<h2>Crear Nota:</h2>  
    @include('layout.errores') 

   
    {!! Form::open(array('url' => 'notas', 'method' => 'post')) !!}
    <div class="form-horizontal">
        <div class="form-group">
            {!! Form::label('alumno_id', 'Alumno', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9 col-sm-offset-1">
                {!! Form::select('alumno_id', $alumnos,  Input::old('alumno_id'), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('tarea_id', 'Tarea', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9 col-sm-offset-1">
                {!! Form::select('tarea_id', $tareas, Input::old('tarea_id'), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
        {!! Form::label('nota', 'Nota', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9 col-sm-offset-1">
                {!! Form::number('nota', Input::old('nota'), ['step'=>'0.05', 'minmax' => '0|10','class' => 'form-control']) !!}
            </div>
        </div>
         <div class="form-group">
        {!! Form::label('activa', 'activa', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-9 col-sm-offset-1">
                {!! Form::checkbox('activa', Input::old('activa'), ['class' => 'form-control']) !!}
            </div>
        </div>
        @include('layout.enviar') 
    </div>
    {!!  Form::close()  !!} 

@stop