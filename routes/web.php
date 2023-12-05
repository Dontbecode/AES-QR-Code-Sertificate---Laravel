<?php

use App\Http\Controllers\Generate;
use App\Http\Controllers\Datanilais;
use App\Http\Controllers\ProsesScan;
use App\Http\Controllers\ProsesLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adminsetting;
use App\Http\Controllers\Datamahasiswas;
use App\Http\Controllers\Datasertifikats;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*------------------------------UMUM-----------------------------------------------*? */
Route::get('/', function () {
    return view('dashboard.Umum.index');
});
Route::get('/Kontak', function () {
    return view('dashboard.Umum.layouts.Kontak');
});
Route::get('/Panduan', function () {
    return view('dashboard.Umum.layouts.Panduan');
});

Route::get('/Detail', function () {
    return view('dashboard.Umum.Detail');
});
Route::get('/coba', function () {
    return view('dashboard.Umum.layouts.scans');
});

/*------------------------------Fitur-----------------------------------------------*? */

Route::get('/Scan',[ProsesScan::class,'scan'])->name('Scan');
Route::post('........',[ProsesScan::class,'scan']);
Route::post('/Dekripsi',[ProsesScan::class,'Dekripsi']);
Route::post('/validasi',[ProsesScan::class,'validasiQrcode'])->name('validasi');
Route::post('/Detail',[ProsesScan::class,'detaildata'])->name('detail');
Route::get('.........',[ProsesScan::class,'Cari']);
Route::get('.........',[ProsesScan::class,'CariSertifikat']);
Route::get('.........',[ProsesScan::class,'Sertifikat']);

/*------------------------------Login-----------------------------------------------*? */
Route::get('/login',[ProsesLogin::class,'index'])->name('login');
Route::post('/Masuk',[ProsesLogin::class,'Masuk']);
Route::post('/login/actionlogin',[ProsesLogin::class,'actionlogin']);
Route::get('/logout', [ProsesLogin::class, 'logout']);




/*------------------------------ADMIN-----------------------------------------------*? */
Route::get('/Dashboard/Admin', [Adminsetting::class, 'dashboard']);
// Route::get('/Dashboard/Admin', function () {
//     return view('dashboard.Admin.index');
// });

Route::get('/Dashboard/TambahMahasiswa', function () {
    return view('dashboard.Admin.layouts.DataMahasiswa.TambahMahasiswa');
});

Route::get('/Dashboard/TambahAdmin', function () {
    return view('dashboard.Admin.layouts.Dataadmin.TambahAdmin');
});

Route::get('/Dashboard/Datanilai/Lengkapidata', function () {
    return view('dashboard.Admin.layouts.Datanilai.Lengkapidata');
});
Route::get('/Dashboard/Datasertifikat', function () {
    return view('dashboard.Admin.layouts.Datasertifikat.datasertifikat');
});
Route::get('/Dashboard/Detail', function () {
    return view('dashboard.Admin.layouts.Datasertifikat.Detail');
});
/*------------------------------Data Admin-----------------------------------------------*? */
Route::get('/DataAdmin', [Adminsetting::class, 'index'])->name('Admin');
Route::get('/TambahAdmin', [Adminsetting::class, 'TambahAdmin'])->name('TambahAdmin');
Route::post('/TambahAdmin', [Adminsetting::class, 'store'])->name('AddAdmin');
Route::get('/DataAdmin/{id}', [Adminsetting::class, 'destroy']);
Route::get('/Admin/{id}', [Adminsetting::class, 'generate']);
/*------------------------------Data Mahasiswa-----------------------------------------------*? */
Route::get('/DataMahasiswa',[Datamahasiswas::class,'index'])->name('Mahasiswa');
Route::get('/TambahMahasiswa',[Datamahasiswas::class,'Tambahmahasiswa'])->name('TambahMahasiswa');
Route::post('/TambahMahasiswa',[Datamahasiswas::class,'store'])->name('AddMahasiswa');
Route::get('/HapusMahasiswa/{id}',[Datamahasiswas::class,'destroy']);
Route::get('/EditMahasiswa/{id}',[Datamahasiswas::class,'edit'])->name('EditMahasiswa');
Route::post('/EditMahasiswa/Add/{id}',[Datamahasiswas::class,'update']);

/*------------------------------Data Nilai-----------------------------------------------*? */
Route::get('/DataNilai', [Datanilais::class,'index'])->name('Nilai');
Route::get('/LengkapiData/{id}', [Datanilais::class,'Lengkapidata'])->name('LengkapiData');
Route::post('/LengkapiData/{id}', [Datanilais::class,'Lengkapidata'])->name('LengkapiData');
Route::post('/LengkapiData/Add/{id}', [Datanilais::class,'update']);
Route::get('/DataNilai/{id}', [Datanilais::class,'destroy']);

/*------------------------------Data Sertifikat-----------------------------------------------*? */
Route::get('/DataSertifikat', [Datasertifikats::class,'index'])->name('DataSertifikat');
Route::get('/DataSertifikat/{id}', [Datasertifikats::class,'destroy']);
Route::post('/LengkapiData/Enkrip/{id}', [Datasertifikats::class,'updateenkrip']);

Route::get('/Detail/{id}', [Datasertifikats::class,'detail']);
/*------------------------------Generate Sertifikat-----------------------------------------------*? */
Route::get('/Cetak/{id}', [Generate::class,'generatepdf']);