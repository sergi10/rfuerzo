@extends('layout.default')
@section ('title')
	Mostrar Alumnos
@stop
@section('content')
	<h2>Listado de Alumnos:</h2> 
    <table id="alumnos" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>apellidos</th>
                <th>User</th>
                <th>Avatar</th>
                <th>Centro</th>
                <th>Profesor</th>
                <th class="col-centered">Puntuacion</th>
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>
                <td>{!! $value->id !!}</td>
                <td>{!! $value->nombre !!}</td>
                <td>{!! $value->apellidos !!}</td>
                <td>{!! $value->user !!}</td>
                <td>
                    <img src="../images/avatares/{!! $value -> enlace_avatar !!}" alt="{!! $value -> nombre !!}" class="img-responsive img-rounded" height="42" width="42"></img>
                </td>
                <td>{!! $value->my_centro() !!}</td>
                <td>{!! $value->my_profesor() !!}</td>
                <td class="badge ranking_label">{!! $value->my_puntuacion() !!}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('alumno/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                @if (Auth::es_admin()) 
                    <a class="btn btn-small btn-info" href="{{ URL::to('alumno/' . $value->id . '/edit') }}">
                    <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                    {!! Form::open(array('url' => 'alumno/' . $value->id, 'class' => 'pull-right ')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}                    
                    {!! Form::submit('Borrar', array('class' => 'btn btn-small btn-danger')) !!}
                @endif    
                {!! Form::close() !!}
                </td>               
            </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="row col-md-2 pull-right">
        <a class="btn btn-small btn-primary" href="{{ URL::to('alumno/create') }}"> 
            <i class="glyphicon glyphicon-plus"></i> Nuevo Alumno 
        </a>  
    </div>
@stop