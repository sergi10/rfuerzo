@extends('layout.default')
@section ('title')
	Mostrar Tema
@stop
@section('content')
	<h2>Listado de Temas:</h2> 
    <table id="temas" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
            <tr>
                <th style="width: 20%">Titulo</th>
                <th style="width: 30%">Descripcion</th>
                <th>Tema</th>
                <th>Profesor</th>
                <th style="width: 30%"></th>
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>
                <td>{!! $value->titulo !!}</td>
                <td>{!! $value->descripcion !!}</td>
                <td>
                    <img src="../images/temas/{!! $value->enlace !!}" alt="{!! $value->titulo !!}" class="img-responsive img-rounded"  width="100">
                </td>
                <td>{!! $value->my_profesor() !!}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('tema/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                    @if ((Auth::level() > 1) |(Auth::get_owner() == $value->profesor_id))
                        <a class="btn btn-small btn-info" href="{{ URL::to('tema/' . $value->id . '/edit') }}">
                        <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                        {!! Form::open(array('url' => 'tema/' . $value->id, 'class' => 'pull-right ')) !!}
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
    <a class="btn btn-small btn-primary" href="{{ URL::to('tema/create') }}"> 
<i class="glyphicon glyphicon-plus"></i> Nuevo Tema </a>
        </div>
@stop