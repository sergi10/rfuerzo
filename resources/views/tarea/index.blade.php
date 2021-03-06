@extends('layout.default')
@section ('title')
	Mostrar Tarea
@stop
@section('content')
	<h2>Listado de Tarea:</h2> 
    <table id="profesores" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
            <tr>
                <th>Titulo</th>
                <th style="width: 30%">Descripcion</th>
                <th>tema</th>
                <th></th>
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>
                <td>{!! $value->nombre !!}</td>
                <td>{!! $value->descripcion !!}</td>
                <td>{!! $value->my_tema()->titulo !!}</td>
                <td><img src="../images/temas/{!! $value->my_tema()-> enlace !!}" alt="{!! $value->my_tema()-> titulo !!}" class="img-responsive img-rounded"  width="64" style="display:inline;"></img></td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('tarea/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                @if ((Auth::level() > 1) | (Auth::get_owner() == $value->my_tema()->profesor_id))
                    <a class="btn btn-small btn-info" href="{{ URL::to('tarea/' . $value->id . '/edit') }}">
                    <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                    {!! Form::open(array('url' => 'tarea/' . $value->id, 'class' => 'pull-right ')) !!}
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
    <a class="btn btn-small btn-primary" href="{{ URL::to('tarea/create') }}"> 
<i class="glyphicon glyphicon-plus"></i> Nueva Tarea </a>
        </div>
        @endif
@stop