@extends('master')
@section('konten')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="row" style="font-size: 14px;">
        <div class="col-lg-12">
            <div class="card">  
                <div class="card-header">
                    <div class="btn-group " role="group" aria-label="Basic example" style="float: right">
                        {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Input Diagnosa</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target=".obat">Input Pengobatan</button> --}}
                      </div>
                    <h5 class="card-title">RM
                       <strong> {{ $show->no_rm }}</strong>
                    </h5>
                </div>
                <div class="card-body">
                 
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th width="16%">Nama</th>
                                    <td width="1%">:</td>
                                    <td width="20%">{{ $show->nama_pasien }}</td>
                                    <td width="5%">Ruang tujuan</td>
                                    <td width="1%">:</td>
                                    <td width="20%">
                                        {{ $show->ruang }}
                                    </td>
                                </tr>
                              
                                <tr>
                                    <th>Umur</th>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($show->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun'); }}
                                        {{-- {{ \Carbon\Carbon::parse($show->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days'); }} --}}
                                    </td>
                                    <td width="16%">Kepala Keluarga</td>
                                    <td width="1%">:</td>
                                    <td  width="15%">{{ $show->kepala_keluarga }}</td>
                                </tr>
                               
                            </tbody>
                            
                        </table>
                        
                    </div>
                </div>
                 
            </div>
            
        </div>
        
    </div>

   

    <div class="row" style="font-size: 12px;">
        @if ($diag->isEmpty())

       
        @elseif(!$diag->isEmpty())
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h6>Riwayat Diagnosa</h6>
                </div>
                   <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead >
                               
                                <tr>
                                    <th>#</th>
                                    <th>Diagnosa</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diag as $item)
                                <tr>
                                    <td >{{$loop->iteration }}</td>
                                    <td>{{ $item->diagnosa }}</td>
                                    <td> {{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y'); }}</td>
                                   
                                    <td>{{ $item->waktu }}</td>
                                  
                                   
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($diag->isEmpty())

       
        @elseif(!$diag->isEmpty())
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h6>Riwayat Pengobatan</h6>
                </div>
                   <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead >
                               
                                <tr>
                                    <th>#</th>
                                    <th>Diagnosa</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diag as $item)
                                <tr>
                                    <td >{{$loop->iteration }}</td>
                                    <td>{{ $item->diagnosa }}</td>
                                    <td> {{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y'); }}</td>
                                   
                                    <td>{{ $item->waktu }}</td>
                                  
                                   
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
       
    </div>
</div>


@include('Unit.RM.Pelayanan.Modal.modal_input_diagnosa')
@include('Unit.RM.Pelayanan.Modal.modal_input_pengobatan')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script type="text/javascript">
    var obat = "{{ route('load.rmplay') }}";
    $('#diagnosa').typeahead({
            source: function (query, process) {
                return $.get(obat, {
                    query: query
                }, function (data) {
                    return process(data);
                })
            }
        })
</script>

<script type="text/javascript">
  var path = "{{ route('load.obat') }}";
  var id_obat = $(this).data('id');
    $('#obat').typeahead({
            source: function (query, process) {
                return $.get(path, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
       
</script>



@endsection