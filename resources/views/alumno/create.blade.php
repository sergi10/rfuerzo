@extends('layout.default')
@section ('title')
	Crear Alumno
@stop
@section('content')
	<h2>Crear Alumno:</h2>  
    {{-- 'id','nombre','apellidos','mail','user','pass','avatar', 'f-nac', 'centro_id' --}}
    {!! Html::ul($errors -> all(),['class' => 'caja_errores col-md-4']) !!}
{{--     
    <ul>
            @foreach($errors->all() as $error)
                <li class="caja_errores col-md-9">{!!  $error  !!}</li>
            @endforeach
     </ul> 
--}}
<br></br>
<div></div>
    {!! Form::open(array('url' => 'alumno', 'method' => 'post', 'files'=> true)) !!}
    <div class="form-horizontal">
            <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('nombre', Input::old('nombre'), $attributes = $errors->has('nombre') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('apellidos', Input::old('apellidos'), $attributes = $errors->has('apellidos') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
         <div class="form-group">
            {!! Form::label('mail', 'E-mail', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1 ">
                {{-- <div class="col-sm-9 col-sm-offset-1  @if($errors--> has('mail') erroneo @endif"> --}}
                    {!! Form::email('mail', Input::old('mail'), $attributes = $errors->has('mail') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('user', 'User', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::text('user', Input::old('user'),$attributes = $errors->has('user') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('pass', 'Pass', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::password('pass', Input::old('pass'), $attributes = $errors->has('pass') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
             <div class="form-group">
            {!! Form::label('nacimiento', 'Nacimiento', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1">
                    {!! Form::date('f-nac', \Carbon\Carbon::now(), $attributes = $errors->has('nacimiento') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('nacimiento_JQ', 'Nacimiento', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-9 col-sm-offset-1" id='calendario3'>
                    {!! Form::date('f-nac', '', array('id'=>'calendario'),$attributes = $errors->has('f-nac') ? array('class' => 'form-control erroneo'):array('class' => 'form-control')) !!}
                </div>
            </div>
           
            <div class="form-group">
                 <div class="form-group  col-md-6">
                {!! Form::label('centro_id', 'Centro', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-9 col-sm-offset-1">
                        {!! Form::select('centro_id', $centros) !!}
                    </div>
                </div>
                 <div class="form-group col-md-6">
                {!! Form::label('profesor_id', 'Profesor', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-9 col-sm-offset-1">
                        {!! Form::select('profesor_id', $profesores) !!}
                    </div>
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
{{-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> --}}
{{-- <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> --}}
<script type="text/javascript">
    $(function(){
        $('#calendario').Zebra_DatePicker({
            // always_visible: $('#cal'),
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            first_day_of_week: 1,            
        });
    });
</script>

@stop