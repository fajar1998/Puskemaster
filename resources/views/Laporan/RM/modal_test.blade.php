  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Testing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testfilt.rm') }}" method="GET">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <select class="form-select" required>
                                    <option selected disabled value="">Alamat...</option>
                                    @foreach ($alamat as $item)
                                    <option value="{{ $item->id }}" >{{ $item->nama_desa }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Last name</label>
                                <input type="text" class="form-control"required>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <select class="form-select" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label  class="form-label">City</label>
                                <input type="text" class="form-control" 
                                    placeholder="City" required>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Zip</label>
                                <input type="text" class="form-control" id="validationCustom05"
                                    placeholder="Zip" required>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    
               
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save</button>
            </div> </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->