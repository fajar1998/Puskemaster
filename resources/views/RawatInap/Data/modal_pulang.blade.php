<div class="modal fade Pulang{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="Pulang{{ $item->id }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Pasien Pulang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('watnap.pulang') }}" method="POST">
                @csrf

              <input type="hidden" name="id_pasien" value="{{ $item->id_pasien }}">
              <input type="hidden" name="keluhan" value="{{ $item->keluhan }}">
              <input type="hidden" name="tgl_masuk" value="{{ $item->tgl_masuk }}">
              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-3 col-form-label">Diagnosa</label>
                <div class="col-sm-9">
                    <input type="text" name="diagnosa"  class="form-control" required>
                </div>
                </div>

                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-3 col-form-label">Keterangan Keluar</label>
                  <div class="col-sm-9">
                      <input type="text" name="ket"  class="form-control" required>
                  </div>
                  </div>

                    <div class="form-group row">
                      <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Keluar</label>
                      <div class="col-sm-9">
                          <input type="date" name="tgl_keluar"  class="form-control" required>
                      </div>
                    
                     
                    </div>
                  
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
            </form>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->