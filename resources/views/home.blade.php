@extends('master')
@section('title',' | BERANDA')
@section('konten')
<div class="container-fluid">

    <!-- start page title -->
   
    <!-- end page title -->
    <div class="row">
        <div class="col-md-12">
           
                    <div class="alert alert-success" role="alert">
                       Selamat Datang Di Aplikasi Sistem Informasi Pelayanan Puskesmas Sentebang,
                       Anda login Dengan Role 
                       @if (auth()->user()->hak_akses == 2)
                      <strong>Admin</strong> 
                      @elseif (auth()->user()->hak_akses == 3)
                      <strong>Rawat inap</strong> 
                      @elseif (auth()->user()->hak_akses == 4)
                      <strong>Pendaftaran</strong> 
                      @elseif (auth()->user()->hak_akses == 5)
                      <strong>Rekam Medis</strong> 
                      @elseif (auth()->user()->hak_akses == 6)
                      <strong>Farmasi</strong> 
                       @endif
                      </div>                            
               
        </div><!-- end col -->

    </div><!-- end row -->
    @if (auth()->user()->hak_akses == 2)
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Total Pasien</p>
                            <h4 class="mb-2">{{ $allpasien }}</h4>
                         </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class=" ri-team-line  font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Pasien Laki Laki</p>
                            <h4 class="mb-2">{{ $pslaki }}</h4>
                         </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-men-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->


        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Pasien Perempuan</p>
                            <h4 class="mb-2">{{ $pswomen }}</h4>
                         </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class=" ri-women-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Kepala Keluarga</p>
                            <h4 class="mb-2">{{ $kk }}</h4>
                         </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class=" ri-parent-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->

      
      
     
    </div><!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jumlah  Keluarga Perdesa </h4>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Desa</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kkperdes as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item['alamat']['nama_desa'] }}</td>
                                    <td>{{ $item->total }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jumlah  Pasien Perdesa</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Desa</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($psperdes as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item['alamat']['nama_desa'] }}</td>
                                    <td>{{ $item->total }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
     
    </div>

@endif
</div> <!-- container-fluid -->


@endsection
