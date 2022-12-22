@extends('master')
@section('konten')
<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                    <div class="card-header">
                    <h6 class="card-title">Data Pasien Rawat Inap | {{ $total }}</h6>
                     </div>
                     <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table mb-0 table-sm">
                            <thead class="table-light ">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pasien</th>
                                    <th>NIK</th>
                                    <th>No Bpjs</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <th >{{ $item->nama_pasien }}</th>
                                    {{-- <td>{{ $item['nama']['nama_pasien'] }}</td> --}}
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->no_bpjs}}</td>

                                    <td>
                                        <form action="{{ route('watnap.show',$item->id) }}">
                                            <input type="hidden" name="id_pasien" value="{{ $item->id }}">
                                        <button type="submit"class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                            </button>
                                         
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>

                        {{ $pasien->links() }}
                    </div>

                </div>
            </div>
        </div>
        
       
    </div>
  
</div>

 <!--  Modal content for the above example -->
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Alamat Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('alamat.store') }}" method="POST">
                @csrf
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Desa</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_desa" >
                      </div>
                    </div>
                    <br>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Kode Desa</label>
                      <div class="col-sm-10">
                        <input type="number" name="kode_desa" class="form-control" >
                      </div>
                    </div>
                  
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </form>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection