@extends('master')
@section('konten')


<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              
                    <div class="card-header">
                    <h4 class="card-title">Stock Obat Expired Farmasi</h4>
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
                                    <th>Kadaluarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ap as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->batch }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->expired)->translatedFormat('d F Y');  }}</td>
                                    <td>
                                        <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @include('Unit.Farmasi.SO.modal_hapus_expired')
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        @include('Unit.Farmasi.SO.paginateexpired')
                    </div>

                </div>
            </div>
        </div>
        
       
    </div>
  
  
 
</div>


@endsection