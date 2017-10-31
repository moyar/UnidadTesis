<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modalT-delete-{{$comment->id_respuesta}}">
	{{Form::Open(array('action'=>array('RespuestaController@eliminar',$comment->id_respuesta),'method'=>'delete'))}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           
	<input type="hidden" name="topicoId" value="{{$comment->topicos->id_topico}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar la Respuesta</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar la Respuesta</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>