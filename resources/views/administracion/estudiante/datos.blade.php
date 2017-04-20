@extends ('layouts.admin')
@section ('contenido')
<div class="container">
  <h3>Ficha Estudiante: {{$estudiante->nombre}} {{$estudiante->apellidos}}</h3>
  <h4>{{$estudiante->carrera}}</h4>
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Datos Personales</a></li>
    <li><a data-toggle="tab" href="#menu1">Tutorias</a></li>
    <li><a data-toggle="tab" href="#menu2">Talleres</a></li>
    <li><a data-toggle="tab" href="#menu3">Comentarios</a></li>

  </ul>

<div class="tab-content">

<div id="home" class="tab-pane fade in active">
  

        <form class="form-horizontal">
              <div class="form-group">
               <label  class="control-label label-success col-xs-2">Rut:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->rut}}</p>
              </div>
               <label  class="control-label label-success col-xs-2">Nombre:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->nombre}}</p>
              </div>
               <label class="control-label label-success col-xs-2">Apellidos:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->apellidos}}</p>
              </div>
               <label  class="control-label label-success col-xs-2">Telefono:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->telefono}}</p>
              </div>
               <label  class="control-label label-success col-xs-2">Correo:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->email}}</p>
              </div>
               <label  class="control-label label-success col-xs-2">Carrera:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->carrera}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Fecha de Nacimiento:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->fecha_nacimiento}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Genero:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->sexo}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Tipo de Ingreso:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->tipo_ingreso}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Año Ingreso:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->año_ingreso}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Ciudad de Procedencia:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->ciudad_procedencia}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Quintil:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->quintil}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Nombre Apoderado:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->nombre_apoderado}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Apellidos Apoderado:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->apellidos_apoderado}}</p>
              </div>
                <label  class="control-label label-success col-xs-2">Telefono Apoderado:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$estudiante->telefono_apoderado}}</p>
              </div>
            </div>

        </form>
        
    
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
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="table-responsive">
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
            <td><center>{{$es->tutores->nombre}} {{$es->tutores->apellidos}}</center></td>
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
        </table>
      </div>
                      

  </div>
</div>
</div>

<div id="menu2" class="tab-pane fade "> 
 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="table-responsive">
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
        </table>
      </div>
                      

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
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
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
        </div>
   </form>
{!!Form::close()!!}

@include('administracion.estudiante.indiceComentario')
</div>




@endsection