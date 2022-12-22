@extends('master')
@section('konten')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid">
                        
    <div class="row" style="font-size: 15px">
        <div class="col-lg-12">
            <div class="card">
              
               
            <div class="card-header">
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
              
                    <h4 class="card-title">Rekam Medis Data  | {{ $total }} </h4>
                    
                
                </div>
                  
                   <div class="card-body">  
                
                        <table class="table mb-0  table-sm">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>Dusun</th>
                                    <th>Kepala Keluarga</th>
                                    <th>No kartu Berobat</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekdata as $item)
                                <tr>
                                    <td >{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="dropdown">
                                            @include('Unit.RM.Data.modal_edit_data')
                                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-list"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li> 
                                                    <a href="{{ route('rmaster.show',$item->id) }}"class="dropdown-item btn-sm">
                                                    Detail
                                                     </a>
                                                </li>

                                                <li> 
                                                    <a href="#Edit{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".Edit{{ $item->id }}"
                                                        class="dropdown-item  btn-sm ">
                                                    Perbarui
                                                     </a>
                                                </li>
                                                <li>
                                                {{-- <a href="#ModalDelete{{ $item->id }}"  data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                                    class="dropdown-item  btn-sm ">
                                                   Hapus
                                                </a> --}}
                                              </li>
                                            </ul>
                                          </div>
                                         
                                            {{-- @include('Unit.RM.Data.modal_hapus') --}}
                                    </td>
                                    <td>{{ $item->nama_pasien }}</td>

                                    <td>{{ $item->umur }} Tahun</td>
                                    <td>{{ $item['alamat']['nama_desa'] }}</td>
                                    {{-- <td></td> --}}
                                    <td>{{ $item->dusun }}</td>
                                    <td>{{ $item->kepala_keluarga }}</td>
                                    <td>{{ $item->no_rm }}</td>
                                   
                                 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    <br>
                        {{-- @include('Unit.RM.Data.paginate') --}}
                        {{ $rekdata->links() }}
                    </div>

                
            </div>
        </div>
        
       
    </div>
  
</div>

@endsection