@extends('master')
@section('konten')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                        <form action="{{ route('print.kbg') }}" method="GET">
                            @csrf
                            <input type="hidden" name="rm" value="{{ $show[0]->no_rm_keluarga }}">
                        <button type="submit" class="btn btn-primary btn-sm" formtarget="_blank">Cetak Kartu Berobat</button>
                    </form>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Tambah Anggota keluarga</button>
                      </div>
                    
                   <h6> Data Dari Keluarga <strong>{{ $show[0]->nama_pasien }}</strong></h6>
                   @include('Unit.Pendaftaran.Anggota_Keluarga.modal_add_anggota') 
                </div>
               
                   <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead >
                               
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pasien</th>
                                    <th>No kartu Berobat</th>
                                    <th>Status DiKeluarga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show as $item)
                                <tr>
                                    <td >{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_pasien }}</td>
                                    <td>{{ $item->no_rm }}</td>
                                    <td>{{ $item['kk']['name'] }}</td>
                                   <td>
                                    @if (auth()->user()->hak_akses == 4)
                                        <a href="#ruangan{{ $item->id }}" class="btn btn-danger btn-sm" title="Berobat"  data-bs-toggle="modal" data-bs-target=".ruangan{{ $item->id }}">
                                            <i class="fas fa-medkit"></i>
                                        </a>
                                    @endif   
                                     @include('Unit.Pendaftaran.Anggota_Keluarga.modal_pilih_ruang') 
                                     @if (auth()->user()->hak_akses == 3)
                                     <a href="#Edit{{ $item->id }}"  class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target=".Edit{{ $item->id }}">
                                        Menginap
                                      </a>
                                 @include('Unit.Pendaftaran.Anggota_Keluarga.modal_pilih_ruang_inap') 
                                 @endif
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <br>
                       
                    </div>

                </div>
            </div>
        </div>
        
       
    </div>
  
</div>






<script>
    function chageDropdown2()
    {
        var state=document.getElementById("select2").value;
        // alert(state);
        if(state =="Administrasi"  )
        {
        document.getElementById("adm").style.visibility='visible';
    }else{
        document.getElementById("adm").style.visibility='hidden';
    
    }
    }
</script> 
@endsection