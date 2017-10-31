<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h4>Numero de Temas creados <b>{{$topico->respuestas()->count()}}</b></h4>
		<h3>Listado de Temas</h3>
	</div>
</div>



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="table-responsive">
       <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
		
					<thead>
						<tr>
							<th><center>Autor</center></th>
							<th><center>Comentario</center></th>
							<th><center>Fecha creacion</center></th>
							
							<th><center>Opciones</center></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($topico->respuestas as $comment)
						<tr>
							<td><center>{{$comment->autor}}</center></td>
							<td><center>{{ $comment->comentario }}</center></td>
							<td><center>{{ $comment->created_at }}</center></td>
							<td>
								<center>

								

								<a href="{{URL::action('RespuestaController@edit',$comment->id_respuesta,$topico->id_topico)}}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> Editar</a>

								<a href="" data-target="#modalT-delete-{{$comment->id_respuesta}}" data-toggle="modal"class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
								</center>
							</td>
						</tr>
						@include('profesor.tutoria.comentario.modalR')
						@endforeach

					</tbody>
				</table>
			</div>
		 </div>
		</div>
	</div>
</div>
