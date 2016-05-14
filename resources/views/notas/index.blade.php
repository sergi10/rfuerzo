@extends('layout.default')
@section ('title')
	Mostrar Notas
@stop
@section('content')
	<h2>Listado de Notas:</h2> 
    <table id="notas" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
    {{-- // alumno_id, tarea_id, nota, activa --}}

                {{-- <th>ID</th> --}}
                <th>alumno</th>
                <th>tarea</th>
                <th>tema</th>
                <th>nota</th>
                {{-- <th>activa</th> --}}
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>
                {{-- <td>{!! $value->id !!}</td> --}}
                <td>{!! $value->my_alumno()->nombre !!} {!! $value->my_alumno()->apellidos !!}</td>
                <td>{!! $value->my_tarea()->nombre !!}</td>
                <td> {!! $value->my_tarea()->my_tema()->titulo !!}</td>
                <td>{!! $value->nota !!}</td>
                {{-- <td>{!! $value->activa !!}</td> --}}
                {{-- <td>{!! $value->my_centro() !!}</td> --}}
                <td>
                   {{--  <a class="btn btn-small btn-success" href="{{ URL::to('notas/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('notas/' . $value->alumno_id . '/edit') }}">
                    <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                    {!! Form::open(array('url' => 'notas/' . $value->id, 'class' => 'pull-right ')) !!} --}}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    
                    {!! Form::submit('Borrar', array('class' => 'btn btn-small btn-danger')) !!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="row col-md-2 pull-right">
    <a class="btn btn-small btn-primary" href="{{ URL::to('notas/create') }}"> 
<i class="glyphicon glyphicon-plus"></i> Nueva Nota </a>
        </div>
@stop