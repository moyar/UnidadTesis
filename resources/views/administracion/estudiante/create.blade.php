@extends ('layouts.admin')
@section ('contenido')

<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
<div class="well well bs-component">
<div class="row">
 
      
  
      <h3 style="border-bottom-style: solid;"> <i class="fa fa-user"></i>  Nuevo Estudiante</h3>

      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
            
            {!!Form::open(array('url'=>'administracion/estudiante','method'=>'POST','autocomplete'=>'off'))!!}
             {{Form::token()}}
             <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    
                
                      
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                           <div class="form-group col-md-12" >
                                    <label for="rut">Rut</label>
                                    <input type="text" name="rut" required class="form-control" placeholder="Rut..." >
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" required class="form-control" placeholder="Nombre...">
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" name="apellidos" required class="form-control" placeholder="apellidos...">
                              </div>
                               <div class="form-group col-md-12">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" name="telefono" required class="form-control" placeholder="Telefono...">
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="text" name="email"  required class="form-control" placeholder="Email...">
                              </div>
                              <div class="form-group col-md-12">
                             <label for = "carrera">Carrera</label>
                             
                             <label for = "carrera_id">Carrera</label>
                             <select  required class="form-control" name="carrera_id">
                                    <option value=''>Seleccionar Carrera</option>
                                    @foreach($carrera as $asi)
                                    <option value='{{ $asi->id}}'>{{ $asi->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>

                       
                        </div>
                        
                        
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                             

                              <div class="form-group col-md-12">
                                  <label for="fecha">Fecha de Nacimiento</label>
                                  <div class="input-group date">
                                      <input type="text" name="fecha_nacimiento" required class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
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
                              <div class="form-group col-md-12">
                                   <label for = "genero">Genero</label>
                                   <select class="form-control" required name="genero">
                                                  <option value=''> Seleccione un Genero </option>
                                                  <option value='Femenino'> Femenino</option>
                                                  <option value='Masculino'> Masculino </option>   
                                    </select>
                              </div>
                              <div class="form-group col-md-12">
                                   <label for = "ingreso">Tipo de Ingreso</label>
                                   <select class="form-control" required name="ingreso">
                                                  <option value=''> Seleccione Ingreso </option>
                                                  <option value='PSU'> PSU</option>
                                                  <option value='Especial'> Especial </option>   
                                    </select>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="año_ingreso">Año de Ingreso</label>
                                    <input type="text" name="año_ingreso" required class="form-control" placeholder="Ingrese el año...">
                              </div>
                              
                              <div class="form-group col-md-12">
                                    <label for="ciudadP">Ciudad de Procedencia</label>
                                    <input type="text" name="ciudadP" required class="form-control" placeholder="Ingrese ciudad de Procedencia...">
                              </div>
                              <div class="form-group col-md-12">
                                   <label for = "quintil">Quintil</label>
                                   <select class="form-control" name="quintil">
                                                  <option value=''> Seleccione Quintil </option>
                                                  <option value='1'> 1</option>
                                                  <option value='2'> 2</option>
                                                  <option value='3'> 3</option>
                                                  <option value='4'> 4</option>
                                                  <option value='5'> 5</option>
                                                    
                                    </select>
                               </div>

                        </div>
                        
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            
                               <div class="form-group col-md-12">
                                    <label for="nombresA">Nombres Apoderado</label>
                                    <input type="text" name="nombresA" required class="form-control" placeholder="Ingrese el nombre del Apoderado...">
                              </div>
                               <div class="form-group col-md-12">
                                    <label for="apellidosA">Apellidos Apoderado</label>
                                    <input type="text" name="apellidosA" required class="form-control" placeholder="Ingrese los apellidos del Apoderado...">
                              </div>
                               <div class="form-group col-md-12">
                                    <label for="telefonoA">Telefono Apoderado</label>
                                    <input type="text" name="telefonoA" required class="form-control" placeholder="Ingrese el Telefono del Apoderado...">
                                   
                              </div>
                              <div class="form-group col-md-12">
                              <label for = "motivo">Motivo</label>
                             <select  required class="form-control" name="motivo">
                                    <option value=''>Seleccionar Motivo</option>
                                    <option value='1'>Atención Psicopedagógica</option>
                                    <option value='2'>Solicitud de Tutorías</option>
                                    <option value='3'>Ambos</option>
                                </select>
                              </div>

                                <div class="form-group col-md-12">
                                    
                                    <button class="btn btn-success" type="submit">Finalizar Expediente</button>
                              </div>

                       
                           
                        </div>
                        

                  
                  
      {!!Form::close()!!}   

    </div> 
    </div>        
   </div> 
</div>

</script>

@endsection

