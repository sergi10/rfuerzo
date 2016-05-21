@extends('layout.default')
@section ('title')
	Editar Mapa
@stop
@section('content')
	<h2>Editar Mapa {{ $datos -> nombre}}:</h2>  
    {!! Html::ul($errors -> all())  !!}
    <ul>
            @foreach($errors->all() as $error)
                <li>{!!  $error  !!}</li>
            @endforeach
        </ul>
    {!! Form::model($datos, array('route' => array('mapa.update', $datos->id), 'method' => 'PUT')) !!}
    <div class="form-horizontal">
        
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
            {!! Form::label('imagen', 'imagen', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::file('imagen', Input::old('imagen'), ['class' => 'form-control']) !!}
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