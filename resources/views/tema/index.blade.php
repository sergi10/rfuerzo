@extends('layout.default')
@section ('title')
	Mostrar Tema
@stop
@section('content')
	<h2>Listado de Temas:</h2> 
    <table id="temas" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
            {{-- protected $fillable = array('titulo', 'descripcion', 'enlace','enlace_imagen', 'profesor_id'); --}}
            <tr>
                {{-- <th>ID</th> --}}
                <th style="width: 20%">Titulo</th>
                <th style="width: 30%">Descripcion</th>
                <th>Tema</th>
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
                <td><img src="../images/temas/{!! $value -> enlace !!}" alt="{!! $value -> titulo !!}" class="img-responsive img-rounded"  width="100"></img>
</div></td>
                {{-- <td>{!! $value->audio !!}</td> --}}
                <td>{!! $value->my_profesor() !!}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('tema/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('tema/' . $value->id . '/edit') }}">
                    <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                    {!! Form::open(array('url' => 'tema/' . $value->id, 'class' => 'pull-right ')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    
                    {!! Form::submit('Borrar', array('class' => 'btn btn-small btn-danger')) !!}
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