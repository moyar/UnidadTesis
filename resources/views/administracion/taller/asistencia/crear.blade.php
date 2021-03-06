@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
			<h3 style="border-bottom-style: solid;"><center> <i class="fa fa-file-text"></i> Nueva Asistencia</center> </h3>
			<h1> </h1>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administracion/taller/asistencia','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="tallerId" value="{{$talleres->id}}">
           
            <div class="form-group col-md-4">
            	<label for="fecha">Fecha </label>
	            <div class="input-group date">
	  				<input type="text" name="fecha" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			   </div>
		   </div>

		     <script type='text/javascript'>
				$(function(){
				$('.input-group.date').datepicker({
					format: "yyyy/mm/dd",
				    calendarWeeks: true,
				    todayHighlight: true,
				    autoclose: true,
				    language: "es"
				  
				});  
				});

			</script>
           <div class="form-group col-md-4">
           <label for = "periodo">Periodo</label>
           <select class="form-control" name="periodo">
					
						<option value='1'> I </option>
						<option value='2'> II </option>
						<option value='3'> III </option>
						<option value='4'> IV </option>
						<option value='5'> V </option>
						<option value='6'> VI </option>
						

			</select>
			</div>
			<div class="form-group col-md-4">
			<label class="col-md-12">Opciónes</label>
			<button class="btn btn-info  " type="submit">Guardar</button>
			<button href="{{action('TallerController@mostrarGestionar',$talleres->id)}}" type="button" class="btn btn-danger ">Cancelar</button>
			</div>

{!!Form::close()!!}	
@include('administracion.taller.asistencia.index')
@endsection

















