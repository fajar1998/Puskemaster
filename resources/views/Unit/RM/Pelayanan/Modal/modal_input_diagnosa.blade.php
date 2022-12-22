 <!--  Modal content for the above example -->
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Rekam Diagnosa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('rmplay.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $show->id }}" name="id_pasien">
            <div class="modal-body">
                
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Diagnosa</label>
                    <div class="col-sm-10">
                        <input type="text" id="diagnosa"  name="diagnosa" placeholder="Cari Diagnosa" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal" placeholder="Cari Diagnosa" class="form-control"   required>
                    </div>

                    <label for="example-time-input" class="col-sm-2 col-form-label">Jam</label>
                         <div class="col-sm-4">
                             <input class="form-control" name="waktu" type="time" required>
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