@extends('master')
@section('konten')

<div class="container-fluid">
                        
    <div class="row" style="font-size: 13px">
        <div class="col-lg-12">
            <div class="card">
              
               
            <div class="card-header">
                {{-- <form method="GET" action="{{ route('cari.rm') }}">
                    <div class="col-md-3" style="float: right">
                    <div class="input-group ">
                        <input type="text" class="form-control" name="cari" placeholder="Nama / No RM" required>
                        <button type="submit" name="search"  class="btn btn-danger">
                            <i class="fa fa-search"></i></button>
                    </div>
                    </div>
                </form>  --}}
                  
                <div class="col-md-6" style="float: right; margin-right : 20px;">
                    <form action="{{ route('filter.pasien') }}" method="GET">
                     
                          <div class="input-group" >
                             <input type="text" class="form-control" name="nama" placeholder="Nama Pasien" required>
  
                             <select name="alamat" class="form-select">
                              <option selected disabled>Pilih Alamat</option>
                              @foreach ($alamat as $alm)
                              <option value="{{ $alm->kode_desa }}">{{ $alm->nama_desa }}</option>
                              @endforeach
                             </select>
                  
                              <button class="input-group-text"  type="submit" name="sortir" title="sortir"><i class="ri-filter-fill"></i></button>
                              <a href="{{ route('rmaster.index') }}" class="input-group-text" title="reset"><i class="ri-refresh-line"></i></a>
                          </div><!-- input-group -->
                      </div>
                  </form>
                    
                    <h4 class="card-title">Rekam Medis Data   </h4>
                    
            </div>
           
                  
                   <div class="card-body">  
                 
                        <table class="table mb-0  table-sm">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>Dusun</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_pasien }}</td>
                                    <td>{{ $item->umur }}</td>
                                    <td>{{ $item['alamat']['nama_desa'] }}</td>
                                    <td>{{ $item->dusun }}</td>
                                    <td>{{ $item->kepala_keluarga }}</td>
                                    <td>

                                        <a href="#Edit{{ $item->id }}"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target=".Edit{{ $item->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @include('Unit.RM.Data.modal_edit_data')

                                        <a href="{{ route('rmaster.show',$item->id) }}" title="Lihat Data" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
                                            @include('Unit.RM.Data.modal_hapus')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                       
                    <br>
                    {{-- {!! $data->render() !!} --}}
                        {{ $data->appends(Request::except('page'))->links() }}
                    </div>

                
            </div>
        </div>
        
       
    </div>
  
</div>


    
@endsection