@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tutorias <a href="taller/create"><button class="btn btn-success">Nuevo</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th ># </th>
					<th>Grupo</th>
					<th>Talleres</th>
					<th>Opciones</th>
				</thead>
			
					
					@foreach ($talleres as $tall)
						
						<tr>
							<td>{{ $tall->id }}</td>
							<td>{{ $tall->nombre_grupo }}</td>
							<td>{{ $tall->categoria}}</td>
						
							
						</tr>

					@endforeach

			</table>
			</table>
		</div>
	
	</div>
</div>

@endsection