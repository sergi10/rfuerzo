@extends('layout.default')
@section ('title')
	Editar Tema
@stop
@section('content')
	<h2>Editar Tema {{ $datos -> nombre}}:</h2>  
    {{-- protected $fillable = array('titulo', 'descripcion', 'enlace','enlace_imagen', 'profesor_id'); --}}
  {!! Html::ul($errors -> all(),['class' => 'caja_errores col-md-4']) !!}
   {{-- <ul>
            @foreach($errors->all() as $error)
                <li class="caja_errores col-md-4">{!!  $error  !!}</li>
            @endforeach
    </ul> --}}
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
            <div class="form-group">
            {!! Form::label('profesor_id', 'Profesor', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::select('profesor_id', $profesores) !!}
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