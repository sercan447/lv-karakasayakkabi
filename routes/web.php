<?php


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::get("favorilerim",function(){
    return view("frontend.favorilerim");
})->name("favorilerim");
Route::get("sorular",function(){
    return view("frontend.sorulansorular");
})->name("sorular");


Route::resource("resturun","RestUrun");
Route::resource("restkategori","RestKategori");
Route::resource("restmarka","RestMarka");


Route::get("parolamiunuttum","KullaniciController@ParolaUnuttum_GET")->name("parolamiunuttum");
Route::post("parolamiunuttum","KullaniciController@ParolaUnuttum_POST")->name("parolamiunuttum");

Route::get("sifreyenile/{id?}/{key?}","KullaniciController@SifreYenile_GET")->name("sifreyenile");
Route::post("sifreyenile/{id?}","KullaniciController@SifreYenile_POST")->name("sifreyenile");

Route::get('/',"AnasayfaController@Anasayfa")->name("anasayfa");
Route::get("kategoriliste/{kat?}","FrontKategoriListeController@KategoriyeGoreGetir")->name("kategoriliste");

Route::get("/ayrinti/{urunid?}/","AnasayfaController@UrunAyrinti")->name("ayrinti");
Route::get("/modal/{urunid?}","AnasayfaController@modalAyrinti")->name("modal");
Route::get("/bizkimiz","iletisimController@front_bizkimizShow")->name("bizkimiz");

Route::get("uyegiris","KullaniciController@uyeGiris_GET")->name("uyegiris");
Route::post("uyegiris","KullaniciController@uyeGiris_POST")->name("uyegiris");

Route::get("iletisim","iletisimController@front_iletisimShow")->name("iletisim");
Route::post("iletisim","iletisimController@front_iletisimShow_POST")->name("iletisim");

Route::get("uyekayit","KullaniciController@uyeKayit_GET")->name("uyekayit");
Route::post("uyekayit","KullaniciController@uyeKayit_POST")->name("uyekayit");

Route::get("uyecikis","KullaniciController@uyecikis")->name("uyecikis");

Route::get("paroladegistir/{id?}","KullaniciController@Paroladegistir_GET")->name("paroladegistir");
Route::post("paroladegistir/{id?}","KullaniciController@Paroladegistir_POST")->name("paroladegistir");

Route::get("sepetekle/{urun_id?}","KullaniciController@SepeteEkle")->name("sepetekle");
Route::get("sepeturunsil/{urun_id?}","KullaniciController@SepetUrunSil")->name("sepeturunsil");
Route::get("sepet","KullaniciController@Sepet")->name("sepet");

Route::get("favoriekle/{urun_id?}","KullaniciController@FavoriEkle")->name("favoriekle");
Route::get("favoriurunsil/{urun_id?}","KullaniciController@FavoriUrunSil")->name("favoriurunsil");
Route::get("favori","KullaniciController@Favori")->name("favori");

Route::get("hesabim/{id?}","KullaniciController@Hesabim")->name("hesabim");
Route::post("hesabim/{id?}","KullaniciController@Hesabim_post")->name("hesabim");


Route::post("urunarama","KullaniciController@UrunArama");

/*


Route::get("/locale/{locale}",function($locale){

    Session::put("dilsecim",$locale);
    Session::save();
    Config::set("app.locale",$locale);
   // Config::set("app.fallback_locale",$dil);

    return redirect("/");
});
*/

Route::group(["prefix"=>"admin","middleware"=>"auth"],function(){

    Route::get("/anasayfa","AnasayfaController@backAnasayfa")->name("anasayfa");

    Route::get("adminlogin",function(){

        return view("adminlogin");
    })->name("adminlogin");

    Route::get("adminsifresifirla",function(){

        return view("adminsifresifirla");
    })->name("adminsifresifirla");
////////////////////////////////////////////////////////////
    Route::get("/urunekle/{id?}","UrunlerController@UrunEkle_GET")->name("urunekle");
    Route::post("/urunekle","UrunlerController@UrunEkle_POST");
    Route::get("/urunshow/{secili?}/{id?}","UrunlerController@UrunlerShow")->name("urunshow");

    ////////////////////////////////////////////////////////////
    Route::get("/kategoriekle/{id?}","KategorilerController@KategoriEkle_GET")->name("kategoriekle");
    Route::post("/kategoriekle","KategorilerController@KategoriEkle");
    Route::get("/kategorishow","KategorilerController@KategoriShow_GET")->name("kategorishow");
    Route::get("/kategorisil/{id?}","KategorilerController@kategorisil")->name("kategorisil");
    Route::post("/kategoriresimekle","KategorilerController@KategoriResimEkle")->name("kategoriresimekle");

    ////////////////////////////////////////////////////////////////////////
    Route::get("/markaekle/{id?}","MarkalarController@MarkaEkle_GET")->name("markaekle");
    Route::post("/markaekle","MarkalarController@MarkaEkle")->name("markaekle");
    Route::get("/markashow","MarkalarController@MarkaShow")->name("markashow");  
    Route::get("/markasil/{id?}","MarkalarController@markasil")->name("markasil");
    Route::post("/markaresimekle","MarkalarController@MarkaResimEkle")->name("markaresimekle");
    /////////////////////////////////////////////////////////////////////
    Route::get("ozelliktipekle","OzelliklerController@ozellikTipEkle")->name("ozelliktipekle");
    Route::post("ozelliktipekle","OzelliklerController@ozellikTipEkle_POST");

    ////////////////////////////////////////////////////////////////
    Route::get("ozellikdegerekle","OzelliklerController@ozellikDegerEkle")->name("ozellikdegerekle");
    Route::post("ozellikdegerekle","OzelliklerController@ozellikDegerEkle_POST");
    
    ///////////////////////////////////////////////////////////////////
    Route::get("sosyalmedyahesab","iletisimController@backend_sosyalMedyaBilgileri")->name("sosyalmedyahesab");
    Route::post("sosyalmedyahesab","iletisimController@backend_sosyalMedyaBilgileri_POST")->name("sosyalmedyahesab");

    Route::get("isletmebilgi","iletisimController@backend_iletisimBilgileri")->name("isletmebilgi");
    Route::post("isletmebilgi","iletisimController@backend_iletisimBilgileri_POST")->name("isletmebilgi");
    /////////////////////////////////////////////////
    Route::get("/urun-detay/{id?}","UrunlerController@UrunDetay")->name("urundetay");
    Route::get("/resim-sil","UrunlerController@ResimSil")->name("resim-sil");
    Route::get("/urun-sil","UrunlerController@UrunSil")->name("urun-sil");
    
    Route::get("tanimlihesaplar","KullaniciController@AdminHesaplar")->name("tanimlihesaplar");
    Route::get("uyeler","KullaniciController@Uyeler")->name("uyeler");
    Route::post("rekle","MarkalarController@ResimEkle")->name("rekle");

    Route::get("sunucuclear","KullaniciController@SunucuTemizlik")->name("sunucuclear");

    Route::get("aksiyon","KullaniciController@OnlineKullanicilar")->name("aksiyon");
}); //GROUP ADMIN 



/*use Mail;

Route::get("/mailgonder",function(){

    Mail::send(['text'=>'mail'],['name',"sercan"],function($message){

        $message->to('sercan.goger@gmail.com','sercan bey')->subject("Kapak");
        $message->from('alfatoptancilik@gmail.com','Alfa Toptan');

      });

      return view("frontend.anasayfa");
});
*/
