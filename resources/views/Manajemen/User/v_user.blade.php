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
                <h4 class="card-title">Manajemen Pengguna</h4>
                 </div>
                <div class="card-body">
                   
                    <div class="table-responsive">
                        <table class="table mb-0 table-sm">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pengguna</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    
                                
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                                    @if ($item->hak_akses == '1')
                                                        <span class="badge bg-danger"> Super Admin</span>
                                                    @elseif($item->hak_akses == '2')
                                                        <span class="badge bg-success"> Admin</span>
                                                    @elseif($item->hak_akses == '5')
                                                        <span class="badge bg-primary"> Rekam medis</span>
                                                    @elseif($item->hak_akses == '4')
                                                        <span class="badge bg-warning">Pendaftaran</span>
                                                    @elseif($item->hak_akses == '6')
                                                        <span class="badge bg-info"> Farmasi</span>
                                                    @elseif($item->hak_akses == '3')
                                                        <span class="badge bg-dark"> Rawat Inap</span>
                                                    
                                                    @endif
                                    </td>
                                    <td>
                                        <a href="#Edit{{ $item->id }}"  class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target=".Edit{{ $item->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @include('Manajemen.User.modal_edit_user')
                                        <a href="#ModalDelete{{ $item->id }}" data-bs-toggle="modal" data-bs-target=".ModalDelete{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @include('Manajemen.User.modal_hapus_user')
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Status Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Nama Pengguna</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="name" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="password" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Hak Akses</label>
                    <div class="col-sm-8">
                        <select name="hak_akses" class="form-select">
                            <option disabled selected>--</option>
                            <option value="2">Admin</option>
                            <option value="5">Rekam Medis</option>
                            <option value="4">Pendaftaran</option>
                            <option value="6">Farmasi</option>
                            <option value="3">Rawat Inap</option>
                        </select>
                    </div>
                </div>
                   
                  
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
            </form>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection