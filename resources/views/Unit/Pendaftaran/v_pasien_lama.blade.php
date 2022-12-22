@extends('master')
@section('konten')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style rel="stylesheet" type="text/css">

th {
  font-family: "Trebuchet MS", Arial, Verdana;
  font-size: 15px;
  padding: 5px;
  border-bottom-style: solid;
  border-bottom-color: #fcfbf9;
  background-color: #fcfbf9;
  color: #000000;
}
    
    
    
    </style>

<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
               
                   <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead >
                               
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th>Status DiKeluarga</th>
                                    <th>Desa</th>
                                    <th>Dusun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien_rm as $item)
                                <tr>
                                  

                                    <td >{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_pasien }}</td>
                                    <td>{{ $item->umur }}</td>
                                    <td>{{ $item['kk']['name'] }}</td>
                                    <td>{{ $item['alamat']['nama_desa'] }}</td>
                                    <td>{{ $item->dusun }}</td>
                                    <td>
                                        <form action="{{ route('anggota.show',$item->id) }}" >
                                         <input type="hidden" value="{{ $item->no_rm_keluarga }}" name="rm">
                                            <button type="submit" class="btn btn-info btn-sm">
                                             <i class="fa fa-eye"></i>
                                            </button>
                                         </form>
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