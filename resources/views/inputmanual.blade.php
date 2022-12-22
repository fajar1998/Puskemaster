@extends('master')
@section('konten')
@section('title','| Manual Input')
<div class="container-fluid">
                        
    
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
             
                <div class="card-header">
                    <div  style="float: right">
                        <span class="text-danger">Penginputan Kepala Keluarga</span></div>
                  <h4 class="card-title">Form Penginputan Manual Pasien</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('input.store') }}" method="POST">
                      @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="mb-3">
                                  <label class="form-label">Nama Pasien</label>
                                  <input type="text" class="form-control"required="" name="nama_pasien"   >
                              </div>
                          </div>
                         
  
                          <div class="col-md-3">
                              <div class="mb-3">
                                  <label class="form-label">Jenis Kelamin</label>
                                  <select class="form-select"required="" name="jenkel" >
                                      <option selected="" disabled="" value="">Pilih Gender</option>
                                      <option value="L">L</option>
                                      <option value="P">P</option>
                                  </select>
                              </div>
                          </div>

                          <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Umur</label>
                                <input type="number" class="form-control"   name="umur">
                               
                            </div>
                        </div>

                      </div>
                  
                      <div class="row">
                          <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Alamat </label>
                                <select class="form-select"  required="" name="kode_desa">
                                <option value="" disabled selected> Pilih Alamat</option>
                                @foreach ($alamat as $item)
                                <option value="{{ $item->kode_desa }}" > {{ $item->nama_desa }}</option>
                                @endforeach
                              
                              </select>
                               
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Status KK</label>
                                <select class="form-select" name="status_kk" required="">
                                    <option value="" disabled selected> Pilih Status</option>
                                    @foreach ($kk as $item)
                                    <option value="{{ $item->kode_stats }}" > {{ $item->name }}</option>
                                   
                                    @endforeach
                                  </select>
                            </div>
                        </div> --}}
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control"  name="nik" placeholder="NIK">
                               
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nomor BPJS</label>
                                <input type="text" class="form-control"  name="no_bpjs" placeholder="Kosongkan Jika Umum">
                               
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Nomor Register</label>
                                <input type="number" class="form-control"  required="" name="no_register">
                               
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Dusun</label>
                                <input type="text" class="form-control"   name="dusun">
                               
                            </div>
                        </div>

                       

                        <div class="col-md-2">
                            <div class="mb-4">
                                <label class="form-label" style="visibility: hidden">gg</label><br>
                                <button class="btn btn-primary" style="float: left"  type="submit">Simpan</button>
                               
                            </div>
                        </div>
                      </div>

                      </div>
                        

                     
                </form>

              </div>
            </div><!-- end card -->
        </div>
    </div>
</div>





 
@endsection