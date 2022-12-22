<div class="modal fade Edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="Edit{{ $item->id }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Perbarui Status </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('statskk.update',$item->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Status</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name"  value="{{ $item->name }}">
                      </div>
                    </div>
                    <br>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Kode Status</label>
                      <div class="col-sm-10">
                        <input type="number" name="kode_stats" class="form-control"  value="{{ $item->kode_stats }}" >
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