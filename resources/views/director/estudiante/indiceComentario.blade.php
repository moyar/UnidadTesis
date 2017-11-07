<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Comentarios </h3>
		<h4>Numero de Comentarios {{$estudiante->comentarios()->count()}}</h4>
	</div>
</div>



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<input type="hidden" name="estudianteId" value="{{$estudiante->id_user}}">
	<div class="table-responsive">
       <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
		
					<thead>
						<tr>
							<th><center>Nombre</center></th>
							<th><center>Fecha creacion</center></th>
							<th><center>Comentario</center></th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($estudiante->comentarios as $comment)
						<tr>
							<td><center>{{ $comment->nombre }}</center></td>
							<td><center>{{ $comment->updated_at }}</center></td>
							<td><center>{{  $comment->comentario }}</center></td>
							<td>
								<a href="{{URL::action('ComentarioController@editd',$comment->id,$estudiante->id_user)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>

								<a href="" data-target="#modalC-delete-{{$comment->id}}" data-toggle="modal"class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								
							</td>
						</tr>
						@include('director.estudiante.modalC')
						@endforeach
					</tbody>
				</table>
			</div>
		 </div>
		</div>
</div>




