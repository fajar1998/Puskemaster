@extends('master')
@section('konten')
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<div class="container-fluid">
                        
   
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body ">
                <form method="post" action="{{ route('farmasi.store') }}" >
                    @csrf
                    
                <h4 class="card-title">Entry Pengobatan Pasien
                    <br>
                    <br>
                    Nama Pasien : <strong> {{ $pasien->nama_pasien }}</strong>
                </h4>
               
             
              
            <div class="add_item">
                <div class="row mb-3">
                    <input type="hidden" name="id_pasien" value="{{ $pasien->id }}">
                    <label for="example-text-input" class="col-2 col-form-label">Obat</label>
                    <div class="col-sm-6">
                       {{-- <input type="text" class="form-control" name="id_obat[]" id="obat_name">
                       <div id="ListObat"></div>
                       @csrf --}}

                       <select name="id_obat[]" class="form-select">
                        <option selected disabled>Pilih Obat</option>
                        @foreach ($obat as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                           &nbsp;|&nbsp;
                            {{ $item->jumlah }}
                        </option>
                        @endforeach
                       </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="jumlah_obat[]" placeholder="Jumlah Obat">
                       
                    </div>
                    <div class="col-sm-2">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    </div>
                </div>
                <!-- end row --> 
            </div>
        </div>
            
            <div class="col-md-10">
                <input type="submit" class="btn btn-rounded btn-danger mb-3" style="float: right" value="Submit">
            </div>
        </form>
        </div>
    </div> <!-- end col -->
</div>
  
</div>
<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row mb-4">
                <label for="example-text-input" class="col-2 col-form-label">Obat</label>
                <div class="col-sm-6">
                    <select name="id_obat[]" class="form-select">
                        <option selected disabled>Pilih Obat</option>
                        @foreach ($obat as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                            &nbsp;|&nbsp;
                            {{ $item->jumlah }}
                        </option>
                        @endforeach
                       </select>
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="jumlah_obat[]" placeholder="Jumlah Obat">
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


<script>
    $(document).ready(function(){

        $('#obat_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('farma.obat') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#ListObat').fadeIn();
                        $('#ListObat').html(data);
                    }
                });
            }
        });
    });
</script>

@endsection