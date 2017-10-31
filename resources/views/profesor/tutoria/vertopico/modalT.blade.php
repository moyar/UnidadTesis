<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modalT-delete-{{$comment->id_topico}}">
	{{Form::Open(array('action'=>array('TopicoController@eliminar',$comment->id_topico),'method'=>'delete'))}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           
	<input type="hidden" name="tutoriaId" value="{{$comment->tutorias->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar la Materia</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar la Materia</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>