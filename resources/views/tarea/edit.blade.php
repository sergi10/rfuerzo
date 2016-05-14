@extends('layout.default')
@section ('title')
	Editar Tarea 
@stop
@section('content')
	<h2>Editar Tarea  {{ $datos -> nombre}}:</h2>  
    {!! Html::ul($errors -> all(),['class' => 'caja_errores col-md-4']) !!}
{{--     
    <ul>
            @foreach($errors->all() as $error)
                <li class="caja_errores col-md-9">{!!  $error  !!}</li>
            @endforeach
     </ul> 
--}}
    {!! Form::model($datos, array('route' => array('tarea.update', $datos->id), 'method' => 'PUT')) !!}
    <div class="form-horizontal">
        
        {{-- ('nombre', 'descripcion', 'file', 'audio', 'tema_id') --}}


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
             
            <div class="form-group">
            {!! Form::label('file', 'Archivo', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::file('file', Input::old('file'), $attributes = $errors->has('file') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
            <br>
            <div class="form-group ">
            {!! Form::label('tema_id', 'Tema', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9  col-9 col-sm-offset-1">
                    {!! Form::select('tema_id', $temas) !!}
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