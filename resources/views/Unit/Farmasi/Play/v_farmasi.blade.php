@extends('master')
@section('konten')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Farmasi Pengobatan</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pasien</th>
                                    <th>Ruang Tujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show as $item)
                                    
                                
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_pasien }}</td>
                                    <td>{{ $item->ruang }}</td>
                                    <td>
                                        <a href="{{ route('farmasi.edit',$item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $show->links() }}

                </div>
            </div>
        </div>
        
       
    </div>
  
</div>


    
@endsection