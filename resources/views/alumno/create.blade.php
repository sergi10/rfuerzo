@extends('layout.default')
@section ('title')
	Crear Alumno
@stop
@section('content')
	<h2>Crear Alumno:</h2>  
    {{-- 'id','nombre','apellidos','mail','user','pass','avatar', 'f-nac', 'centro_id' --}}
    {!! Html::ul($errors -> all())  !!}
    <ul>
            @foreach($errors->all() as $error)
                <li>{!!  $error  !!}</li>
            @endforeach
        </ul>
    {!! Form::open(array('url' => 'alumno', 'method' => 'post', 'files'=> true)) !!}
    <div class="for-horizontal">
            <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('apellidos', Input::old('apellidos'), ['class' => 'form-control']) !!}
                </div>
            </div>
         <div class="form-group">
            {!! Form::label('mail', 'E-mail', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::email('mail', Input::old('mail'), ['class' => 'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('user', 'User', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('user', Input::old('user'), ['class' => 'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('pass', 'Pass', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::password('pass', Input::old('pass'), ['class' => 'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('nacimiento', 'Nacimiento', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::date('f-nac', \Carbon\Carbon::now(),['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('nacimiento_JQ', 'Nacimiento', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1" id='calendario2'>
                    {!! Form::date('f-nac', '', array('id'=>'calendario'),['class' => 'form-control']) !!}
                </div>
            </div>
           {{--  {!! Form::text('f-nac', '', array('id'=>'calendario')) !!} --}}
             <div class="form-group">
            {!! Form::label('centro_id', 'Centro', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::select('centro_id', $centros) !!}
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
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript">
$(function(){

    $('#calendario').datepicker({

        dateFormat: "dd-mm-yy"}
        );
    });
    </script>

@stop