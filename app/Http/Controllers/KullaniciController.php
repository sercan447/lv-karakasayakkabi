<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\KullaniciModel;
use App\Model\SepetModel;
use Session;
use Auth;
use App\Model\UrunlerModel;
use App\Model\KategorilerModel;
use App\User;
use App\Model\OnlineKullaniciModel;
use App\Model\FavoriModel;
use App\Model\ResimlerModel;
use RealRashid\SweetAlert\Facades\Alert;
use Cache;
use Validator;
use Mail;
use App\Mail\EpostaSistemi;
use  Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DB;
class KullaniciController extends Controller
{

    public function __constructor()
    {
        /*if(!Cache::has("solframe_urunler"))
        {
            $r1 = mt_rand(1,90);
            $r2 = mt_rand(1,90);
            $r3 = mt_rand(1,90);
            $koleksiyon = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
                                            ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
                                            ->whereIn("alf_urunler.aurun_id",[$r1,$r2,$r3])->get();

                          Cache::put("solframe_urunler",$koleksiyon,10);                  
        }
        if(!Cache::has("solframe_resim"))
        {
            $rastgele = mt_rand(1,90);                               
            $urunresim = ResimlerModel::where("aresim_id",$rastgele)->first();

            Cache::put("solframe_resim",$urunresim,10);
        } */ 
       
    }//_cons
   public function uyeKayit_GET(){
    
  /*  if(Cache::has("solframe_urunler"))
    {
        $datas["koleksiyon"] = Cache::get("solframe_urunler");
    }

    if(Cache::has("solframe_resim"))
    {
        $datas["urunresim"] = Cache::get("solframe_resim");
    }*/

  $r1 = mt_rand(1,90);
  $r2 = mt_rand(1,90);
  $r3 = mt_rand(1,90);
  $datas["koleksiyon"] = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
                                  ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
                                  ->whereIn("alf_urunler.aurun_id",[$r1,$r2,$r3])->get();

        $rastgele = mt_rand(1,90);                               
         $datas["urunresim"] = ResimlerModel::where("aresim_id",$rastgele)->first();
        return view("frontend.kayitol",$datas);
    }

    public function uyeKayit_POST(Request $request)
    {
        $mailvarmi = KullaniciModel::where("eposta",$request->get("eposta"))->first();
        $parola2 = $request->get("ikiparola");
        try{
            if(!$request->has("kisi_id") &&  $request->get("ilkparola") != $parola2)
            {
                return response(["durum"=>"warning",
                                     "baslik"=>"Parola",
                                        "icerik"=>"Parola Eşit Degil."]);
            }
        if(!$request->has("kisi_id") && $mailvarmi != null)
        {
  
            return response(["durum"=>"info",
                             "baslik"=>"Mail Tanımlı",
                                 "icerik"=>"E-Posta adresi tanımlı lütfen başka bir eposta adresi deneyiniz."]);      
        }else{

          
        $tarih = $request->get("gun")."-".$request->get("ay")."-".$request->get("yil");
        if($request->has("kisi_id"))
        {
            KullaniciModel::where("kullanici_id",$request->get("kisi_id"))
                            ->update(["adiniz"=>$request->get("ad"),
                                      "soyadiniz"=>$request->get("soyad"),
                                      "telefon"=>$request->get("telefon"),
                                      "ulke"=>$request->get("ulke"),
                                      "sehir"=>$request->get("sehir"),
                                      "adres"=>$request->get("adres"),
                                      "postakodu"=>$request->get("postakodu"),
                                      "eposta"=>$request->get("eposta"),    
                                      "dogum_tarihi"=>$tarih,
                                      "bulten_istegi"=>$request->get("bulten_istegi") == null ? 0 : 1,
                                      "parola"=>$request->get("ilkparola")]);

                 return response(["durum"=>"success",
                                   "baslik"=>"Güncelleme",
                                   "icerik"=>"Başarılı bir şekilde Güncelleme gerçekleştirilmiştir."]);
        }else{

        
         KullaniciModel::create(["adiniz"=>$request->get("ad"),
                                      "soyadiniz"=>$request->get("soyad"),
                                      "telefon"=>$request->get("telefon"),
                                      "ulke"=>$request->get("ulke"),
                                      "sehir"=>$request->get("sehir"),
                                      "adres"=>$request->get("adres"),
                                      "postakodu"=>$request->get("postakodu"),
                                      "eposta"=>$request->get("eposta"),    
                                      "dogum_tarihi"=>$tarih,
                                      "bulten_istegi"=>$request->get("bulten_istegi") == null ? 0 : 1,
                                      "parola"=>$request->get("ilkparola")]);


                 return response(["durum"=>"success",
                                  "baslik"=>"Kayıt",
                                   "icerik"=>"Başarılı bir şekilde sisteme Kaydınız gerçekleştirilmiştir."]);
        }

        }
       }catch(\Exception $et)
        {
            return response(["durum"=>"error",
                             "baslik"=>"Hata",
                                 "icerik"=>"Kayıt İşleminizde Hata meydana geldi.Daha sonra tekrar deneyiniz."]);
        }finally{
           
        }
    }//METHOD UYE_KAYIT
    public function uyeGiris_GET(){

        return view("frontend.login");
    }

    public function uyeGiris_POST(Request $request){

        $eposta = $request->get("eposta");
        $parola = $request->get("parola");

        $kisi = KullaniciModel::where("eposta",$eposta)->where("parola",$parola)->first();

        if($kisi != null){
            Session::put("kullanici",$kisi);
           // date_default_timezone_set('Europe/Istanbul');
            OnlineKullaniciModel::create(["user_id"=>$kisi->kullanici_id,"last_activity"=>date("Y-m-d H:i:s")]);
            return redirect("/");
        }else{
            return redirect("uyegiris");
        }
       
    }//METHOD



        public function uyecikis()
        {
            Auth::logout();
            OnlineKullaniciModel::where("user_id",Session::get("kullanici")->kullanici_id)->delete();
            Session::forget("kullanici");

           return redirect("/");
        }
    
        public function SepeteEkle($urun_id)
        {
            if(Session::has("kullanici"))
            {
                //return "<script> alert('sepete eklendi.'); </script>";
              SepetModel::create(["kullanici_id"=>Session::get("kullanici")->kullanici_id,
                                  "urun_id"=>$urun_id]);

                return redirect("/sepet");
            }else{
                return redirect("/uyegiris");
                //return "<script> alert('sepete eklenmedi'); </script>";
            }
    }//METHOD

    public function SepetUrunSil($urun_id)
    {
        SepetModel::where("kullanici_id",Session::get("kullanici")->kullanici_id)->where("urun_id",$urun_id)->delete();

         return redirect("/sepet");
    }//SEPET URUN SIL
    public function Sepet(){

        if(!Session::has("kullanici"))
        {
            return redirect("/");
        }
        $datas["urunler"] = SepetModel::join("alf_urunler as urun","urun.aurun_id","=","alf_sepet.urun_id")
                                        ->join("alf_resimler as resim","resim.aresim_id","=","urun.vitrin_resimid")
                                        ->select("resim.yol","urun.urun_ismi","urun.aciklama","alf_sepet.urun_id")
                                        ->where("kullanici_id",Session::get("kullanici")->kullanici_id)->get();
        $rastgele = mt_rand(1,90);
        $datas["koleksiyon"] = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
                                        ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
                                        ->where("aurun_id",$rastgele)->first();

        $rastgele = mt_rand(1,90);                               
        $datas["urunresim"] = ResimlerModel::where("aresim_id",$rastgele)->first();
        
        $datas["favorisayisi"] = FavoriModel::count();
        $datas["sepetsayisi"] = SepetModel::count();

        return view("frontend.sepetim",$datas);
    }

    /////////////////////////////////////////////////////////

    public function FavoriEkle($urun_id)
        {
            if(Session::has("kullanici"))
            {
                //return "<script> alert('sepete eklendi.'); </script>";
              FavoriModel::create(["kullanici_id"=>Session::get("kullanici")->kullanici_id,
                                  "urun_id"=>$urun_id]);

                return redirect("/favori");
            }else{
                return redirect("/uyegiris");
                //return "<script> alert('sepete eklenmedi'); </script>";
            }
    }//METHOD

    public function FavoriUrunSil($urun_id)
    {
        FavoriModel::where("kullanici_id",Session::get("kullanici")->kullanici_id)
                  ->where("urun_id",$urun_id)->delete();

                  return redirect("/favori");
    }//SEPET URUN SIL
    public function Favori(){
        
        if(!Session::has("kullanici"))
        {
            return redirect("/");
        }
        $datas["favoriler"] = FavoriModel::join("alf_urunler as urun","urun.aurun_id","=","krk_favori.urun_id")
                                        ->join("alf_resimler as resim","resim.aresim_id","=","urun.vitrin_resimid")
                                        ->select("resim.yol","urun.urun_ismi","krk_favori.urun_id")
                                        ->where("krk_favori.kullanici_id",Session::get("kullanici")->kullanici_id)->get();
        $rastgele = mt_rand(1,90);
        $datas["koleksiyon"] = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
                                                                        ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
                                                                        ->where("aurun_id",$rastgele)->first();
                                
        $rastgele = mt_rand(1,90);                               
        $datas["urunresim"] = ResimlerModel::where("aresim_id",$rastgele)->first();
       
        $datas["favorisayisi"] = FavoriModel::where("kullanici_id",Session::get("kullanici")->kullanici_id)->count();
        $datas["sepetsayisi"] = SepetModel::where("kullanici_id",Session::get("kullanici")->kullanici_id)->count();
          return view("frontend.favorilerim",$datas);
    }



    public function UrunArama(Request $request)
    {
        $arama = trim($request->get("aranankelime"));
        $secilenkategori = trim($request->get("secilenkategori"));

        if($arama ==  null || $arama == "")
        {
            return redirect("/");
        }else if($secilenkategori == "tumkategori"){
            $veriler["arananurunler"] = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
            ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
            ->select("alf_urunler.aurun_id",
                     "alf_urunler.urun_ismi",
                     "alf_urunler.urun_kodu",
                     "alf_urunler.alis_fiyat",
                     "alf_urunler.satis_fiyat",
                     "alf_urunler.kategori_id",
                     "alf_urunler.marka_id",
                     "resim.yol",
                     "alf_urunler.kategori_id",
                     "kategori.kategori_adi")
                     
                     ->where("urun_ismi","LIKE","%".$arama."%")
                     ->paginate(12);
        }else{
            $veriler["arananurunler"] = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
            ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
            ->select("alf_urunler.aurun_id",
                     "alf_urunler.urun_ismi",
                     "alf_urunler.urun_kodu",
                     "alf_urunler.alis_fiyat",
                     "alf_urunler.satis_fiyat",
                     "alf_urunler.kategori_id",
                     "alf_urunler.marka_id",
                     "resim.yol",
                     "alf_urunler.kategori_id",
                     "kategori.kategori_adi")
                     ->where("kategori_id",$secilenkategori)
                     ->where("urun_ismi","LIKE","%".$arama."%")
                     ->paginate(12);
        }
        
        
          
        $veriler["kategoriler"] = KategorilerModel::All();         
        return view("frontend.arananurunler",$veriler);
    }//URUNARAMA FUNCS


    public function Hesabim($id = null){

        $r1 = mt_rand(1,90);
        $r2 = mt_rand(1,90);
        $r3 = mt_rand(1,90);
        $datas["koleksiyon"] = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
                                        ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
                                        ->whereIn("alf_urunler.aurun_id",[$r1,$r2,$r3])->get();
          $rastgele = mt_rand(1,90);                               
         $datas["urunresim"] = ResimlerModel::where("aresim_id",$rastgele)->first();                               
        if(Session::get("kullanici")->kullanici_id == $id)
        {
        $datas["kisi"] = KullaniciModel::where("kullanici_id",$id)->first();
         return view("frontend.hesabim",$datas);
        }else{
            //return view("frontend.guvenlikhata");
        }
        
    }//FUNC HESABIM
   /*
    public function Hesabim_POST($id = null,Request $request){
    
        KullaniciModel::where("kullanici_id",$id)
                     ->update([
                    "adiniz"=>$request->get("adiniz"),
                    "soyadiniz"=>$request->get("soyadiniz"),
                    "eposta"=>$request->get("eposta"),
                    "telefon"=>$request->get("telefon"),
                    "fax"=>$request->get("fax"),
                    "sirketadi"=>$request->get("sirketadi"),
                    "isadresi"=>$request->get("isadresi"),
                    "sehir"=>$request->get("sehir"),
                    "postakodu"=>$request->get("postakodu"),
                    "ulke"=>$request->get("ulke"),
                    "bulten_istegi"=>$request->get("bulten_istegi"),
                    "parola"=>$request->get("parola")
                     ]);

        if(Session::get("kullanici")->kullanici_id == $id)
        {
        $datas["kisi"] = KullaniciModel::where("kullanici_id",$id)->first();
         return view("frontend.hesabim",$datas);
        }else{
            return view("frontend.guvenlikhata");
        }
        
    }//FUNC HESABIM
    */



    public function AdminHesaplar()
    {
        $datas["adminler"] = User::All();

        return view("backend.tanimlihesaplar",$datas);
    }

    public function Uyeler()
    {
        $datas["uyeler"] = KullaniciModel::All();
        return view("backend.uyeler",$datas);
    }


    public function Paroladegistir_GET($id)
    {
        return view("frontend.paroladegistir");
    }
    public function Paroladegistir_POST($id,Request $request)
    {
        $valid = Validator::make($request->all(),
        [
            "eskiparola"=>"required",
            "yeniparola"=>"required",
            "yeniparolatekrar"=>"required"
        ]);

          
        $eskiparola = $request->get("eskiparola");
        $yeniparola = $request->get("yeniparola");
        $yeniparolatekrar = $request->get("yeniparolatekrar");
        if($valid->fails())
        {
            return response(["durum"=>"warning",
            "baslik"=>"Tanım Sorunu",
             "icerik"=>"Eksik veya Hatalı Tanımlama.LÜtfen baştan deneyiniz."]);
        }else if($yeniparola != $yeniparolatekrar)
        {
            return response(["durum"=>"warning",
                             "baslik"=>"Parola Eşleşmiyor.",
                                "icerik"=>"Parolalar Eşleşmiyor. Tekrardan Deneyiniz."]);
        }else{

            $eskiparolaKontrol = KullaniciModel::where("kullanici_id",$id)->first();

            if($eskiparolaKontrol->parola != $eskiparola)
            {
                return response(["durum"=>"warning",
                "baslik"=>"Eski Parola.",
                "icerik"=>"Eski Parola Yanlış Girildi.Baştan deneyiniz."]);
            }else{
                KullaniciModel::where("kullanici_id",$id)->update(["parola"=>$yeniparolatekrar]);

                return response(["durum"=>"success",
                                    "baslik"=>"Parola Değiştirme.",
                                    "icerik"=>"Başarılı bir şekilde Parolanız Değiştirildi."]);
            }
            
           
        }
        //return view("frontend.paroladegistir");
    }

 public function OnlineKullanicilar(Request $request){
		date_default_timezone_set('Europe/istanbul');
			$time = date("Y-m-d H:i:s");
		if($request->has("aksiyon") && $request->get("aksiyon") == "goster")
		{
			//echo "GOSTERILIYOR  BREE";
			
        $veriler = OnlineKullaniciModel::join("alf_kullanicilar as kul",
                                            "kul.kullanici_id","=","onlinekullanicilar.user_id")
			->select("kul.adiniz")		
			->whereRaw('onlinekullanicilar.last_activity > DATE_SUB(NOW(), INTERVAL 10 MINUTE)')->get();
			$datas ="";
			if($veriler != null)
			{
			foreach($veriler as $veri)
			{
				/*$resim = "";
					if($veri->tip == "kurumsal"){
						$resim = "kurumsal.png";
					}else if($veri->cinsiyet == "Erkek"){
						$resim = "man.png";
					}else if($veri->cinsiyet == "Bayan"){
						$resim = "woman.png";
                    }
                    */	
                $datas .= "<img src='".asset("backend/man.png")."' class='media-object img-radius img-radius' />"
                                            .$veri->adiniz.
                                        "<div class='live-status bg-success'></div><hr/>";

				
		}//foreach END
			echo $datas;
			}//if sonu
			
		}else if($request->has("aksiyon") && $request->get("aksiyon") == "guncelle")
		{
			//echo "GUNCELLENIYOR BREEE";
			//$kisi = App\OnlineKullanicilar::where("user_id",Cookie::get("kullanici")->id)->first();
					
			if(Session::has("kullanici"))
			{	
				OnlineKullaniciModel::where("user_id",Session::get("kullanici")->kullanici_id)->update(["last_activity"=>date("Y-m-d H:i:s")]);
               
            }else{
				echo "yok";
			}
		}else{

            echo "KIMSE YOK";
        }		
	}//FUNC online kullanıcı



    public function ParolaUnuttum_GET(){  
        return view("frontend.parolamiunuttum");
    }
    
    public function SifreYenile_GET($id,$key)
    {
            $datas["kisi"] = KullaniciModel::where("kullanici_id",$id)->first();
        return view("frontend.sifreyenile",$datas);
    }
    public function SifreYenile_POST(Request $request)
    {
        $id = $request->get("id");
        $parola = $request->get("yeniparola");
        $parolatekrar = $request->get("yeniparolatekrar");

        if($parola != $parolatekrar)
        {
            return response(["durum"=>"warning",
                                     "baslik"=>"Parola Eşleşme.",
                                    "icerik"=>"Şifreleriniz eşleşmiyor.Lütfen tekrar deneyiniz."]);

        }else{
             KullaniciModel::where("kullanici_id",$id)->update(["parola"=>$parolatekrar]);
             return response(["durum"=>"success",
                                     "baslik"=>"Parola Değiştirildi..",
                                        "icerik"=>"Başarılı bir şekilde Şifreniz degiştirildi."]);
             
        }     
    }//METHOD POST
    public function ParolaUnuttum_POST(){  

     Mail::send(new EpostaSistemi());
      
  return response(["durum"=>"info",
                                 "baslik"=>"E-Posta İletildi.",
                                     "icerik"=>"E-Postanıza giderek parolanızı sıfırlama iletisine tıklayınız."]);
       
    }//METHOD FUNC


    public function SunucuTemizlik()
    {

			foreach($sunucu = Storage::disk("urunresimler")->files("uresim/") as $ver){
                //echo mb_substr($ver,7)."<br/>";
             $data = DB::table("alf_resimler")->where("yol",mb_substr($ver,7))->first();
                if($data != null)
                {
                    continue;
                }else{
                    File::delete("UrunResimler/".$ver);
                }
            }
            
            return view("backend.sunucuclear");
    }//METHOD
}
