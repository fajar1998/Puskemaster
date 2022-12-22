@extends('master')
@section('konten')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid">
                        
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              
                    <div class="card-header">
                      
                        <div class="btn-group" role="group" aria-label="Basic example" style="float: right" >
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Obat Keluar</button>
                            <button type="button" class="btn btn-danger "data-bs-toggle="modal" data-bs-target=".bs2" title="Notification"><i class="ri-notification-3-fill"></i>
                                <span class="badge badge-light">{{ $total_notif }}</span></button>
                          </div>
                    <h4 class="card-title">Stock Obat Farmasi</h4>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>No Batch</th>
                                    <th>Jumlah</th>
                                    <th>Kadaluarsa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ap as $item)
                                <tr>
                                    <th >{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->batch }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{  Carbon\Carbon::parse($item->expired)->translatedFormat('d F Y');  }}</td>
                                    
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        @include('Unit.Farmasi.SO.paginate')
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
                                                                <h5 class="modal-title" id="myLargeModalLabel">Obat Keluar</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="post" action="{{ route('sap.store') }}" >
                                                                @csrf
                                                            <div class="modal-body">
                                                                <div class="add_item">
                                                                <div class="row mb-3">
                                                                 
                                                                    <label for="example-text-input" class="col-2 col-form-label">Nama Obat</label>
                                                                    <div class="col-sm-6">
                                                                       {{-- <input type="text" class="form-control" name="id_obat[]" id="obat_name">
                                                                       <div id="ListObat"></div>
                                                                       @csrf --}}
                                                
                                                                       <select name="id_obat[]" class="form-select">
                                                                        <option selected disabled>Pilih Obat</option>
                                                                        @foreach ($obat as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @endforeach
                                                                       </select>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <input type="number" class="form-control" name="jumlah_obat[]" placeholder="Jumlah">
                                                                       
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                                    </div>

                                                       
                                                                </div>
             
                                                             
                                                            </div>
                                                       
                                                            </div>

                                                        
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                                            </div>
                                                        </form>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <div style="visibility: hidden;">
                                                    <div class="whole_extra_item_add" id="whole_extra_item_add">
                                                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                                            <div class="row mb-4">
                                                                <label for="example-text-input" class="col-2 col-form-label">Nama Obat</label>
                                                                <div class="col-sm-6">
                                                                    <select name="id_obat[]" class="form-select">
                                                                        <option selected disabled>Pilih Obat</option>
                                                                        @foreach ($obat as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @endforeach
                                                                       </select>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <input type="number" class="form-control" name="jumlah_obat[]" placeholder="Jumlah">
                                                                </div>
                                                                <div class="col-2" >
                                                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                                
                                                                </div>{{-- end col-md-2 --}}
                                                            </div>
                                                
                                                            
                                                        </div>
                                                    </div>
                                                
                                                </div>

                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        var counter = 0;
                                                        $(document).on("click", ".addeventmore", function() {
                                                            var whole_extra_item_add = $('#whole_extra_item_add').html();
                                                            $(this).closest(".add_item").append(whole_extra_item_add);
                                                            counter++;
                                                        });
                                                        $(document).on("click", '.removeeventmore', function(event) {
                                                            $(this).closest(".delete_whole_extra_item_add").remove();
                                                            counter -= 1;
                                                        });
                                                    });
                                                </script>

  <!--  Modal content for the above example -->
  <div class="modal fade bs2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Pemberitahuan Obat Kadaluarsa Per 7 Hari</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
                    <div class="col-lg-12">
                        
                                <div class="table-responsive ">
                                    <table class="table mb-0 table-sm ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Obat</th>
                                                <th>Batch</th>
                                                <th>Stock</th>
                                                <th>Kadaluarsa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($notif as $value)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->batch }}</td>
                                                <td>{{ $value->jumlah }}</td>
                                                <td> {{ Carbon\Carbon::parse($value->expired)->diffForHumans()}}</td>
                                               
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                               
                        </div>
                 
                    </div></div>
                 
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                                             
@endsection