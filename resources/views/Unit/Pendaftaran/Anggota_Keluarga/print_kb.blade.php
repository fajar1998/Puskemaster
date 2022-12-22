<!DOCTYPE html>
<html>
<head>
<title>
	Kartu Berobat Pasien
</title>

<?php $image_path = '/upload/Logo-Kab-Sambas.png'; ?>
<?php $puskes = '/upload/logo-puskesmas.png'; ?>

<style>
.checkbox-wrapper {
  white-space: nowrap
}
.checkbox {
  vertical-align: top;
  display:inline-block
}
.checkbox-label {
  white-space: normal
  display:inline-block
}

    body{
        border-style: solid;
       
        font-family: Arial, Helvetica, sans-serif;
    }
  
	.kotakjudul {
	
        margin-left: 30px;
        margin-right: 30px;
        margin-top: 20px;
        /* margin-bottom: 20px; */
	text-align: center;
    font-family: Arial, Helvetica, sans-serif;
	}

.judul{
    color: rgb(9, 10, 9);
	text-align: center;
    font-weight: bold;
    font-size: 10px;
    font-family: Arial, Helvetica, sans-serif;

}

.rm{
    color: rgb(9, 10, 9);
	text-align: center;
    font-weight: bold;
    font-size: 90px;
    letter-spacing: 25px;
    font-family: Arial, Helvetica, sans-serif;

}

td{
    color: rgb(9, 10, 9);
    font-weight: normal;
    font-size:35px;
    margin-bottom:0.5em;
    font-family: Arial, Helvetica, sans-serif;
}
table{
    margin-left: 30px;
}

	img {
	float: left;
	margin: 5px;
	}

   
	p {
	text-align: justify;
	font-size: 25px;
	}
   
    
    .alignLeft {
      float:left; 
      margin-right: 1.5em; 
      margin-bottom: 1em;
  }    
    .alignRight { 
     float:right;
     margin-left: 1.5em;
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
        <img class="alignLeft" src="{{ public_path() . $image_path }}" width="100" height="120">
        <img class="alignRight" src="{{ public_path() . $puskes }}" width="100" height="120">
        <div style="font-size: 35px"> PEMERINTAH KABUPATEN SAMBAS <br></div>
       <div style="font-weight: normal; font-size: 35px"> DINAS KESEHATAN<br> </div>
        <div style="font-size: 35px"> PUSKESMAS SENTEBANG <br></div>
        <div style="font-size: 17px; ">Jalan Stadion No.049 Sentebang Kecamatan Jawai <br></div>
        <div style="font-size: 15px ; font-weight: normal ">
            <u>Call center. 08115748878 E-mail: pkm.sentebang@gmail.com Kode Pos 79454</u>
             </div>
    </div>
       

</div>


{{-- <div class="garis"></div>
<div class="garis2"></div> --}}

<div class="judul">
<div style="font-size: 40px"> KARTU BEROBAT PASIEN<br></div>
</div>
<br>
<br>


<table>

    <tr>
        <td style="height:50px;width:300px;">Nama KK</td>
        <td style="width:30px">:</td>
        <td>{{ $cetak[0]->kepala_keluarga }}</td>
    </tr>

    <tr>
        <td style="height:50px">Umur</td>
        <td>:</td>
        <td> 
            {{ \Carbon\Carbon::parse($cetak[0]->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun'); }}
        </td>
      
    </tr>

    <tr>
        <td style="height:50px">Jenis Kelamin</td>
        <td>:</td>
        <td> {{ $cetak[0]->jenkel }}</td>
      
    </tr>




    <tr>
        <td style="height:50px">Alamat</td>
        <td>:</td>
        <td>Desa {{ $cetak[0]['alamat']['nama_desa'] }}</td>
    </tr>

</table>
 <br>
 


<div class="rm">

   
        {{ $cetak[0]->no_rm_keluarga }}


</div>


<div class="judul">
   <div style="font-size: 25px">
   KARTU INI HARUS DIBAWA SETIAP BEROBAT
   </div>
   <div style="font-size: 26px">
   ( UNTUK SEKELUARGA )
    </div>
</div>
  



</body>
</html>
