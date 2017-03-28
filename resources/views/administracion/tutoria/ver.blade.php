@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Asistencia del curso</h3>
		<h4>{{$tutorias->asignaturas->nombre}}</h4>
		<h4>{{$tutorias->tutores->nombre}} {{$tutorias->tutores->apellidos}}</h4>
	</div>
</div>
<style type="text/css">
th{
    font: bold 14px Arial, Helvetica, Verdana;    
    background: #d5d5d5;
    text-align:center;
    height:100px;
    vertical-align:bottom; 

}
	.rotar 
		{
			display:block;
		    white-space:nowrap;
		    text-align: center;
		    width:10px;
		    -webkit-transform: rotate(-90deg);
		    -moz-transform: rotate(-90deg);
		    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
		
}


</style>


<?php 
	$contador=0;

 ?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th class="col-md-2" >Estudiantes</th>
					@foreach ($fecha_tutoria as $e)
						<th style="width:10px">
						<center>
							<p class="rotar">
						  {{$e->fecha}}</p>
						</center>
						
						</th>
					@endforeach
				</thead>
				
				<tbody>
				  
				@foreach($estu as $es)
				<tr>
					<td>{{$es->nombre}}</td>
					@foreach($estFinal as $fe)
					
						<td><center>{{$fe[$contador]->estado}}</center></td>

					@endforeach
					<?php $contador+=1;?>
				</tr>

				@endforeach

				</tbody>
				
				
			</table>
			</table>
		</div>
	 
	</div>
</div>





@endsection