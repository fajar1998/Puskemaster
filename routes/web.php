<?php

use App\Http\Controllers\AnggotaKeluarga;
use App\Http\Controllers\InputManualPasienController;
use App\Http\Controllers\Laporan\LapSoGudangController;
use App\Http\Controllers\Laporan\RMLapController;
use App\Http\Controllers\Logout;
use App\Http\Controllers\Manajemen\AlamatController;
use App\Http\Controllers\Manajemen\StatusKKController;
use App\Http\Controllers\Unit\FarmasiController;
use App\Http\Controllers\Unit\PendaftaranController;
use App\Http\Controllers\Unit\RekmedMasterController;
use App\Http\Controllers\Unit\RekmedPlayController;
use App\Http\Controllers\Unit\SoApotekController;
use App\Http\Controllers\Unit\SoGudangController;
use App\Http\Controllers\Laporan\SoFarmasiController;
use App\Http\Controllers\Manajemen\DiagnosaController;
use App\Http\Controllers\Manajemen\UserController;
use App\Http\Controllers\RawatInap\RawatInapController;
use App\Http\Controllers\Unit\SoApotekExpired;
use App\Models\PasienMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['middleware' => 'prevent-back-history'],function(){
    
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logouts', [Logout::class, 'Logout'])->name('admin.logout');
Auth::routes();

// Route::group(['middleware' => ['admin']],function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });// End Midleware Admin




Route::group(['middleware' => ['pendaftaran']],function(){
Route::resource('pendaftaran',PendaftaranController::class);
Route::get('/cari_pasien', [PendaftaranController::class, 'Cari'])->name('pasien_lama.cari');
Route::get('/autopasien', [PendaftaranController::class, 'autoPasien'])->name('auto.cari');
Route::get('/print_kartu_berobat', [PendaftaranController::class, 'Print_Card'])->name('print.kartu_berobat');

});// End Midleware Pendaftaran & Watnap



Route::group(['middleware' => ['datakeluarga']],function(){
Route::post('/agt/keluarga', [AnggotaKeluarga::class, 'StoreAnggotaKeluarga'])->name('agt.store');
Route::resource('anggota',AnggotaKeluarga::class);
Route::get('/print_kb', [AnggotaKeluarga::class, 'Print_Card'])->name('print.kbg');
});// End Midleware Pendaftaran & Watnap


Route::group(['middleware' => ['rekmed']],function(){
Route::resource('rmplay',RekmedPlayController::class);
Route::get('/loadrm', [RekmedPlayController::class, 'LoadDiagnosa'])->name('load.rmplay');
Route::get('/loadobat', [RekmedPlayController::class, 'loadObat'])->name('load.obat');
Route::post('/storeObat', [RekmedPlayController::class, 'StoreObat'])->name('store.obat');
Route::resource('rmaster',RekmedMasterController::class);
Route::get('/cari/no_rm', [RekmedMasterController::class, 'Cari'])->name('cari.rm');
Route::get('/print_kb/{id}', [RekmedMasterController::class, 'Print_Card'])->name('print.card');
Route::get('/filter/pasien', [RekmedMasterController::class, 'Filter'])->name('filter.pasien');
});// End Midleware Pendaftaran & Watnap





Route::group(['middleware' => ['admin']],function(){
Route::resource('alamat',AlamatController::class);
Route::resource('diagnosa',DiagnosaController::class);
Route::resource('statskk',StatusKKController::class);
Route::resource('user',UserController::class);
Route::get('/input/manual', [InputManualPasienController::class, 'Index'])->name('input.manual');
Route::post('/input/store', [InputManualPasienController::class, 'store'])->name('input.store');
});// End Midleware Admin




// Route::get('/laporan/rm', [RMLapController::class, 'View'])->name('laporan.rm');
// Route::get('/laporan/rm/set', [RMLapController::class, 'Set'])->name('set.rm');
// Route::get('/laporan/rm/test', [RMLapController::class, 'TestFilt'])->name('testfilt.rm');


Route::group(['middleware' => ['farmasi']],function(){
Route::resource('sap',SoApotekController::class);
Route::resource('sed',SoApotekExpired::class);
Route::resource('farmasi',FarmasiController::class);
Route::post('fetch/farmasi/get_obat', [FarmasiController::class, 'Get_Obat'])->name('farma.obat');
Route::resource('lsofar',SoFarmasiController::class);
Route::get('/lap/pengeluaran', [SoFarmasiController::class, 'indexPengeluaran'])->name('lap.sot');
Route::get('/sortir/farmasi', [SoFarmasiController::class, 'SortWaktu'])->name('sort.waktu');
Route::get('/sortir/farmasi_keluar', [SoFarmasiController::class, 'SortWaktuKeluar'])->name('sort.waktukl');
Route::delete('/pengeluaran/farmasi/hapus/{id}', [SoFarmasiController::class, 'HapusPengeluaran'])->name('lptkl.delete');
Route::post('/pengeluaran/farmasi/delete', [SoFarmasiController::class, 'Kirim'])->name('kirim.obat.farmasi');
Route::resource('gudang',SoGudangController::class);
Route::post('/gudang/pengeluaran', [SoGudangController::class, 'PengeluaranObat'])->name('gudang.keluar');
Route::post('/gout', [SoGudangController::class, 'Kirim'])->name('kirim.stores');
Route::get('/sogudang/pengeluaran', [LapSoGudangController::class, 'Index_Pengeluaran'])->name('sout.index');
Route::get('/sogudang/penerimaan', [LapSoGudangController::class, 'Index_Penerimaan'])->name('sin.index');
Route::delete('/sogudangHapus/{id}', [LapSoGudangController::class, 'Hapus'])->name('delete.sogout');
Route::delete('/sgdHapus/{id}', [LapSoGudangController::class, 'HapusFinal'])->name('sgd.delete');
Route::get('/filtersod', [LapSoGudangController::class, 'Filter'])->name('filter.gdt');
Route::get('/filterin', [LapSoGudangController::class, 'FilterPenerimaan'])->name('filterin.gdt');
Route::delete('/penerimaan/gudang/hapus/{id}', [LapSoGudangController::class, 'HapusPenerimaan'])->name('sgd2.delete');
});// End Midleware Farmasi

Route::group(['middleware' => ['watnap']],function(){
Route::resource('watnap',RawatInapController::class);
Route::get('/cari_pasien_watnap', [RawatInapController::class, 'Cari'])->name('pasien_watnap.cari');
Route::get('/watnaplist', [RawatInapController::class, 'Alihkan'])->name('watnap.alih');
Route::post('/watnapstore', [RawatInapController::class, 'Stores'])->name('watnap.stores');
Route::get('/watnapData', [RawatInapController::class, 'Data'])->name('watnap.data');
Route::get('/menginap', [RawatInapController::class, 'Menginap'])->name('watnap.list');
Route::post('/pulanginap', [RawatInapController::class, 'IsiPulang'])->name('watnap.pulang');
});// End Midleware Rawat Inap

});
