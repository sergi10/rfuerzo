@extends('layout.default')
@section ('title')
	Mostrar Mapa
@stop
@section('content')
	<h2>Listado de Mapa:</h2> 
    <table id="profesores" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
            {{-- protected $fillable = array('titulo', 'descripcion', 'imagen', 'audio', 'imagen', 'profesor_id'); --}}
            <tr>
                {{-- <th>ID</th> --}}
                <th style="width: 20%">Titulo</th>
                <th style="width: 30%">Descripcion</th>
                <th>Mapa</th>
                {{-- <th>audio</th> --}}
                <th>Profesor</th>
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>
                {{-- <td>{!! $value->id !!}</td> --}}
                <td>{!! $value->titulo !!}</td>
                <td>{!! $value->descripcion !!}</td>
                <td><img src="../images/mapas/{!! $value -> enlace !!}" alt="{!! $value -> titulo !!}" class="img-responsive img-rounded"  width="100"></img>
</div></td>
                {{-- <td>{!! $value->audio !!}</td> --}}
                <td>{!! $value->my_profesor() !!}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('mapa/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('mapa/' . $value->id . '/edit') }}">
                    <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                    {!! Form::open(array('url' => 'mapa/' . $value->id, 'class' => 'pull-right ')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    
                    {!! Form::submit('Borrar', array('class' => 'btn btn-small btn-danger glyphicon glyphicon-remove')) !!}
                    <i class="glyphicon glyphicon-remove"></i>
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="row">
    <a class="btn btn-small btn-primary" href="{{ URL::to('mapa/create') }}"> 
<i class="glyphicon glyphicon-plus"></i> Nuevo Mapa </a>
        </div>
@stop