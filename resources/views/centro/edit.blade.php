@extends('layout.default')
@section ('title')
	Editar Centro
@stop
@section('content')
	<h2>Editar Centro {{ $datos -> nombre}}:</h2>  
    {!! Html::ul($errors -> all())  !!}
    <ul>
            @foreach($errors->all() as $error)
                <li>{!!  $error  !!}</li>
            @endforeach
        </ul>
        <br></br>
<div></div>
    {!! Form::model($datos, array('route' => array('centro.update', $datos->id), 'method' => 'PUT')) !!}
    <div class="for-horizontal">
            <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('nombre', Input::old('nombre'), $attributes = $errors->has('nombre') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('direccion', 'Dirección', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('direccion', Input::old('direccion'), $attributes = $errors->has('direccion') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
    
         <div class="form-group col-md-6 pull-right">  
                <div class="form-group col-md-3">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-small btn-primary']) !!}
                </div>
                <div class="form-group col-md-3">
                    <a href="{!!  URL::previous() !!}"><i class=" btn btn-small btn-default glyphicon glyphicon-backward"> Cancelar</i></a>
                </div>
            </div>
    </div>
    {!!  Form::close()  !!} 
@stop