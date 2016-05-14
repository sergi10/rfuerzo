@extends('layout.default')
@extends('layout.default')
@section ('title')
	Crear Tema
@stop
@section('content')
	<h2>Crear Tema:</h2>  
    {{-- protected $fillable = array('titulo', 'descripcion', 'enlace','enlace_imagen', 'profesor_id'); --}}
    {!! Html::ul($errors -> all())  !!}
    <ul>
            @foreach($errors->all() as $error)
                <li>{!!  $error  !!}</li>
            @endforeach
        </ul>
    {!! Form::open(array('url' => 'tema', 'method' => 'post', 'files'=> true)) !!}
    <div class="for-horizontal">
            <div class="form-group">
            {!! Form::label('titulo', 'Titulo', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('titulo', Input::old('titulo'), ['class' => 'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('descripcion', Input::old('descripcion'), ['class' => 'form-control']) !!}
                </div>
            </div>
             
            <div class="form-group">
            {!! Form::label('enlace', 'Imagen', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::file('enlace', Input::old('enlace'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('profesor_id', 'Profesor', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::select('profesor_id', $profesores) !!}
                </div>
            </div>
            <div class="row">
            {!! Form::submit('Guardar', ['class' => 'btn btn-small btn-primary']) !!}
            <a href="{!!  URL::previous() !!}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Cancelar</i></a>
        </div>
    </div>
    {!!  Form::close()  !!} 

@stop