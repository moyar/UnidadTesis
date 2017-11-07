<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Atenciones </h3>
		<h4>Numero de Atenciones {{$estudiante->atenciones()->count()}}</h4>
	</div>
</div>


<?php
 
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<input type="hidden" name="estudianteId" value="{{$estudiante->id_user}}">
	<div class="table-responsive">
       <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
		
					<thead>
						<tr>
							<th>Autor</th>
							<th>Nº Sesiones Citadas</th>
							<th>Nº Sesiones Asistidas</th>
							<th>% Asistencia</th>
							<th>Diagnostico</th>
							<th>Derivaciones</th>
							<th>Observaciones</th>
							
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($estudiante->atenciones as $aten)
						<tr>
							<td><center>{{ $aten->autor }}</center></td>
							<td><center>{{ $aten->citadas }}</center></td>
							<td><center>{{ $aten->asistidas }}</center></td>
							<td><center>{{ round(($aten->asistidas * 100)/($aten->citadas))}}%</center></td>
							<td><center>{{ $aten->diagnostico }}</center></td>
							<td><center>{{ $aten->derivaciones }}</center></td>
							<td><center>{{ $aten->observacion }}</center></td>
							<td>
								<a href="{{URL::action('AtencionController@edit',$aten->id_atencion,$estudiante->id_user)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>

								<a href="" data-target="#modalA-delete-{{$aten->id_atencion}}" data-toggle="modal"class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								
								
							</td>
						</tr>
						@include('administracion.estudiante.modalA')
						@endforeach
					</tbody>
				</table>
			</div>
		 </div>
		</div>
	</div>
</div>
