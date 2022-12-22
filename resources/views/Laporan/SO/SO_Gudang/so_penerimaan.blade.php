@extends('master')
@section('konten')
@section('title', '| Laporan Penerimaan Obat Gudang')



<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
               
                    <div class="card-header">
                        <div style="float: right">
                            <form action="{{ route('filterin.gdt') }}" method="GET">
                                <div class="input-group" >
                                   <input type="date" id="sd" name="start" class="form-control filter">
                                   <input type="date" id="ed" name="end" class="form-control filter">
                                    <button class="input-group-text"  type="submit" name="sortir" title="sortir"><i class="ri-filter-fill"></i></button>
                                </div><!-- input-group -->
                            </div>
                        </form>
                    <h4 class="card-title">Laporan Penerimaan Gudang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-sm">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Terima</th>
                                    <th>Kadaluarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($in as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y');  }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->expired)->translatedFormat('d F Y');  }}</td>
                                    <td>
                                        @if (auth()->user()->hak_akses == 6)
                                        <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @include('Laporan.SO.SO_Gudang.modal_hapus_penerimaan')
                                        @endif
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        
       
    </div>
  
  
 
</div>



@endsection