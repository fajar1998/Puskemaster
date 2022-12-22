<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myLargeModalLabel">Tambah Anggota Keluarga</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('anggota.store') }}" method="POST">
              @csrf
                <input type="hidden" name="desa_kode" value="{{ $show[0]->desa_kode }}">
                <input type="hidden" name="kepala_keluarga" value="{{ $show[0]->kepala_keluarga }}">
                <input type="hidden" name="no_rm_kel" value="{{ $show[0]->no_rm_keluarga }}">
                <input type="hidden" name="rm_sum" value="{{ $show[0]->rm_sum }}">
                <input type="hidden" name="dusun" value="{{ $show[0]->dusun }}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="nama" >
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="nik" >
                </div>

                <label class="col-sm-2 col-form-label">No BPJS</label>
                <div class="col-sm-4">
                  <input class="form-control" type="text" name="no_bpjs" >
                </div>
              </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-4">
                    <input class="form-control" type="date" name="tanggal_lahir" >
                </div>

                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                  <select class="form-select" name="status_kk" required="">
                    <option value="" disabled selected> Pilih Status</option>
                    @foreach ($kk as $item)
                    <option value="{{ $item->kode_stats }}" > {{ $item->name }}</option>
                   
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenkel</label>
                <div class="col-sm-4">
                  <select class="form-select"required="" name="jenkel" >
                    <option selected="" disabled="" value="">Pilih Gender</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
                </div>

                {{-- <label class="col-sm-2 col-form-label">Ruang Tujuan</label>
                <div class="col-sm-4">
                  <select class="form-select"required="" name="ruang" id="select2" onchange="chageDropdown2(this.value);">
                    <option selected="" disabled="" value="">Pilih Ruangan</option>
                    <option value="Pemeriksaan Umum">Pemeriksaan Umum</option>
                    <option value="Kesehatan Gigi & Mulut">Kesehatan Gigi & Mulut</option>
                    <option value="Kesehatan Ibu & KB">Kesehatan Ibu & KB</option>
                    <option value="Kesehatan Anak & Imunisasi">Kesehatan Anak & Imunisasi</option>
                    <option value="Administrasi">Administrasi</option>
                    <option value="Laboratorium">Laboratorium</option>
                    <option value="Promosi Kesehatan">Promosi Kesehatan</option>
                </select>
                </div> --}}


              
              </div>

                  
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
          </form>
          </div>


      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->