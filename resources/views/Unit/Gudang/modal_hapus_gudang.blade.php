<div class="modal fade ModalDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="ModalDelete{{ $item->id }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Hapus Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('gudang.destroy', $item->id) }}">
                {{ method_field('delete')}}
                @csrf
            <div class="modal-body">
                <h6>Anda Yakin Ingin Menghapus  <strong>{{ $item->name }}</strong> ?</h6>
                <p>Hapus Stock Juga Menghapus Data <strong>{{ $item->name }}</strong> Pada Laporan,
                Pastikan Data Laporan sudah Di validasi </p>
            </div>
            <input type="hidden" value="{{ $item->id }}" name="id_obat">
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
            </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->