 <!--  Modal content for the above example -->
 <div class="modal fade ruangan{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myLargeModalLabel">Ruang Tujuan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('anggota.update',$item->id) }}" method="POST">
            @method('PUT')
             @csrf

     <input type="hidden" value="{{ $item->id_pasien }}" name="id_pasien">


          <div class="modal-body">
              <div class="row mb-6">
                  <div class="col-sm-12">
                      <select class="form-select"required="" name="ruangan" id="select2">
                          <option selected="" disabled="" value="">Pilih Ruangan</option>
                          <option value="Pemeriksaan Umum">Pemeriksaan Umum</option>
                          <option value="Kesehatan Gigi & Mulut">Kesehatan Gigi & Mulut</option>
                          <option value="Kesehatan Ibu & KB">Kesehatan Ibu & KB</option>
                          <option value="Kesehatan Anak & Imunisasi">Kesehatan Anak & Imunisasi</option>
                          <option value="Administrasi">Administrasi</option>
                          <option value="Laboratorium">Laboratorium</option>
                          <option value="Promosi Kesehatan">Promosi Kesehatan</option>
                      </select>
                  </div>
              </div>
              <!-- end row -->

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-info waves-effect waves-light">Entry</button>
          </div>

      </form>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->