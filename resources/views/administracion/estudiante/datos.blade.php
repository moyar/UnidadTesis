@extends ('layouts.admin')
@section ('contenido')
<div class="container">
  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
   <h4 style="color: green;"><b>Ficha Estudiante</b> </h4>
  <h3><b>{{$estudiante->nombre}} {{$estudiante->apellidos}}</b></h3>
  <h3> </h3>
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Datos Personales</a></li>
    <li><a data-toggle="tab" href="#menu1">Tutorias</a></li>
    <li><a data-toggle="tab" href="#menu2">Talleres</a></li>
    <li><a data-toggle="tab" href="#menu3">Comentarios</a></li>
    <li><a data-toggle="tab" href="#menu4">Atencion Individual</a></li>

  </ul>
</div>
<div class="tab-content">

<div id="home" class="tab-pane fade in active">
      <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
       <div class="well well bs-component">
         <h3 style="border-bottom-style: solid;"><center> <i class="fa fa-user"></i> Datos Personales </center> </h3>
        <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Rut</center></label>
              <div class="col-lg-9 col-xs-10">
                <p class="form-control-static"><b>{{$estudiante->rut}}</b></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Nombres</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->nombre}}</b></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Apellidos</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->apellidos}}</b></p>
              </div>
            </div>
               <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Telefono</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->telefono}}</b></p>
              </div>
            </div>
               <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Correo Electronico</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->email}}</b></p>
              </div>
            </div>
               <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Carrera</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->carreras->nombre}}</b></p>
              </div>
            </div>
               <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Fecha de Nacimiento</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->fecha_nacimiento}}</b></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Genero</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->sexo}}</b></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Tipo de Ingreso</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->tipo_ingreso}}</b></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Año de Ingreso</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->año_ingreso}}</b></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Ciudad de Procedencia</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->ciudad_procedencia}}</b></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Quintil</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->quintil}}</b></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Nombre Apoderado</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->nombre_apoderado}}</b></p>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Apellidos Apoderado</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->apellidos_apoderado}}</b></p>
              </div>
            </div>
             <div class="form-group">
              <label class="col-lg-3 col-xs-12 control-label label-warning"><center>Telefono Apoderado</center></label>
              <div class="col-lg-9 col-xs-12">
                <p class="form-control-static"><b>{{$estudiante->telefono_apoderado}}</b></p>
              </div>
            </div>


            
          </form>

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


<?php 
  $contador=0;
  $conta=0;
  $ausente=0;
  $porcentaje=0;
  $contador2 = 0;
  $porcentaje2 = 0;
  
 ?>
<div id="menu1" class="tab-pane fade "> 
  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
    <h3 style="border-bottom-style: solid;"><center> <i class="fa fa-book"></i> Tutorías </center> </h3>
    <div class="table-responsive">
       
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th class="col-md-2" >Asignatura</th>
            <th class="col-md-2" >Tutor</th>
            <th class="col-md-2" >Grupo</th>
            <th class="col-md-2" >Semestre</th>
            <th class="col-md-2" >Año</th>
            <th class="col-md-2">Total</th>
            <th class="col-md-2">Presente</th>
            <th class="col-md-2">Ausente</th>
            <th class="col-md-2">Porcentaje</th>
            
          </thead>
          
          <tbody>
            
          @foreach($tutorias as $es)
            
          <tr>       
            <td><center>{{$es->asignaturas->nombre}}</center></td>
            <td><center>{{$es->users->name}} {{$es->users->apellidos}}</center></td>
            <td><center>{{$es->nombre_grupo}}</center></td>
            <td><center>{{$es->semestre}}</center></td> 
            <td><center>{{$es->año}}</center></td>   
            <td><center>{{$estFinal[$contador]}}</center></td>
            <td><center>{{$asis[$contador]}}</center></td>
            <td><center>{{$estFinal[$contador] - $asis[$contador]}}</center></td>
            <?php 
               if($asis[$contador]==0)
                $porcentaje=0;
               else
                $porcentaje=($asis[$contador]*100)/$estFinal[$contador];
             ?>
            <td><center>{{round($porcentaje)}}%</center></td>

               <?php 
            $contador= $contador + 1;
            ?>
               </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>
</div>

<div id="menu2" class="tab-pane fade "> 
 <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
  <h3 style="border-bottom-style: solid;"><center> <i class="fa fa-calendar"></i> Talleres </center> </h3>
    <div class="table-responsive">
       
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th class="col-md-2" >Taller</th>
            <th class="col-md-2" >Grupo</th>
            <th class="col-md-2" >Semestre</th>
            <th class="col-md-2" >Año</th>
            <th class="col-md-2">Total</th>
            <th class="col-md-2">Presente</th>
            <th class="col-md-2">Ausente</th>
            <th class="col-md-2">Porcentaje</th>
            
          </thead>
          
          <tbody>
            
          @foreach($talleres as $ees)
            
          <tr>       
            <td><center>{{$ees->categorias->nombre}}</center></td>
            <td><center>{{$ees->nombre_grupo}}</center></td> 
            <td><center>{{$ees->semestre}}</center></td> 
            <td><center>{{$ees->año}}</center></td>  
            <td><center>{{$estFinal2[$contador2]}}</center></td>
            <td><center>{{$asis2[$contador2]}}</center></td>
            <td><center>{{$estFinal2[$contador2] - $asis2[$contador2]}}</center></td>
              <?php 
               if($asis2[$contador2]==0)
                $porcentaje2=0;
               else
                $porcentaje2=($asis2[$contador2]*100)/$estFinal2[$contador2];
             ?>
            <td><center>{{round($porcentaje2)}}%</center></td>

              <?php 
            $contador2 = $contador2+ 1;
            ?>
            
          </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>

</div>
<div id="menu3" class="tab-pane fade "> 

<style type="text/css">
  .comment-content {
  clear: both;
  margin-left: 65px;
  font-size: 16px;
  line-height: 1.3em;
}

</style>
<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
      <h3 style="border-bottom-style: solid;"><center> <i class="fa fa-graduation-cap" ></i>  Hoja de Vida </center> </h3>
      <h3>Nuevo Comentario</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::open(array('url'=>'administracion/estudiante/datos','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="estudianteId" value="{{$estudiante->id_user}}">
            <div class="row">
             <form>
          <div class="col-md-6">
            {{ Form::label('nombre', "Nombre:") }}
            {{ Form::text('nombre', null, ['class' => 'form-control']) }}
          </div>

          <div class="col-md-12">
           {{ Form::label('comentario', "Comentario:") }}
            {!! Form::textarea('comentario', null, ['class' => 'form-control', 'rows' => '5']) !!}

            {{ Form::submit('Agregar Comentario', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
          </div>
          </form>
        </div>
   
{!!Form::close()!!}

@include('administracion.estudiante.indiceComentario')
</div>
</div>
</div>



<div id="menu4" class="tab-pane fade "> 
<style type="text/css">
  .comment-content {
  clear: both;
  margin-left: 65px;
  font-size: 16px;
  line-height: 1.3em;
}

</style>
<div class="row">
    <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
      <h3 style="border-bottom-style: solid;"><center> <i class="fa fa-file"></i> Atención Individual </center> </h3>
      <h3>Nueva Atencion</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::open(array('url'=>'administracion/estudiante/datoss','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="estudianteId" value="{{$estudiante->id_user}}">
            <div class="row">
             <form>

            
            
            <input type="hidden" name="autor" class="form-control" value="{{Auth::user()->rut}}">
            
           <div class="col-md-5">
            {{ Form::label('citadas', "Nº de sesiones Citadas:") }}
            {{ Form::text('citadas', null, ['class' => 'form-control']) }}
          </div>
          <div class="col-md-5">
            {{ Form::label('asistidas', "Nº de sesiones Asistidas:") }}
            {{ Form::text('asistidas', null, ['class' => 'form-control']) }}
          </div>

          <div class="col-md-5">
            {{ Form::label('diagnostico', "Diagnostico:") }}
            {{ Form::text('diagnostico', null, ['class' => 'form-control']) }}
          </div>
          <div class="col-md-5">
            {{ Form::label('derivaciones', "Derivaciones:") }}
            {{ Form::text('derivaciones', null, ['class' => 'form-control']) }}
          </div>

          <div class="col-md-12">
           {{ Form::label('observacion', "Observaciones:") }}
            {!! Form::textarea('observacion', null, ['class' => 'form-control', 'rows' => '5']) !!}

            {{ Form::submit('Agregar Atención', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top:15px;']) }}
          </div>
          </form>
        </div>
   
{!!Form::close()!!}

@include('administracion.estudiante.atencion')
</div>
</div>
</div>

</div>




@endsection