@extends ('layouts.admin')
@section ('contenido')
<div class="well well bs-component">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
		<h3 style="border-bottom-style: solid;"><center> <i class="fa fa-calendar"></i> Asistencia del curso</center> </h3>
		<h3></h3>
		<h4><b>Nombre Tutoría: </b>{{$tutorias->asignaturas->nombre}}</h4>
		<h4><b>Tutor: </b>{{$tutorias->users->name}} {{$tutorias->users->apellidos}}</h4>
		<h4><b>Numero de Sesiones: </b>{{$fecha_tutoria->count()}}</h4>
	</div>
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

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Asistencia General</a></li>
    <li><a data-toggle="tab" href="#menu1">Ausencias</a></li>
  </ul>
<?php 
	$contador=0;
	$conta=0;
	$total=$fecha_tutoria->count();
	$ausente=0;
	$porcentaje=0;
	$cont=0;
	$con=0;
	$aus=0;
 ?>

<div class="tab-content">

<div id="home" class="tab-pane fade in active">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th class="col-md-2" >Estudiantes</th>
						@foreach ($fecha_tutoria as $e)
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
						<td><center>{{$es->nombre}} {{$es->apellidos}}</center></td>
						@foreach($estFinal as $fe)
						
							
							<td>
								@if(($fe[$contador]->estado)==1)
								<center style="color: green;"><b>P</b></center> 
								<?php 
									$conta= $conta+1;
									
									if($conta == 0){
										
										$porcentaje = 0;
									}
									else{
										$porcentaje=($conta*100)/$total ;
									}
									
									
								 ?>
								@else <center style="color: red;"><b>A</b></center> 
								@endif

							</td>


						@endforeach
						
						<td><center>{{$conta}}</center></td>
						<td><center>{{$ausente=$total-$conta}}</center></td>
						<td><center>{{round($porcentaje =($conta*100)/$total)}}%</center></td>
						<?php $contador+=1;?>
						<?php 
									$conta = 0;
						 ?>
					</tr>

					@endforeach

					</tbody>
					
					
				</table>
				</table>
			</div>
		 
		</div>
	</div>
</div>

<div id="menu1" class="tab-pane ">
  <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th class="col-md-2" >Estudiantes</th>
						<th class="col-md-2">Correo</th>
						<th class="col-md-2">Presente</th>
						<th class="col-md-2">Ausente</th>
						<th class="col-md-2">Alerta</th>
						
					</thead>
					
					<tbody>
					  
					@foreach($estu as $es)
				    
					<tr>
						@foreach($estFinal as $fee)
						
							<?php 
							if(($fee[$cont]->estado)==1){
								
									$con= $con+1;
							}
							$aus=$total-$con;
							 ?>	
						@endforeach
						@if(($aus>2))
						<td><center>{{$es->nombre}} {{$es->apellidos}}</center></td>
						<td><center>{{$es->email}}</center></td>
						<td><center>{{$con}}</center></td>
					    <td><center style="color: red;"><b>{{$aus}}</b></center></td>

					{!!Form::open(array('action'=>['TutoriaController@correo',$tutorias->id],'method'=>'POST','autocomplete'=>'off'))!!}
                      				
				            {{Form::token()}}
				          <input type="hidden" name="_token" value="{{csrf_token()}}">
				           <input type="hidden" name="tutoriaId" value="{{$tutorias->id}}">
				           <input type="hidden" name="Id" value="{{$es->id_user}}">
				           <input type="hidden" name="ausente" value="{{$aus}}">
					    <td><center><a href=""><button class="btn btn-info  " type="submit">Notificar Director</button></a></center></td>
					    {!!Form::close()!!}	

					    @endif
					
				
						
						</tr>

						<?php $cont+=1;?>
					 
						<?php 
									$con= 0;
						 ?>
						@endforeach
					</tbody>
					
					
				</table>
				</table>
			</div>
		 
		</div>
	</div>
</div>

@endsection