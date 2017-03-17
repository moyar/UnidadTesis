@extends ('layouts.admin')
@section ('contenido')
<script>
	alumnos=[];
</script>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Asistencia</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administracion/tutoria/asistencia','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group col-md-5">
            	<label for="fecha">Fecha </label>
            	<input type="date" name="fecha" class="form-control">
            </div>
           <div class="form-group col-md-5">
           <label for = "periodo">Periodo</label>
           <select class="form-control" name="periodo">
					
						<option value='1'> I </option>
						<option value='2'> II </option>
						<option value='3'> III </option>
						<option value='4'> IV </option>
						<option value='5'> V </option>
						<option value='6'> VI </option>
						<option value='7'> VII </option>
						<option value='8'> VIII </option>

			</select>
			</div>
			<div>
			<label>Opción</label>
			<button class="btn btn-info col-md-2 " type="submit">Guardar</button>
			</div>



			
		<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th >Id </th>
					<th>Estudiante</th>
					<th>Asistencia</th>
				</thead>
               @foreach ($estudiantes as $asi)
				<tr>
					<td>{!!$asi->rut!!}</td>
					<td>{!!$asi->nombre!!}</td>
					<td> <select class="form-control" name="estado">
					    <option value=>Realizar asistencia</option>
						<option value=1>Presente</option>
						<option value=0>Ausente</option>
					</select></td>
           		<script>
           			temp={
           				rut:"{!!$asi->rut!!}",
           				nombre:"{!!$asi->nombre!!}",
           				estado: $("#table > estado"),
           			}
           			alumnos.push(temp);
           		</script>
				</tr>
				
				@endforeach
			</table>
		</div>
	</div>
</div>
{!!Form::close()!!}	
@endsection

















