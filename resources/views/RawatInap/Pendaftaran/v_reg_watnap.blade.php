@extends('master')
@section('konten')
@section('title','| Rawat Inap')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid">
                        
    
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
             
                <div class="card-header">
                    <form method="GET" action="{{ route('pasien_watnap.cari') }}">
                        <div class="col-md-3" style="float: right">
                     
                      
                        <div class="input-group ">
                            <input type="text" class="form-control" id="nama_pasien"  name="cari" placeholder="No Kartu Berobat" required>
                            <button type="submit" name="search"  class="btn btn-danger">
                                <i class="fa fa-search"></i></button>

                                <a href="{{ route('print.kartu_berobat') }}" target="_blank" title="Cetak kartu berobat" class="btn btn-info">
                                    <i class="ri-printer-fill"></i></a>  
                                 
                        </div>
                      </div>
                  </form>
                  <h4 class="card-title">Form Pendaftaran Rawat inap </h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('watnap.store') }}" method="POST">
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
                                  <label class="form-label">Tanggal Lahir</label>
                                  <input type="date" class="form-control"  required="" name="tanggal_lahir">
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
                      </div>
                  
                      <div class="row">
                          <div class="col-md-4">
                              <div class="mb-3">
                                  <label class="form-label">Kepala Keluarga</label>
                                  <input type="text" class="form-control"  required="" name="kepala_keluarga">
                                 
                              </div>
                          </div>
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
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Status KK</label>
                                <select class="form-select" name="status_kk" required="">
                                    <option value="" disabled selected> Pilih Status</option>
                                    @foreach ($kk as $item)
                                    <option value="{{ $item->kode_stats }}" > {{ $item->name }}</option>
                                   
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control"  name="nik" placeholder="NIK">
                               
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Pembayaran</label>
                                <select class="form-select"required="" name="pembayaran" id="select2" onchange="chageDropdown2(this.value);">
                                    <option selected="" disabled="" value="">---</option>
                                    <option value="BPJS">BPJS</option>
                                    <option value="UMUM">UMUM</option>
                                </select>
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
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Dusun</label>
                                <input type="text" class="form-control"  required="" name="dusun">
                               
                            </div>
                        </div>
                        <div class="col-md-6">
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