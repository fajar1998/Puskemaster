 <!--  Modal content for the above example -->
 <div class="modal fade obat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Rekam Pengobatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('store.obat') }}" method="POST">
                @csrf
               
            <div class="modal-body">
                
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Obat</label>
                    <div class="col-sm-10">
                        <input type="text" id="obat"  name="nama_obat" placeholder="Cari Obat" class="form-control" required>
                        {{-- <select class="cari form-control" name="cari"></select> --}}
                    </div>
                </div>

                

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-3">
                        <input type="text" name="obat" class="form-control" required>
                    </div>
                    <label for="example-text-input" class="col-sm-2 col-form-label">Resep</label>
                    <div class="col-sm-5">
                        <input type="text" name="resep" class="form-control"   required>
                    </div>

                   
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                {{-- <button type="button" class="btn btn-light waves-effect add_data">Save</button> --}}
            </div> 
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->