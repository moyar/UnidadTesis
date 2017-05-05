@extends ('layouts.admin')
@section ('contenido')


<div class="row">
 
      
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Estudiante</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
            <div class="container" id="myWizard">
            {!!Form::open(array('url'=>'administracion/estudiante','method'=>'POST','autocomplete'=>'off'))!!}
             {{Form::token()}}
             <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                     <div class="navbar">
                        <div class="navbar-inner">
                              <ul class="nav nav-pills">
                                 <li class="active"><a href="#step1" data-toggle="tab">Datos Principales</a></li>
                                 <li><a href="#step2" data-toggle="tab">Paso 2</a></li>
                                 <li><a href="#step3" data-toggle="tab">Paso 3</a></li>
                                 
                              </ul>
                        </div>
                     </div>
                     <div class="tab-content">
                        <div class="tab-pane active" id="step1">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <div class="form-group col-md-8" >
                                    <label for="rut">Rut</label>
                                    <input type="text" name="rut" required class="form-control" placeholder="Rut..." >
                              </div>
                              <div class="form-group col-md-8">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre...">
                              </div>
                              <div class="form-group col-md-8">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" placeholder="apellidos...">
                              </div>
                               <div class="form-group col-md-8">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Telefono...">
                              </div>
                              <div class="form-group col-md-8">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email...">
                              </div>
                              <div class="form-group col-md-8">
                             <label for = "carrera">Carrera</label>
                             
                             <label for = "carrera_id">Carrera</label>
                             <select class="form-control" name="carrera_id">
                                    <option value=''>Seleccionar Carrera</option>
                                    @foreach($carrera as $asi)
                                    <option value='{{ $asi->id}}'>{{ $asi->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>

                         </div>
                           
                           </div>
                           <a class="btn btn-default next" href="#">Continuar</a>
                        </div>
                        <div class="tab-pane" id="step2">
                           <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group col-md-8">
                                    <label for="fecha">Fecha de Nacimiento </label>
                                    <input type="date" name="fecha_nacimiento" class="form-control">
                              </div>
                              <div class="form-group col-md-8">
                                   <label for = "genero">Genero</label>
                                   <select class="form-control" name="genero">
                                                  <option value=''> Seleccione un Genero </option>
                                                  <option value='Femenino'> Femenino</option>
                                                  <option value='Masculino'> Masculino </option>   
                                    </select>
                              </div>
                              <div class="form-group col-md-8">
                                   <label for = "ingreso">Tipo de Ingreso</label>
                                   <select class="form-control" name="ingreso">
                                                  <option value=''> Seleccione Ingreso </option>
                                                  <option value='PSU'> PSU</option>
                                                  <option value='Especial'> Especial </option>   
                                    </select>
                              </div>
                              <div class="form-group col-md-8">
                                    <label for="año_ingreso">Año de Ingreso</label>
                                    <input type="text" name="año_ingreso" class="form-control" placeholder="Ingrese el año...">
                              </div>
                              
                              <div class="form-group col-md-8">
                                    <label for="ciudadP">Ciudad de Procedencia</label>
                                    <input type="text" name="ciudadP" class="form-control" placeholder="Ingrese ciudad de Procedencia...">
                              </div>

                           </div>
                           </div>
                           <a class="btn btn-default next" href="#">Continuar</a>
                        </div>
                        <div class="tab-pane" id="step3">
                           <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group col-md-8">
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
                               <div class="form-group col-md-8">
                                    <label for="nombresA">Nombres Apoderado</label>
                                    <input type="text" name="nombresA" class="form-control" placeholder="Ingrese el nombre del Apoderado...">
                              </div>
                               <div class="form-group col-md-8">
                                    <label for="apellidosA">Apellidos Apoderado</label>
                                    <input type="text" name="apellidosA" class="form-control" placeholder="Ingrese los apellidos del Apoderado...">
                              </div>
                               <div class="form-group col-md-8">
                                    <label for="telefonoA">Telefono Apoderado</label>
                                    <input type="text" name="telefonoA" required class="form-control" placeholder="Ingrese el Telefono del Apoderado...">
                              </div>

                           </div>
                           </div>
                           <button class="btn btn-success" type="submit">Finalizar Expediente</button>
                        </div>
                        

                     </div>
                  </div>
			{!!Form::close()!!}		

		</div>           
</div> 

<script>
$('.next').click(function(){

  var nextId = $(this).parents('.tab-pane').next().attr("id");
  $('[href=#'+nextId+']').tab('show');

})

</script>

@endsection

