@extends('master')
@section('konten')
@section('title', '| Laporan Pengeluaran Obat Gudang')



<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div style="float: right">
                        <form action="{{ route('filter.gdt') }}" method="GET">
                            <div class="input-group" >
                               <input type="date" id="sd" name="start" class="form-control filter">
                               <input type="date" id="ed" name="end" class="form-control filter">
                                <button class="input-group-text"  type="submit" name="sortir" title="sortir"><i class="ri-filter-fill"></i></button>
                            </div><!-- input-group -->
                        </div>
                    </form>
                    <h4 class="card-title">Laporan Pengeluaran Gudang</h4>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Penerima</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Kadaluarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($out as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item['obat']['name'] }}</td>
                                    <td>{{ $item->jumlah_keluar }}</td>
                                    <td>{{ $item->penerima }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y');  }}</td>
                                    <td>{{  Carbon\Carbon::parse($item['obat']['expired'])->translatedFormat('d F Y');  }}</td>
                                    @if (auth()->user()->hak_akses == 6)
                                    <td> 
                                        @if ($item->status == '1')
                                        <form action="{{ route('kirim.stores') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nama_obat" value="{{ $item['obat']['name'] }}">
                                            <input type="hidden" name="jumlah" value="{{ $item->jumlah_keluar }}">
                                            <input type="hidden" name="penerima" value="{{ $item->penerima }}">
                                            <input type="hidden" name="kadaluarsa" value="{{ $item['obat']['expired'] }}">
                                            <input type="hidden" name="tanggal_keluar" value="{{ $item->created_at }}">
                                            <input type="hidden" name="id_obat" value="{{ $item->id_obat }}">
                                       
                                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save" ></i></button>
                                        </form>
                                        @endif
                                        @if($item->status == '2')
                                       
                                         <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @include('Laporan.SO.SO_Gudang.modal_hapus_out')
                                         @endif
                                      
                                         
                                    </td>
                                    @endif
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $out->links() }}
                </div>
            </div>
        </div>
        
       
    </div>
  
  
</div>



@endsection