<div class="modal fade ModalDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="ModalDelete{{ $item->id }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Delete Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('sgd2.delete', $item->id) }}">
                {{ method_field('delete') }}
                @csrf
            <div class="modal-body">
                <h5>Anda Yakin Ingin Menghapus  <strong>{{ $item->name }}</strong> ?</h5>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
            </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->