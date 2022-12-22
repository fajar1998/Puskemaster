@extends('master')
@section('konten')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                    <div class="card-header">
                        <button class="btn btn-info btn-sm" style="float: right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                            <i class="fa fa-plus"></i>
                        </button>
                    <h4 class="card-title">Manajemen Alamat</h4>
                     </div>
                     <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Desa</th>
                                    <th>Kode Desa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alamat as $item)
                                    
                                
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_desa }}</td>
                                    <td>{{ $item->kode_desa }}</td>
                                    <td>
                                        <a href="#Edit{{ $item->id }}"  class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target=".Edit{{ $item->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @include('Manajemen.Alamat.edit_alamat')
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