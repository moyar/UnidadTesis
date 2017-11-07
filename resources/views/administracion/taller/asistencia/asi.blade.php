@extends ('layouts.admin')

@section ('contenido')
{!!Form::open(array('url'=>'administracion/taller/asistencia/asi','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
 <div class="well well bs-component">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
				<h3 style="border-bottom-style: solid;"><center> <i class="fa fa-users"></i> Lista de Alumnos</center> </h3>
				<h4 class="col-md-6">{{$talleres->categorias->nombre}}</h4>
				
				<h3> </h3>
			</div>
		</div>
</div>
<div class="row">
		
         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
         <input type="hidden" name="tallerID" value="{{$talleres->id}}">
         <input type="hidden" name="fechaID" value="{{$fecha_taller->id_t}}">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th >Id </th>
					<th>Estudiantes</th>
					<th>Asistencia</th>
				</thead>
               @foreach ($estudiantes as $asi)
				<tr>
					<td>{!!$asi->rut!!}</td>
					<td>{!!$asi->nombre!!}</td>
					<td>
						<input type="checkbox" name="estado[]" value="{{$asi->id_user}}">
					 </td>
				</tr>
				
				@endforeach
			</table>
			<div class="form-group col-md-8">
				<button class="btn btn-info " type="submit">Guardar</button>
			</div>
		</div>
	</div>
	
</div>
{!!Form::close()!!}	
@endsection