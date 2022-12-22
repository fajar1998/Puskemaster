@extends('master')
@section('konten')
@section('title', '| Laporan Penerimaan Obat')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

<div class="container-fluid">
  
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
               
                   
                  <div class="card-header">
                    <a href="{{ route('lsofar.index') }}" style="float: right" class="btn btn-primary btn-sm">
                   Reset</a>
                    <h4 class="card-title">Filter Range Waktu</h4>
                </div>
                <div class="card-body">
                
                    <form action="{{ route('sort.waktu') }}" method="GET">
                       
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Awal</label>
                                        <div id="datepicker2" >
                                        <input type="text" name="start" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container="#datepicker2" data-provide="datepicker" data-date-autoclose="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" >Tanggal Akhir</label>
                                        <div id="datepicker2" >
                                            <input type="text" name="end" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container="#datepicker2" data-provide="datepicker" data-date-autoclose="true">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label" style="visibility: hidden">Tanggal Akhir</label>
                                        <div >
                                            <button type="submit" class="btn btn-info" name="filter">Sortir</button>
                                            </div>
                                    </div>
                                </div>
                               
                            </div>

                      
                    
                      
                  
                </form>

                </div>
            </div>
        </div>
        
       
    </div>

    <div class="row" >
        <div class="col-lg-12">
            <div class="card">
                
                    <div class="card-header">
                  
                    <h4 class="card-title">Laporan Penerimaan Obat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-sm">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>No Batch</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Terima</th>
                                    <th>Kadaluarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apint as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->batch }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y');  }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->expired)->translatedFormat('d F Y');  }}</td>
                                    <td>
                                        @if (auth()->user()->hak_akses == 6)
                                        <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            @include('Laporan.SO.SO_Farmasi.modal_hapus_penerimaan')
                                            @endif
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                 
                    {{ $apint->appends(Request::except('page'))->links() }}
                </div>
            </div>
        </div>
        
       
    </div>
  
  
 
</div>


<script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endsection