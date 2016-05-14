@extends('layout.default')
@section ('title')
	Mostrar Profesores
@stop
@section('content')
	<h2>Listado de Profesores:</h2> 
    <table id="profesores" class="table table-striped table-bordered" cellspacing="10" width="95%">
        <thead>
            {{-- 'id','nombre','apellidos','mail','user','pass','avatar', 'f-nac', 'centro_id' --}}
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>apellidos</th>
                <th>E-mail</th>
                <th>User</th>
                {{-- <th>Password</th> --}}
                <th>Avatar</th>
                {{-- <th>Nacimiento</th> --}}
                <th>Centro</th>
            </tr>
        </thead> 
        <tbody>
        	@foreach($datos as $key => $value)
            <tr>
                <td>{!! $value->id !!}</td>
                <td>{!! $value->nombre !!}</td>
                <td>{!! $value->apellidos !!}</td>
                <td>{!! $value->mail !!}</td>
                <td>{!! $value->user !!}</td>
                {{-- <td>{!! $value->pass !!}</td> --}}
                <td><img src="../images/avatares/{!! $value -> enlace_avatar !!}" alt="{!! $value -> nombre !!}" class="img-responsive img-rounded" height="42" width="42"></img></td>
                {{-- <td>{!! $value->nacimiento !!}</td> --}}
                <td>{!! $value->my_centro() !!}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('profesor/' . $value->id) }}"> 
                        <i class="glyphicon glyphicon-eye-open"></i> Ver </a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('profesor/' . $value->id . '/edit') }}">
                    <i class="glyphicon glyphicon-pencil"></i> Editar </a>
                    {!! Form::open(array('url' => 'profesor/' . $value->id, 'class' => 'pull-right ')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    
                    {!! Form::submit('Borrar', array('class' => 'btn btn-small btn-danger ')) !!}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
     <div class="row col-md-2 pull-right">
    <a class="btn btn-small btn-primary" href="{{ URL::to('profesor/create') }}"> 
<i class="glyphicon glyphicon-plus"></i> Nuevo Profesor </a>
        </div>
@stop