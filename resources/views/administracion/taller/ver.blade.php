@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Asistencia del curso</h3>
		<h4>{{$talleres->categorias->nombre}}</h4>
		
		<h4>{{$fecha_taller->count()}}</h4>
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
	$conta=0;
	$total=$fecha_taller->count();
	$aus=0;
	$porcentaje=0;

 ?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th class="col-md-2" >Estudiantes</th>
					@foreach ($fecha_taller as $e)
						<th style="width:10px" class="col-md-4">
						<center>
							<p class="rotar">
						  {{$e->fecha}}</p>
						</center>
						
						</th>

					@endforeach
					<th class="col-md-2">Presente</th>
					<th class="col-md-2">Ausente</th>
					<th class="col-md-2">% Asistencia</th>
				</thead>
				
				<tbody>
				  
				@foreach($estu as $es)
				<tr>
					<td><center>{{$es->nombre}}</center></td>
					@foreach($estFinal as $fe)
					
						
						<td>
							@if(($fe[$contador]->estado)==1)
							<center>P</center> 
							<?php 
								$conta= $conta+1;
								if($conta==0){
									$porcentaje=0;
								}
								else{
									$porcentaje=(($conta * 100)/$total);
								}

							 ?>
							@else <center>A</center>
							@endif

						</td>


					@endforeach
					
					<td><center>{{$conta}}</center></td>
					<td><center>{{$total-$conta}}</center></td>
					<td><center>{{round($porcentaje=(($conta * 100)/$total))}}%</center></td>
					<?php $contador+=1;?>
					<?php 
								$conta= 0;
					 ?>
				</tr>

				@endforeach

				</tbody>
				
				
			</table>
			</table>
		</div>
	 
	</div>
</div>

@endsection