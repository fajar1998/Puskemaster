<div class="modal fade Edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="Edit{{ $item->id }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Ubah Data Pasien </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rmaster.update',$item->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="row mb-3">
                  <label for="example-text-input" class="col-3 col-form-label">Nama Pasien</label>
                  <div class="col-sm-9">
                      <input class="form-control" type="text" value="{{ $item->nama_pasien }}" name="nama">
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="number" value="{{ $item->nik }}" name="nik">
                    </div>
  
                    <label for="example-text-input" class="col-2 col-form-label">BPJS</label>
                    <div class="col-sm-3" >
                        <input class="form-control" type="text" value="{{ $item->no_npjs }}" name="bpjs">
                    </div>
                </div>

                


                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal Lahir
                    <span class="badge bg-danger badge-sm" style="font-size: 10px">Thn-Bln-Tgl</span>
                  </label>
                  
                  <div class="col-sm-4" >
                        <input type="text"  class="form-control" value="{{ date('Y-m-d',strtotime($item->tanggal_lahir)) }}" name="tgl_lahir">
                  </div>

                  <label for="example-text-input" class="col-2 col-form-label">Gender</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="jenkel">
                      <option value="L" {{ $item->jenkel == 'L' ? 'selected' : '' }}>L</option>
                      <option value="P" {{ $item->jenkel == 'P' ? 'selected' : '' }}>P</option>
                  </select>
                  </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-3 col-form-label">Kepala Keluarga</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" value="{{ $item->kepala_keluarga }}" name="kk">
                </div>
              </div>


                   
                  
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </form>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

