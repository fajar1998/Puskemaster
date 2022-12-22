@extends('master')
@section('konten')
@section('title', '| Laporan Penerimaan Obat Gudang')



<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('sin.index') }}" class="btn btn-info" style="float: right">Reset</a>
                    <h4 class="card-title">Hasil Filter Penerimaan Gudang</h4>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table mb-0 table-sm">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Kadaluarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gdt as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y');  }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->expired)->translatedFormat('d F Y');  }}</td>
                                    <td> 
                                       
                                       
                                         <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @include('Laporan.SO.SO_Gudang.modal_hapus_penerimaan')
                                       
                                      
                                         
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $gdt->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
        
       
    </div>

</div>



@endsection