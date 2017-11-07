@extends ('layouts.admin')
@section ('contenido')
<div class="well well bs-component">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4 style="color: green;"><b>Editar Estudiante</b> </h4>
      <h3 style="border-bottom-style: solid;">{{ $usuarios->nombre}} {{ $usuarios->apellidos}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

      {!!Form::model($usuarios,['method'=>'PUT','route'=>['administracion.estudiante.update',$usuarios->id_user]])!!}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
             {{Form::token()}}
                     
                     
                   
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="form-group col-md-12" >
                                    <label for="rut">Rut</label>
                                    <input type="text" name="rut" class="form-control" value="{{$usuarios->rut}}">
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{$usuarios->nombre}}">
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" value="{{$usuarios->apellidos}}">
                              </div>
                               <div class="form-group col-md-12">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" name="telefono" class="form-control" value="{{$usuarios->telefono}}">
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{$usuarios->telefono}}">
                              </div>
                              <div class="form-group col-md-12">
          
                                  {{ Form::label('carrera', "Carrera:", ['class' => 'form-spacing-top']) }}
                                  {{ Form::select('carrera_id', $carre, null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              


                                <div class="form-group col-md-12">
                                  <label for="fecha">Fecha de Nacimiento</label>
                                  <div class="input-group date">
                                      <input type="text"  value="{{$usuarios->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
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
                                   <select class="form-control" name="genero">
                                     <option value='{{$usuarios->sexo}}'> {{$usuarios->sexo}} </option>
                                                  <option value=''> Seleccione un Genero </option>
                                                  <option value='Femenino'> Femenino</option>
                                                  <option value='Masculino'> Masculino </option>   
                                    </select>
                              </div>
                              <div class="form-group col-md-12">
                                   <label for = "ingreso">Tipo de Ingreso</label>
                                   <select class="form-control" name="ingreso">
                                                <option value='{{$usuarios->tipo_ingreso}}'> {{$usuarios->tipo_ingreso}} </option>
                                                  <option value=''> Seleccione Ingreso </option>
                                                  <option value='PSU'> PSU</option>
                                                  <option value='Especial'> Especial </option>   
                                    </select>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="año_ingreso">Año de Ingreso</label>
                                    <input type="text" name="año_ingreso" class="form-control" value="{{$usuarios->año_ingreso}}".">
                              </div>
                              
                              <div class="form-group col-md-12">
                                    <label for="ciudadP">Ciudad de Procedencia</label>
                                    <input type="text" name="ciudadP" class="form-control" value="{{$usuarios->ciudad_procedencia}}">
                              </div>
                               <div class="form-group col-md-12">
                                   <label for = "quintil">Quintil</label>
                                   <select class="form-control" name="quintil">
                                                  <option value='{{$usuarios->quintil}}'> {{$usuarios->quintil}} </option>
                                                  <option value=''> Seleccione Quintil </option>
                                                  <option value='1'> 1</option>
                                                  <option value='2'> 2</option>
                                                  <option value='3'> 3</option>
                                                  <option value='4'> 4</option>
                                                  <option value='5'> 5</option>
                                                    
                                    </select>
                               </div>
                        </div>
          
                       
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                             
                               <div class="form-group col-md-12">
                                    <label for="nombresA">Nombres Apoderado</label>
                                    <input type="text" name="nombresA" class="form-control" value="{{$usuarios->nombre_apoderado}}">
                              </div>
                               <div class="form-group col-md-12">
                                    <label for="apellidosA">Apellidos Apoderado</label>
                                    <input type="text" name="apellidosA" class="form-control" value="{{$usuarios->apellidos_apoderado}}">
                              </div>
                               <div class="form-group col-md-12">
                                    <label for="telefonoA">Telefono Apoderado</label>
                                    <input type="text" name="telefonoA" class="form-control" value="{{$usuarios->telefono_apoderado}}">
                              </div>
                              <div class="form-group col-md-12">
                                   <label for = "motivo">Motivo</label>
                                   <select class="form-control" name="motivo">
                                                @if($usuarios->motivo == 1)
                                                  <option value='{{$usuarios->motivo}}'> Atencíon Psicopedagógica </option>
                                                @endif
                                                @if($usuarios->motivo == 2)
                                                  <option value='{{$usuarios->motivo}}'> Solicitud Tutorías </option>
                                                @endif
                                                @if($usuarios->motivo == 3)
                                                  <option value='{{$usuarios->motivo}}'> Ambos </option>
                                                @endif
                                                  <option value=''> Seleccione Motivo </option>
                                                  <option value='1'> Atención Psicopedagógica</option>
                                                  <option value='2'> Solicitud Tutorías</option>
                                                  <option value='3'> Ambas</option>
                                                 
                                                    
                                    </select>
                               </div>

                          <div class="form-group col-md-12">
                           <button class="btn btn-success" type="submit">Finalizar Expediente</button>
                         </div>
                        </div>
                </div>
                


      {!!Form::close()!!}		
            
		</div>
@endsection