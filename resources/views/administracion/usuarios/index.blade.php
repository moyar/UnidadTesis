@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios <a href="{{URL::action('UsersController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administracion.usuarios.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				
			
					<th>Nombre</th>
					<th>Email</th>
					<th>Rol</th>
				
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $use)
                        <tr>
                            <td>{{ $use->name}}</td>
                            <td>{{ $use->email}}</td>
                            <td>{{ $use->Roles->nombre}}</td>
                            <td>
                                <a href="{{URL::action('UsersController@edit',$use->id)}}"><button class="btn btn-info">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{$use->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>  
                            </td>
                        </tr>
				@include('administracion.usuarios.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection