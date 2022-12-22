<!DOCTYPE html>
<html>
<head>
<title>
	Kartu Berobat Pasien
</title>

<?php $image_path = '/upload/Logo-Kab-Sambas.png'; ?>
<?php $puskes = '/upload/logo-puskesmas.png'; ?>

<style>

    body{
        border-style: solid;
       
        font-family: Arial, Helvetica, sans-serif;
    }
  
	.kotakjudul {
	
       
        /* margin-bottom: 20px; */
        margin-top: 3px;
	/* text-align: center; */
    font-family: Arial, Helvetica, sans-serif;
	}

.judul{
    color: rgb(9, 10, 9);
	text-align: center;
    font-weight: bold;
    font-size: 9px;
    font-family: Arial, Helvetica, sans-serif;

}

.rm{
    color: rgb(9, 10, 9);
	text-align: center;
    font-weight: bold;
    font-size: 10px;
    letter-spacing: 8px;
    font-family: Arial, Helvetica, sans-serif;

}

td{
    color: rgb(9, 10, 9);
    font-weight: normal;
    font-size:7px;
    margin-bottom:0.5em;
    font-family: Arial, Helvetica, sans-serif;
}
table{
    margin-left: 4px;
    margin-top: 4px;
}

	img {
	float: left;
	margin: 5px;
	}

   

   
    
    .alignLeft {
      float:left; 
      
      margin-right: 0px; 
      margin-bottom: 1em;
  }    
    .alignRight { 
     float:right;
     margin-left: 0px;
     margin-bottom: 1em;

    }

    input:checked {
  height: 50px;
  width: 100px;
}

    .garis{
  border: 0.3px solid rgb(10, 10, 10);
  margin-bottom: 0.1em;

    }
    .garis2{
  border: 1.2px solid rgb(10, 10, 10);
  margin-bottom: 1.5em;
  
    }
</style>
</head>
<body>

<div class="square kotakjudul">
	<div class="judul">
        <img class="alignLeft" src="{{ public_path() . $image_path }}" width="30" height="35">
        <img class="alignRight" src="{{ public_path() . $puskes }}" width="30" height="35">
        <div style="font-size: 7px"> PEMERINTAH KABUPATEN SAMBAS <br></div>
       <div style="font-weight: normal; font-size: 7px"> DINAS KESEHATAN<br> </div>
        <div style="font-size: 6px"> PUSKESMAS SENTEBANG <br></div>
        <div style="font-size: 5px; font-weight: normal">Jalan Stadion No.049 Sentebang Kecamatan Jawai <br></div>
        <div style="font-size: 5px; font-weight: normal ">Call center. 08115748878  <br></div>
        <div style="font-size: 5px ; font-weight: normal ; ">
            <u><i>E-mail: pkm.sentebang@gmail.com Kode Pos 79454</i></u>
             </div>
    </div>
       

</div>


{{-- <div class="garis"></div>
<div class="garis2"></div> --}}

<div class="judul">
<div > KARTU BEROBAT PASIEN<br></div>
</div>



<table>

    <tr>
        <td style="height:8px;width:50px;">Nama KK</td>
        <td style="width:3px">:</td>
        <td>{{ $cetak->kepala_keluarga }}</td>
    </tr>

    <tr>
        <td style="height:8px">Umur</td>
        <td>:</td>
        <td> 
            {{ \Carbon\Carbon::parse($cetak->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun'); }}
        </td>
      
    </tr>

    <tr>
        <td style="height:8px">Jenis Kelamin</td>
        <td>:</td>
        <td> {{ $cetak->jenkel }}</td>
      
    </tr>




    <tr>
        <td style="height:8px">Alamat</td>
        <td>:</td>
        <td>Desa {{ $cetak['alamat']['nama_desa'] }}</td>
    </tr>

</table>

 


<div class="rm" style="margin-top: 6px; margin-bottom: 3px;">

   
        {{ $cetak->no_rm }}


</div>


<div class="judul">
   <div style="font-size: 6px">
   KARTU INI HARUS DIBAWA SETIAP BEROBAT
   </div>

   <div style="font-size: 7px">
   ( UNTUK SATU KELUARGA )
     </div>

</div>
  



</body>
</html>
