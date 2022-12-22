@extends('master')
@section('konten')
@section('title','| Laporan RM')



<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <button type="button" style="float: right" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Tester</button>
                    @include('Laporan.RM.modal_test') --}}
                                    <h4 class="card-title">Textual inputs</h4>
                                        <br>
                                <form action="{{ route('set.rm') }}" method="GET">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Diagnosa</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_diagnosa" required>
                                                <option selected="" disabled>Pilih Diagnosa</option>
                                                @foreach ($dg as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="jenkel" required>
                                                <option selected="" disabled>Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                              
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_alamat" required>
                                                <option selected="" disabled>Pilih Alamat</option>
                                                @foreach ($alamat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_desa }}</option>
                                                @endforeach
                                              
                                              
                                                </select>
                                        </div>
                                    </div>

{{-- 
                                  <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Umur</label>
                                        <div class="col-2">
                                            <input class="form-control" type="text" placeholder="Dari" name="start_date" >
                                        </div>

                                      -

                                        <div class="col-2">
                                            <input class="form-control" type="text" placeholder="Sampai" name="end_date" >
                                        </div>

                                      
                                    </div> --}}
                                    <!-- end row -->

                                   
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-2">
                                            <input class="form-control" type="date" placeholder="Dari" name="start_date" >
                                        </div>

                                      -

                                        <div class="col-2">
                                            <input class="form-control" type="date" placeholder="Sampai" name="end_date" >
                                        </div>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cetak</button>
                                </form>
                                 
                           

                </div>
            </div>
        </div>
        
       
    </div>
  
</div>



@endsection