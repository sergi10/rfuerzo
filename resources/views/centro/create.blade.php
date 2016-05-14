@extends('layout.default')
@section ('title')
	Crear Centro
@stop
@section('content')
	<h2>Crear Centro:</h2>  
    {!! Html::ul($errors -> all())  !!}
    <ul>
            @foreach($errors->all() as $error)
                <li>{!!  $error  !!}</li>
            @endforeach
        </ul>
    {!! Form::open(array('url' => 'centro')) !!}
    <div class="for-horizontal">
            <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('direccion', 'Dirección', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('direccion', Input::old('direccion'), ['class' => 'form-control']) !!}
                </div>
            </div>
    
        <div class="row">
            {!! Form::submit('Guardar', ['class' => 'btn btn-small btn-primary']) !!}
            <a href="{!!  URL::previous() !!}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Cancelar</i></a>
        </div>
    </div>
    {!!  Form::close()  !!} 
@stop