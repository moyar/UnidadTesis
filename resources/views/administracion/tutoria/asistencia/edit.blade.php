@extends ('layouts.admin')

@section ('contenido')
{!!Form::open(array('url'=>'administracion/tutoria/asistencia/edit','method'=>'PATCH','autocomplete'=>'off'))!!}
            {{Form::token()}}

<div class="row">
		
         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
         <input type="hidden" name="tutoriaID" value="{{$tutorias->id}}">
         <input type="hidden" name="fechaID" value="{{$fecha_tutoria->id_f}}">
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
		<button class="btn btn-info col-md-6 " type="submit">Guardar</button>
		</div>
	</div>
	
</div>
{!!Form::close()!!}	
@endsection