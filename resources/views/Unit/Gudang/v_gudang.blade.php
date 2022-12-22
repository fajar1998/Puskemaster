@extends('master')
@section('konten')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
               
                    <div class="card-header">
                        <div class="btn-group " role="group" aria-label="Basic example"  style="float: right">
                            <button type="button" class="btn btn-info " data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Penerimaan</button>
                            <button type="button" class="btn btn-secondary " data-bs-toggle="modal" data-bs-target=".pengeluaran">Pengeluaran</button>
                          </div>
                   
                    <h4 class="card-title">Stock Obat Gudang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>No Batch</th>
                                    <th>Jumlah</th>
                                    <th>Kadaluarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gudang as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->batch }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->expired)->translatedFormat('d F Y');  }}</td>
                                    <td>
                                        @if (auth()->user()->hak_akses == 6)
                                        <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @include('Unit.Gudang.modal_hapus_gudang')
                                        @endif
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $gudang->links() }}

                </div>
            </div>
        </div>
        
       
    </div>
  
   
</div>


<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Penerimaan Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('gudang.store') }}">
                    @csrf
                    <div class="row">
                      <div class="col">
                        <label> Nama Obat</label>
                        <input type="text" class="form-control" placeholder="Nama Obat" name="name">
                      </div>
                      <div class="col">
                        <label> Batch</label>
                        <input type="text" class="form-control" placeholder="Nomor Batch" name="batch">
                      </div>
                    </div>
                <br>
                    <div class="row">
                        <div class="col">
                            <label> Jumlah Obat</label>
                          <input type="number" class="form-control" placeholder="Jumlah" name="jumlah">
                        </div>
                        <div class="col">
                            <label>Kadaluarsa</label>
                          <input type="date" class="form-control" placeholder="Tanggal Kadaluarsa" name="expired">
                        </div>
                      </div>
                  
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade pengeluaran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Pengeluaran Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('gudang.keluar') }}">
                    @csrf
                    <div class="row">
                      <div class="col">
                        <select name="id_obat" class="form-select" >
                            <option value=""> Pilih Obat </option>
                            @foreach ($gudang as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }} </option>
                            @endforeach
                            {{-- <input type="hidden" class="form-control" value="{{ $item->name }}" name="name">
                            <input type="hidden" class="form-control" value="{{ $item->batch }}" name="batch">
                            <input type="hidden" class="form-control" value="{{ $item->expired }}" name="expired"> --}}
                          
                        </select>
                      </div>
                      <div class="col">
                        <input type="number" class="form-control" placeholder="Jumlah" name="jumlah_keluar">
                       
                      </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                          <select name="penerima" class="form-select">
                              <option value="" selected disabled>Penerima</option>
                              <option value="Apotek"> Apotek </option>
                              <option value="Pustu"> Pustu </option>
                              <option value="Poskesdes"> Poskesdes </option>
                              <option value="Rawat Inap"> Rawat Inap </option>
                              <option value="IGD"> IGD </option>
                            
                          </select>
                        </div>
                        
                      </div>
               
                  
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection