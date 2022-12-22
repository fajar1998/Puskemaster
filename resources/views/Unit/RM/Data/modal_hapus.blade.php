<div class="modal fade ModalDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog " id="ModalDelete{{ $item->id }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Hapus Data </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rmaster.destroy',$item->id) }}" method="POST">
                @csrf
                @method('delete')
                    <input type="hidden" name="nama_pasien" value="{{ $item->nama_pasien }}">
                <p>Anda Yakin ingin Menghapus  <strong>{{ $item->nama_pasien }}</strong> ?</p>
                menghapus Pasien mempengaruhi Kalkulasi Nomor RM
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
            </form>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->