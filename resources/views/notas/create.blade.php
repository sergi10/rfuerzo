@extends('layout.default')
@section ('title')
	Crear Notas
@stop
@section('content')
	<h2>Crear Nota:</h2>  
    {{-- // alumno_id, tarea_id, nota, activa --}}
    <ul>
            @foreach($errors->all() as $error)
                <li>{!!  $error  !!}</li>
            @endforeach
        </ul>
    {!! Form::open(array('url' => 'notas', 'method' => 'post')) !!}
    <div class="for-horizontal">
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
                    {!! Form::number('nota', Input::old('nota'), ['class' => 'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('activa', 'activa', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::checkbox('activa', Input::old('activa'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
            {!! Form::submit('Guardar', ['class' => 'btn btn-small btn-primary']) !!}
            <a href="{!!  URL::previous() !!}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Cancelar</i></a>
        </div>
    </div>
    {!!  Form::close()  !!} 

@stop