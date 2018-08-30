<a class="btn btn-sm btn-info" href="{{ route('users.edit', ['id' => $item->id ]) }}">EDIT</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
	DELETE
</button>

<!-- Modal -->
<form method="POST" action="{{ route('users.destroy', ['id' => $item->id ]) }}">
@csrf
@method('delete')

<div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Pengesahan</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		Adakah anda bersetuju untuk menghapuskan data berikut:

		<p>Nama: {{ $item->nama }}</p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-danger">Confirm</button>
	  </div>
	</div>
  </div>
</div>

</form>
