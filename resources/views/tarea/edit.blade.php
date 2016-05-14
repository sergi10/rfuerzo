@extends('layout.default')
@section ('title')
	Editar Tarea 
@stop
@section('content')
	<h2>Editar Tarea  {{ $datos -> nombre}}:</h2>  
    {!! Html::ul($errors -> all())  !!}
    <ul>
            @foreach($errors->all() as $error)
                <li>{!!  $error  !!}</li>
            @endforeach
        </ul>
    {!! Form::model($datos, array('route' => array('tarea.update', $datos->id), 'method' => 'PUT')) !!}
    <div class="for-horizontal">
        
        {{-- ('nombre', 'descripcion', 'file', 'audio', 'mapa_id') --}}


        <div class="form-group">
            {!! Form::label('nombre', 'Titulo', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('descripcion', Input::old('descripcion'), ['class' => 'form-control']) !!}
                </div>
            </div>
             
            <div class="form-group">
            {!! Form::label('file', 'File', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::file('file', Input::old('file'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <br>
            <div class="form-group">
            {!! Form::label('mapa_id', 'Mapa', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9  col-9 col-sm-offset-1">
                    {!! Form::select('mapa_id', $mapas) !!}
                </div>
            </div>    
        <div class="row">
            {!! Form::submit('Guardar', ['class' => 'btn btn-small btn-primary']) !!}
           <a href="{!!  URL::previous() !!}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Cancelar</i></a>
		</div>
    </div>
    {!!  Form::close()  !!} 
@stop