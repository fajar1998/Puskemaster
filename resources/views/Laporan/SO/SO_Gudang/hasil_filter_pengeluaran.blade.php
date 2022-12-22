@extends('master')
@section('konten')
@section('title', '| Laporan Pengeluaran Obat Gudang')


<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('sout.index') }}" class="btn btn-info" style="float: right">Reset</a>
                    <h4 class="card-title">Hasil Filter Pengeluaran Gudang</h4>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="example2" class="table mb-0 table-sm">

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
                                @foreach ($gdt as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_obat }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->penerima }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y');  }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->expired)->translatedFormat('d F Y');  }}</td>
                                    <td> 
                                       
                                       
                                         <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @include('Laporan.SO.SO_Gudang.modalhapus')
                                       
                                      
                                         
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