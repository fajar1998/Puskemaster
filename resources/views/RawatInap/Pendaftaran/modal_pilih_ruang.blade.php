<div class="modal fade Edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="Edit{{ $item->id }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Form Lanjutan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('watnap.stores') }}" method="POST">
                @csrf
              <input type="hidden" name="id_pas" value="{{ $item->id }}">
              <input type="hidden" name="nik" value="{{ $item->nik }}">
              <input type="hidden" name="no_bpjs" value="{{ $item->no_bpjs }}">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Keluhan</label>
                  <div class="col-sm-10">
                      <input type="text" name="keluhan"  class="form-control" required>
                  </div>
                  </div>
                    <div class="form-group row">
                      <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                      <div class="col-sm-4">
                          <input type="date" name="tgl_masuk"  class="form-control" required>
                      </div>
                      <label for="inputPassword" class="col-sm-2 col-form-label">Ruang Tujuan</label>
                      <div class="col-sm-4">
                        <select class="form-select"required="" name="ruang" >
                          <option selected="" disabled="" value="">Pilih Ruang</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>
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