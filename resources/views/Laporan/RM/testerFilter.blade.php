@extends('master')
@section('konten')


<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header"><h4 class="card-title"> {{ $allData[0]['diagnosa']['name'] }}</h4>
                     </div>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pasien</th>
                                    <th>Pembayaran</th>
                                    <th>Gender</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $item)
                                    
                                
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item['pasien']['nama_pasien'] }}</td>
                                    <td>{{ $item->bayar }}</td>
                                    <td>{{ $item->jenkel }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y');  }}</td>
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