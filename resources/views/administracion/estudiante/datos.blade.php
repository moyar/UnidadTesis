@extends ('layouts.admin')
@section ('contenido')
<div class="container">
  <h3>Ficha Estudiante: {{$estudiante->nombre}} {{$estudiante->apellidos}}</h3>
  <h4>{{$estudiante->carrera}}</h4>
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Datos Personales</a></li>
    <li><a data-toggle="tab" href="#menu1">Tutorias</a></li>
    <li><a data-toggle="tab" href="#menu2">Talleres</a></li>

  </ul>

<div class="tab-content">

<div id="home" class="tab-pane fade in active">
      <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                               
                  <h5>Aqui va la ficha estudiantil</h5>
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
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="table-responsive">
       <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th class="col-md-2" >Asignatura</th>
            <th class="col-md-2" >Tutor</th>
            <th class="col-md-2" >Grupo</th>
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
            <td>{{$estFinal[$contador]}}</td>
            <td>{{$asis[$contador]}}</td>
            <td>{{$estFinal[$contador] - $asis[$contador]}}</td>
            <?php 
               if($asis[$contador]==0)
                $porcentaje=0;
               else
                $porcentaje=($asis[$contador]*100)/$estFinal[$contador];
             ?>
            <td>{{round($porcentaje)}}%</td>

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
            <td>{{$estFinal2[$contador2]}}</td>
            <td>{{$asis2[$contador2]}}</td>
            <td>{{$estFinal2[$contador2] - $asis2[$contador2]}}</td>
              <?php 
               if($asis2[$contador2]==0)
                $porcentaje2=0;
               else
                $porcentaje2=($asis2[$contador2]*100)/$estFinal2[$contador2];
             ?>
            <td>{{round($porcentaje2)}}%</td>

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

@endsection