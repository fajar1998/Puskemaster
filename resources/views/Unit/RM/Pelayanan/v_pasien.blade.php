@extends('master')
@section('konten')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Rekam Medis Diagnosa</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pasien</th>
                                    <th>Ruang Tujuan</th>
                                    <th >No Antrian</th>
                                    <th>Status Di Farmasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show as $item)
                                    
                                
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_pasien }}</td>
                                    <td>{{ $item->ruang }}</td>
                                    <td >{{ $item->no_antrian }}</td>
                                    <td>
                                    @if ($item->status_farmasi == '1')
                                        <span class="badge bg-danger">Mengantri</span>
                                    @elseif($item->status_farmasi == '2')
                                        <span class="badge bg-success">Sudah Entry</span>
                                    @endif
                                    </td>
                                    {{-- <td>
                                        @if ($item->status_farmasi == '1')
                                        @elseif($item->status_farmasi == '2')
                                        <a href="{{ route('rmplay.edit',$item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endif
                                    </td> --}}

                                    <td>
                                        <a href="{{ route('rmplay.edit',$item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
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


    
@endsection