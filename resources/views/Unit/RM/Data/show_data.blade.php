@extends('master')
@section('konten')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-2">
                <div class="card-header">
                    <h4 class="card-title">Detail Pasien</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-sm" >
                            <tbody>
                                <tr>
                                    <th width="20%">Nama</th>
                                    <td width="1%">:</td>
                                    <td width="35%"><h6>{{ $show->nama_pasien }}</h6></td>
                                    <td width="23%">No RM</td>
                                    <td width="1%">:</td>
                                    <td width="15%">
                                        {{ $show->no_rm }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>:</td>
                                    <td>{{ $show['alamat']['nama_desa'] }}</td>
                                    <td width="20%">Status Dikeluarga</td>
                                    <td >:</td>
                                    <td>{{ $show['kk']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir / Umur</th>
                                    <td>:</td>
                                    <td>{{ Carbon\Carbon::parse($show->tanggal_lahir)->translatedFormat('d F Y'); }} / 
                                        {{ \Carbon\Carbon::parse($show->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun'); }}
                                        {{-- {{ \Carbon\Carbon::parse($show->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days'); }} --}}
                                    </td>
                                    <td width="20%">Kepala Keluarga</td>
                                    <td width="1%">:</td>
                                    <td>{{ $show->kepala_keluarga }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        
    </div>

    <div class="row" style="font-size: 12px;" >

      
        <div class="col-lg-12">
            <div class="card">
                 <div class="card-header">
                <h4 class="card-title" >Riwayat Menginap</h4>
            </div>
                <div class="card-body">
                   
                    
                    <div class="table-responsive">
                        <table class="table mb-0 table-sm ">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Jumlah Hari Menginap</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Keterangan Keluar</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                             
                                @foreach($rwn as $item)
                                <tr>
                                    @if ($item->tgl_keluar == Null)
                                    @elseif(!$item->tgl_keluar == Null)
                                    <th>{{ $loop->iteration }}</th>
                                    <td> {{ Carbon\Carbon::parse($item->tgl_masuk)->translatedFormat('d F Y'); }}</td>
                                   
                                    <td> {{ Carbon\Carbon::parse($item->tgl_keluar)->translatedFormat('d F Y'); }}</td>
                                   
                                    <td> {{ Carbon\Carbon::parse( $item->tgl_masuk )->diffInDays( $item->tgl_keluar ); }} Hari</td>
                                    <td> {{ $item->keluhan }}</td>
                                    <td> {{ $item->diagnosa }}</td>
                                    <td>{{ $item->keterangan_keluar }}</td>
                                    @endif
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        
      
    </div>
    <div class="row" >
 
        <div class="col-lg-12">
            <div class="card">
                 <div class="card-header">
                <h4 class="card-title" >Riwayat Pengobatan</h4>
            </div>
                <div class="card-body">
                   
                    
                    <div class="table-responsive">
                        <table class="table mb-0 table-sm">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Dan Waktu</th>
                                    <th>Pengobatan</th>
                                    <th>Jumlah</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                             
                                @foreach($pengobatan as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td> {{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y'); }}
                                        <br>
                                        {{$item->created_at->format('h:i')}}
                                    </td>
                                    <td>{{ $item['obat']['name'] }}</td>
                                    <td>{{ $item->jumlah_obat }}</td>
                                   
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