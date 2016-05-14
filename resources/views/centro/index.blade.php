@extends('layout.default')
@section ('title')
	Mostrar Centros
@stop
@section('content')
	<h2>Listado de Centros:</h2> 
    <table id="centros" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>
                <td>{!! $value->id !!}</td>
                <td style="width: 35%">{!! $value->nombre !!}</td>
                <td style="width: 35%">{!! $value->direccion !!}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('centro/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('centro/' . $value->id . '/edit') }}">
                    <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                    {!! Form::open(array('url' => 'centro/' . $value->id, 'class' => 'pull-right ')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    
                    {!! Form::submit('Borrar', array('class' => 'btn btn-small btn-danger')) !!}                    
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
   <div class="row col-md-2 pull-right">
    <a class="btn btn-small btn-primary" href="{{ URL::to('centro/create') }}"> 
<i class="glyphicon glyphicon-plus"></i> Nuevo Centro </a>
        </div>
@stop