@extends('layout.default')
@section ('title')
	Mostrar Notas
@stop
@section('content')
	<h2>Listado de Notas:</h2> 
    <table id="notas" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
            <tr>
                <th style="width: 20%">alumno</th>
                <th style="width: 30%">tarea</th>
                <th style="width: 20%">tema</th>
                <th>nota</th>
                <th style="width: 20%"></th>
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>

                <td>{!! $value->my_alumno()->my_nombre() !!}</td>
                <td>{!! $value->my_tarea()->nombre !!}</td>
                <td>{!! $value->my_tarea()->my_tema()->titulo !!}</td>
                <td>{!! $value->nota !!}</td>
                <td>
                    @if ((Auth::level() > 1) |(Auth::get_owner() == $value->my_alumno()->profesor_id))
                        {!! Form::hidden('_method', 'DELETE') !!}                    
                        {!! Form::submit('Borrar', array('class' => 'btn btn-small btn-danger')) !!}
                    @endif
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    @if (Auth::level() > 0)
        <div class="row col-md-2 pull-right">
            <a class="btn btn-small btn-primary" href="{{ URL::to('notas/create') }}"> 
            <i class="glyphicon glyphicon-plus"></i> Nueva Nota </a>
        </div>
    @endif
@stop