<?php

use App\Http\Controllers\BlogerController;
use App\Http\Controllers\FrontendCotroller;
use App\Http\Controllers\LogController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\KorisnikBackendController;
use App\Http\Controllers\SlajderBackendController;
use App\Http\Controllers\BlogBackendController;
use App\Http\Controllers\TretmanBackendController;
use App\Http\Controllers\TipTretmanaBackendController;
use App\Http\Controllers\ZakazaniController;
use App\Http\Controllers\ZakazaniBackendController;

Route::get('/',[FrontendCotroller::class,'index'])->name('index');

Route::get('/tretmani/{id_tt}',[FrontendCotroller::class,'tretmani'])->name('tretmani');
Route::get('/opisTretmana/{id_tt}/{id_tretman}',[FrontendCotroller::class,'opisTretmana'])->name('opisTretmana');
Route::get('/zakazati',[FrontendCotroller::class,'zakazati'])->name('zakazati');
Route::post('/zakazati',[FrontendCotroller::class,'doZakazati'])->name('doZakazati');
Route::get('/blog',[FrontendCotroller::class,'blog'])->name('blog');
Route::get('/one_Blog/{id_blog}',[FrontendCotroller::class,'oneBlog'])->name('one_Blog');

Route::get('/adminPanel',[LogController::class,'logovanje'])->name('logovanje');
Route::post('/doLogovanje',[LogController::class,'doLogovanje'])->name('doLogovanje');
Route::get('/logout',[LogController::class,'logout'])->name('logout');

//ajax
Route::post('/zakazati_ajax',[FrontendCotroller::class,'zakazati_ajax'])->name('zakazati_ajax');
Route::post('/search',[FrontendCotroller::class,'search'])->name('search');

//ADMIN
Route :: group(['middleware'=>'admin'],function (){

    //prikaz sadrzaja iz baze
    Route::get('/adminPanel_korisnici',[KorisnikBackendController::class,'adminPanel_korisnici'])->name('adminPanel_korisnici');
    Route::get('/adminPanel_tretmani/{id_tt}',[TretmanBackendController::class,'adminPanel_tretmani'])->name('adminPanel_tretmani');
    Route::get('/adminPanel_tipTretman',[TipTretmanaBackendController::class,'adminPanel_tipTretman'])->name('adminPanel_tipTretman');
    Route::get('/adminPanel_podaci',[BackendController::class,'adminPanel_podaci'])->name('adminPanel_podaci');
    Route::get('/adminPanel_slajder',[SlajderBackendController::class,'adminPanel_slajder'])->name('adminPanel_slajder');
    Route::get('/adminPanel_blog',[BlogBackendController::class,'adminPanel_blog'])->name('adminPanel_blog');
    Route::get('/zakazaniA',[ZakazaniBackendController::class,'zakazaniA'])->name('zakazaniA');
    Route::get('/otkazaniA',[ZakazaniBackendController::class,'otkazaniA'])->name('otkazaniA');

    //insert
    Route::get('/adminPanel_tretmani_insert',[TretmanBackendController::class,'adminPanel_tretmani_insert'])->name('adminPanel_tretmani_insert');
    Route::post('/adminPanel_tretmani_insert',[TretmanBackendController::class,'doAdminPanel_tretmani_insert'])->name('doAdminPanel_tretmani_insert');

    Route::get('/adminPanel_slajder_insert',[SlajderBackendController::class,'adminPanel_slajder_insert'])->name('adminPanel_slajder_insert');
    Route::post('/adminPanel_slajder_insert',[SlajderBackendController::class,'doAdminPanel_slajder_insert'])->name('doAdminPanel_slajder_insert');

    Route::get('/adminPanel_korisnik_insert',[KorisnikBackendController::class,'adminPanel_korisnik_insert'])->name('adminPanel_korisnik_insert');
    Route::post('/adminPanel_korisnik_insert',[KorisnikBackendController::class,'doAdminPanel_korisnik_insert'])->name('doAdminPanel_korisnik_insert');

    Route::get('/adminPanel_blog_insert',[BlogBackendController::class,'adminPanel_blog_insert'])->name('adminPanel_blog_insert');
    Route::post('/adminPanel_blog_insert',[BlogBackendController::class,'doAdminPanel_blog_insert'])->name('doAdminPanel_blog_insert');

    Route::get('/adminPanel_tipTretman_insert',[TipTretmanaBackendController::class,'adminPanel_tipTretman_insert'])->name('adminPanel_tipTretman_insert');
    Route::post('/adminPanel_tipTretman_insert',[TipTretmanaBackendController::class,'doAdminPanel_tipTretman_insert'])->name('doAdminPanel_tipTretman_insert');

    Route::get('/adminPanel_zakazano_insert',[ZakazaniBackendController::class,'adminPanel_zakazano_insert'])->name('adminPanel_zakazano_insert');
    Route::post('/adminPanel_zakazano_insert',[ZakazaniBackendController::class,'doAdminPanel_zakazano_insert'])->name('doAdminPanel_zakazano_insert');

    //ajax
    Route::post('/adminPanel_zakazano_insert_ajax',[ZakazaniBackendController::class,'adminPanel_zakazano_insert_ajax'])->name('adminPanel_zakazano_insert_ajax');
    Route::post('/sortByDate_zakazanoA',[ZakazaniBackendController::class,'sortByDate_zakazanoA'])->name('sortByDate_zakazanoA');
    Route::post('/sortByDate_otkazanoA',[ZakazaniBackendController::class,'sortByDate_otkazanoA'])->name('sortByDate_otkazanoA');
    Route::post('/sortByDate_blog',[BlogBackendController::class,'sortByDate_blog'])->name('sortByDate_blog');

    //update
    Route::get('/adminPanel_tretmani_update/{id_tretman}',[TretmanBackendController::class,'adminPanel_tretmani_update'])->name('adminPanel_tretmani_update');
    Route::post('/adminPanel_tretmani_update/{id_tretman}',[TretmanBackendController::class,'doAdminPanel_tretmani_update'])->name('doAdminPanel_tretmani_update');

    Route::get('/adminPanel_poodaci_update/{id}',[BackendController::class,'adminPanel_podaci_update'])->name('adminPanel_podaci_update');
    Route::post('/adminPanel_poodaci_update/{id}',[BackendController::class,'doAdminPanel_podaci_update'])->name('doAdminPanel_podaci_update');

    Route::get('/adminPanel_slajder_update/{id_slajder}',[SlajderBackendController::class,'adminPanel_slajder_update'])->name('adminPanel_slajder_update');
    Route::post('/adminPanel_slajder_update/{id_slajder}',[SlajderBackendController::class,'doAdminPanel_slajder_update'])->name('doAdminPanel_slajder_update');

    Route::get('/adminPanel_korisnici_update/{id_korisnik}',[KorisnikBackendController::class,'adminPanel_korisnici_update'])->name('adminPanel_korisnici_update');
    Route::post('/adminPanel_korisnici_update/{id_korisnik}',[KorisnikBackendController::class,'doAdminPanel_korisnici_update'])->name('doAdminPanel_korisnici_update');

    Route::get('/adminPanel_blog_update/{id_blog}',[BlogBackendController::class,'adminPanel_blog_update'])->name('adminPanel_blog_update');
    Route::post('/adminPanel_blog_update/{id_blog}',[BlogBackendController::class,'doAdminPanel_blog_update'])->name('doAdminPanel_blog_update');

    Route::get('/adminPanel_tipTretman_update/{id_tt}',[TipTretmanaBackendController::class,'adminPanel_tipTretman_update'])->name('adminPanel_tipTretman_update');
    Route::post('/adminPanel_tipTretman_update/{id_tt}',[TipTretmanaBackendController::class,'doAdminPanel_tipTretman_update'])->name('doAdminPanel_tipTretman_update');

    Route::get('/adminPanel_zakazano_update/{id_zakazano}',[ZakazaniBackendController::class,'adminPanel_zakazano_update'])->name('adminPanel_zakazano_update');
    Route::post('/adminPanel_zakazano_update/{id_zakazano}',[ZakazaniBackendController::class,'doAdminPanel_zakazano_update'])->name('doAdminPanel_zakazano_update');


    //delete
    Route::get('/adminPanel_korisnici_delete/{id_korisnik}',[KorisnikBackendController::class,'adminPanel_korisnici_delete'])->name('adminPanel_korisnici_delete');
    Route::get('/adminPanel_podaci_delete/{id}',[BackendController::class,'adminPanel_podaci_delete'])->name('adminPanel_podaci_delete');
    Route::get('/adminPanel_slajder_delete/{id_slajder}',[SlajderBackendController::class,'adminPanel_slajder_delete'])->name('adminPanel_slajder_delete');
    Route::get('/adminPanel_blog_delete/{id_blog}',[BlogBackendController::class,'adminPanel_blog_delete'])->name('adminPanel_blog_delete');
    Route::get('/adminPanel_tretmani_delete/{id_tt?}/{id_tretman}',[TretmanBackendController::class,'adminPanel_tretmani_delete'])->name('adminPanel_tretmani_delete');
    Route::get('/adminPanel_tipTretman_delete/{id_tt}',[TipTretmanaBackendController::class,'adminPanel_tipTretman_delete'])->name('adminPanel_tipTretman_delete');
    Route::get('/adminPanel_zakazani_delete/{id_zakazano}',[ZakazaniBackendController::class,'adminPanel_zakazani_delete'])->name('adminPanel_zakazani_delete');
    Route::get('/adminPanel_otkazani_delete/{id_zakazano}',[ZakazaniBackendController::class,'doOtkazaniA'])->name('doOtkazaniA');
});
//BLOGER
Route::group(['middleware'=>'bloger'],function (){
    Route::get('/bloger',[BlogerController::class,'blog'])->name('bloger');
    Route::get('/oneBlog/{id_blog}',[BlogerController::class,'oneBlog'])->name('oneBlog');
    Route::get('/all_blog',[BlogerController::class,'blog_blog'])->name('all_blog');

    Route::get('/blog_insert',[BlogerController::class,'blog_insert'])->name('blog_insert');
    Route::post('/blog_insert',[BlogerController::class,'doBlog_insert'])->name('doBlog_insert');

    Route::get('/blog_update/{id_blog}',[BlogerController::class,'blog_update'])->name('blog_update');
    Route::post('/blog_update/{id_blog}',[BlogerController::class,'doBlog_update'])->name('doBlog_update');

    Route::get('/blog_delete/{id_blog}',[BlogerController::class,'blog_delete'])->name('blog_delete');

    //ajax
    Route::post('/sortByDateBlog',[BlogerController::class,'sortByDateBlog'])->name('sortByDateBlog');
    Route::post('/searchBlog',[BlogerCotroller::class,'searchBlog'])->name('searchBlog');
});
//ZAPOSLENI
Route::group(['middleware'=>'zaposleni'],function () {
    Route::get('/zakazani',[ZakazaniController::class,'zakazani'])->name('zakazani');
    Route::get('/otkazani',[ZakazaniController::class,'otkazani'])->name('otkazani');

    Route::get('/zakazani_insert',[ZakazaniController::class,'zakazani_insert'])->name('zakazani_insert');
    Route::post('/zakazani_insert',[ZakazaniController::class,'doZakazani_insert'])->name('doZakazani_insert');

    Route::get('/zakazani_update/{id_zakazano}',[ZakazaniController::class,'zakazani_update'])->name('zakazani_update');
    Route::post('/zakazani_update/{id_zakazano}',[ZakazaniController::class,'doZakazani_update'])->name('doZakazani_update');

    Route::get('/zakazani_delete/{id_zakazano}',[ZakazaniController::class,'zakazani_delete'])->name('zakazani_delete');

    //ajax
    Route::post('/zakazi_ajax',[ZakazaniController::class,'zakazi_ajax'])->name('zakazi_ajax');
    Route::post('/sortByDate_zakazanoZ',[ZakazaniController::class,'sortByDate_zakazanoZ'])->name('sortByDate_zakazanoZ');
    Route::post('/sortByDate_otkazanoZ',[ZakazaniController::class,'sortByDate_otkazanoZ'])->name('sortByDate_otkazanoZ');

});
?>
