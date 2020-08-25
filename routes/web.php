<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pendaftaran-siswa','RegisterController@index');
Route::post('/pendaftaran-siswa','RegisterController@post');

Route::group(['prefix'=>'admin'],function(){
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/logout','AuthAdmin\LoginController@logout')->name('admin.logout');
    
    //admin dashboard
    Route::get('/', 'Admin\AdminController@index')->name('admin.beranda');

    //admin data admin
    Route::resource('/data-admin','Admin\DataAdminController');    
    Route::get('api/data-admin',[
        'uses' => 'Admin\DataAdminController@apiDataAdmin',
        'as' => 'api.data.admin',]);
    //admin data guru
    Route::resource('/data-guru','Admin\DataGuruController');    
    Route::get('api/data-guru',[
        'uses' => 'Admin\DataGuruController@apiDataGuru',
        'as' => 'api.data.guru',]);
    //admin data kelas
    Route::resource('/data-kelas','Admin\DataKelasController');    
    Route::get('api/data-kelas',[
        'uses' => 'Admin\DataKelasController@apiDataKelas',
        'as' => 'api.data.kelas',]);
    //admin data mata pelajaran
    Route::resource('/data-mapel','Admin\DataMapelController');    
    Route::get('api/data-mapel',[
        'uses' => 'Admin\DataMapelController@apiDataMapel',
        'as' => 'api.data.mapel',]);
        
});

Route::group(['prefix'=>'guru'],function(){
    Route::get('/login', 'AuthGuru\LoginController@showLoginForm')->name('guru.login');
    Route::post('/login', 'AuthGuru\LoginController@login')->name('guru.login.submit');
    Route::get('/logout','AuthGuru\LoginController@logout')->name('guru.logout');
    Route::get('/', 'Guru\GuruController@index')->name('guru.beranda');

    //guru jadwal mata pelajaran
    Route::resource('/jadwal-mapel','Guru\JadwalMapelController');    
    Route::get('api/jadwal-mapel',[
        'uses' => 'Guru\JadwalMapelController@apiJadwalMapel',
        'as' => 'api.jadwal.mapel',]);
    //guru absensi
    Route::get('/absensi','Guru\AbsensiController@index');    
    Route::get('api/absensi',[
        'uses' => 'Guru\AbsensiController@apiAbsensi',
        'as' => 'api.absensi',]);
    //guru absensi detail
    Route::resource('/absensi-detail','Guru\AbsensiDetailController');    
    Route::post('/absensi-detail/selesai/{id}','Guru\AbsensiDetailController@updateSelesai');    
    Route::get('/absensi-detail/lihat/{id}','Guru\AbsensiDetailController@lihat');    
    Route::get('/print/{id}','Guru\AbsensiDetailController@print');    

    // Laporan absensi
    Route::geet('laporan-absensi','Guru\LaporanController@laporanPerMapel');

});

Route::group(['prefix'=>'siswa'],function(){
    Route::get('/', 'Siswa\SiswaController@index')->name('siswa.beranda');
    Route::get('/login', 'AuthSiswa\LoginController@showLoginForm')->name('siswa.login');
    Route::post('/login', 'AuthSiswa\LoginController@login')->name('siswa.login.submit');
    Route::get('/logout','AuthSiswa\LoginController@logout')->name('siswa.logout');

    // edit profil post
    Route::post('/edit-profil-post', 'Siswa\SiswaController@editPost');
    
    // Mata pelajaran
    Route::get('/matapelajaran-list', 'Siswa\SiswaController@mapellist');
    Route::get('api/mapel-list',[
        'uses' => 'Siswa\SiswaController@apiMapelList',
        'as' => 'api.mapel.list',]);
    Route::get('/absen-list/{id}', 'Siswa\SiswaController@absenlist');
    Route::post('/isi-absen','Siswa\SiswaController@isiabsen');
    
    // laporan absen
    Route::get('/laporan-list','Siswa\SiswaController@laporanlist');
    Route::get('/laporan/{id}','Siswa\SiswaController@laporanPrint');
});
