@extends('layout.default')
@section ('title')
	Mostrar Tarea
@stop
@section('content')
	<h2>Listado de Tarea:</h2> 
    <table id="profesores" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>

           {{-- ('nombre', 'descripcion', 'file', 'audio', 'mapa_id') --}}

            <tr>
                {{-- <th>ID</th> --}}
                <th>Titulo</th>
                <th style="width: 30%">Descripcion</th>
                {{-- <th>Imagen</th> --}}
                {{-- <th>Audio</th> --}}
                <th>Mapa</th>
                <th></th>
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>
                {{-- <td>{!! $value->id !!}</td> --}}
                <td>{!! $value->nombre !!}</td>
                <td>{!! $value->descripcion !!}</td>
                {{-- <td>{!! $value->file !!}</td> --}}
                {{-- <td>{!! $value->audio !!}</td> --}}
                <td>{!! $value->my_mapa()->titulo !!}</td>
                <td><img src="../images/mapas/{!! $value->my_mapa()->enlace !!}" alt="{!! $value->my_mapa()-> titulo !!}" class="img-responsive img-rounded"  width="64" style="display:inline;"></img></td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('tarea/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('tarea/' . $value->id . '/edit') }}">
                    <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                    {!! Form::open(array('url' => 'tarea/' . $value->id, 'class' => 'pull-right ')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    
                    {!! Form::submit('Borrar', array('class' => 'btn btn-small btn-danger')) !!}
                    <i class="glyphicon glyphicon-remove"></i>
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="row">
    <a class="btn btn-small btn-primary" href="{{ URL::to('tarea/create') }}"> 
<i class="glyphicon glyphicon-plus"></i> Nuevo Tarea </a>
        </div>
@stop