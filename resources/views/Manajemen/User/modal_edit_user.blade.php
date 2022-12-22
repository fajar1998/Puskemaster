<div class="modal fade Edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="Edit{{ $item->id }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Perbarui Pengguna </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update',$item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Nama Pengguna</label>
                  <div class="col-sm-8">
                      <input class="form-control" type="text" name="name" value="{{ $item->name }}" >
                  </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input class="form-control" type="password" name="password" >
                </div>
              </div>

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-4 col-form-label">Hak Akses</label>
                <div class="col-sm-8">
                  <select name="hak_akses" class="form-select">
                    <option value="1" {{ $item->hak_akses == '1' ? 'selected' : '' }}>Super</option>
                    <option value="2" {{ $item->hak_akses == '2' ? 'selected' : '' }}>Admin </option>
                    <option value="3" {{ $item->hak_akses == '3' ? 'selected' : '' }}>Rekam Medis</option>
                    <option value="4" {{ $item->hak_akses == '4' ? 'selected' : '' }}>Pendaftaran</option>
                    <option value="5" {{ $item->hak_akses == '5' ? 'selected' : '' }}>Farmasi</option>
                    <option value="6" {{ $item->hak_akses == '6' ? 'selected' : '' }}>Rawat Inap</option>
                </select>
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