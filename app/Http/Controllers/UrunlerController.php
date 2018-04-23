<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MarkalarModel;
use App\Model\KategorilerModel;
use App\Model\UrunlerModel;
use Cache;
use Illuminate\Support\Facades\Validator;
use App\Model\ResimlerModel;
use Illuminate\Support\Facades\File;


class UrunlerController extends Controller
{
 public function UrunlerShow($secili=null,$id=null){

    try{
        /*if(Cache::has("arkaplandaurun"))
    {
        $veriler["urunler"] = Cache::get("arkaplandaurun");
     }else{*/

        switch($secili)
        {
            case "kategorisec":
                $wheresorgu = "alf_urunler.kategori_id";
                $isaret = "=";
            break;
            case "markasec":
                $wheresorgu = "alf_urunler.marka_id";
                $isaret = "=";
            break;
            default:
                $wheresorgu = "alf_urunler.aurun_id";
                $isaret = "!=";
            $id = 0;
            break;
        }
        
        //$wheresorgu = "alf_urunler.aurun_id";
        $veriler["urunler"] = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
                                        ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
                                        ->select("alf_urunler.aurun_id",
                                                 "alf_urunler.urun_ismi",
                                                 "alf_urunler.urun_kodu",
                                                 "alf_urunler.alis_fiyat",
                                                 "alf_urunler.satis_fiyat",
                                                 "alf_urunler.kategori_id",
                                                 "alf_urunler.marka_id",
                                                 "resim.yol",
                                                 "kategori.kategori_adi")
                                                 ->where($wheresorgu,$isaret,$id)->paginate(15);


           // Cache::put("arkaplandaurun",$urunler,60);
     //$veriler["urunler"] = Cache::get("arkaplandaurun");     
   // }
    }catch(\Exception $et)
    {
            echo "<script> alert('hatalandi'); </script>";
    }finally{
        return view("backend.urun_show",$veriler);
    }
        
    }//METHOD

    public function UrunEkle_GET($id = null){
         
        $veriler["urun"] = $id  ? UrunlerModel::where("aurun_id",$id)->first()  : new UrunlerModel;
        $veriler["tip"] = $id ? "Ürün Düzenle" : "Ürün Ekle";
        $veriler["durum"] = $id ? "guncelle" : "ekle";
        $veriler["guncellenecek_urunid"] = $id ? $id : 0;
        $veriler["markalar"] = MarkalarModel::all();
        $veriler["kategoriler"] = KategorilerModel::all();
        
        return view("backend/urun_ekle",$veriler);
     }//method

    public function UrunEkle_POST(Request $request)
    {
        
        $denetim = Validator::make($request->all(),[
            "adi_tr" => "min:3",
            "urun_vitrin_resmi" =>"mimes:jpeg,png,jpg"
        ]);

        if($denetim->fails())
        {
             return response(["durum"=>"warning",
                                         "baslik"=>"Kayıt İşlemi",
                                         "icerik"=>"Eksik veya Hatalı veri girdiniz.Lütfen baştan deneyiniz."]); 
       
        }else{
                //GIRILEN VERILERIN HEPSINI DENETLEYIP CEKIYORUZ
              $urun_adi = $request->get("adi_tr");
              $aciklama = $request->has("aciklama") ? $request->get("aciklama") : "";
              $ekbilgi = $request->has("ekbilgi") ? $request->get("ekbilgi") : "";
              $alisfiyat = $request->has("alisfiyat") ? $request->get("alisfiyat") : 0;
              $satisfiyat = $request->has("satisfiyat") ? $request->get("satisfiyat") : 0;
              $kategorid = $request->has("kategorid") ? $request->get("kategorid") : 0;
              $markaid = $request->has("markaid") ? $request->get("markaid") : 0;
              $stokdurumu = $request->has("stok_varmi") ? $request->get("stok_varmi") : 0;

                //KATEGORIYE AIT "URUN KODUNU" GETIRMEM GEREKIYOR ONA GORE KOD OLUŞTURUCAĞIM
                $SeciliKategoriyiGetir = KategorilerModel::where("akategori_id",$kategorid)->first();
                $urun_kodu = $SeciliKategoriyiGetir->kurun_kodu."".mt_rand(0,999);
                               
             if($request->has("urun_vitrin_resmi"))
             {      
              //VITRIN RESMI KAYIT -> START
              $uzanti = $request->file("urun_vitrin_resmi")->getClientOriginalExtension();
              $vitrinResim_ismi =  mt_rand()."-".date("dmyHis")."-".$urun_adi.".".$uzanti;  
              $request->file("urun_vitrin_resmi")->move("UrunResimler/uresim/",$vitrinResim_ismi);
              //VITRIN RESIM KAYIT -> END
                
              //KAYDEDILEN VITRIN RESMININ ID'SINI ALIYORUZ
             $resimKayit = ResimlerModel::create(["yol"=>$vitrinResim_ismi]);
             $vitrinresimID = $resimKayit->id;
         if($request->get("guncellenecek_urunid") != 0)
         {
            $urunid = $request->get("guncellenecek_urunid");
            UrunlerModel::where("aurun_id",$urunid)->update(["vitrin_resimid"=>$vitrinresimID]);
         }
             }  
             if($request->get("durum") == "ekle")
             {
                    //urun KAAYIT 
             $urunKayit = UrunlerModel::create([
                    "urun_ismi"=>$urun_adi,
                    "urun_kodu"=>$urun_kodu,
                    "aciklama"=>$aciklama,
                    "ek_bilgi"=>$ekbilgi,
                    "alis_fiyat"=>$alisfiyat,
                    "satis_fiyat"=>$satisfiyat,
                    "kategori_id"=>$kategorid,
                    "marka_id"=>$markaid,
                    "vitrin_resimid"=>$vitrinresimID,
                    "tiklanma"=>1,
                    "stokvarmi"=>$stokdurumu]);

                  /*  return response(["durum"=>"success",
                                     "baslik"=>"Kayıt İşlemi",
                                         "icerik"=>"Başarılı bir şekilde Ürününüzü kaydettiniz."]); */


             }else if($request->get("durum") == "guncelle")
             {
                 $urunid = $request->get("guncellenecek_urunid");
                        //urun KAAYIT 
             $urunKayit = UrunlerModel::where("aurun_id",$urunid)->update([
                        "urun_ismi"=>$urun_adi,
                        "aciklama"=>$aciklama,
                        "ek_bilgi"=>$ekbilgi,
                        "alis_fiyat"=>$alisfiyat,
                        "satis_fiyat"=>$satisfiyat,
                        "kategori_id"=>$kategorid,
                        "marka_id"=>$markaid,
                        "tiklanma"=>1,
                        "stokvarmi"=>$stokdurumu]);

                      /*  return response(["durum"=>"success",
                                         "baslik"=>"Güncelleme işlemi",
                                            "icerik"=>"Başarılı bir şekilde Güncelleme işlemi gerçekleştirdiniz."]); 
                                            */
        }
                if($request->has("urun_resmi"))
                {
                    if($request->get("durum")=="guncelle")
                    {
                    $urunID = $urunid;
                    }else{
                        $urunID = $urunKayit->id;
                    }
                    // URUN RESIMLERINI BURDA ALIP FOR ILE HEM TABLOYA HEMDE RESMI KAYDEDIYORUZ
                    $urunResimler = $request->file("urun_resmi");
                    $resimSay = 0;
                    foreach($urunResimler as $i => $res)
                    {
                    $resimSay++;
                    if($resimSay > 3)        
                    {
                        return response(["durum"=>"warning",
                                            "baslik"=>"Resim Ekleme",
                                                 "icerik"=>"3 Resimden fazlasını giremezsiniz."]); 

                    }else{
                        $uzanti = $res->getClientOriginalExtension();
                        $resim_ismi = $resimSay."-".date("dmyHis")."-".$urun_adi.".".$uzanti; 
                        $rt = $resimSay."deneme";
                        $request->file("urun_resmi")[$i]->move("UrunResimler/uresim/",$resim_ismi);
                    
            
                        $resimKayit = ResimlerModel::create(["yol"=>"".$resim_ismi,
                                                            "urun_id"=>$urunID]);       
                    }     
                 }//foreach
                }//urun_resmi VAR ISE KAYDETME ISLEMI YAP 
      
        }//ELSE SONU

       // return redirect("/admin/urunshow");
       return response(["durum"=>"success",
                            "baslik"=>"Kayıt İşlemi",
                            "icerik"=>"Başarılı bir şekilde Ürününüzü kaydettiniz."]);
     }//method

    // public function degerler()
    
     public function UrunDetay($id=null)
     {
         try{
            if($id != null)
            {
                   $datas['urun'] = UrunlerModel::
                   join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")   
                   ->join("alf_markalar","alf_markalar.amarka_id","=","alf_urunler.marka_id") 
                   ->select("alf_urunler.aurun_id",
                           "alf_urunler.urun_ismi",
                           "alf_urunler.urun_kodu",
                           "alf_urunler.aciklama",
                           "alf_urunler.alis_fiyat",
                           "alf_urunler.satis_fiyat",
                           "alf_urunler.vitrin_resimid",
                           "alf_markalar.marka_adi",
                           "kategori.kategori_adi")->where("alf_urunler.aurun_id",$id)->first();
                         
            }
            /*else if($id != null && $tipi == "modal")
            {
              $veri = UrunlerModel::join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")   
                ->join("alf_markalar","alf_markalar.amarka_id","=","alf_urunler.marka_id") 
                ->select("alf_urunler.aurun_id",
                        "alf_urunler.urun_ismi",
                        "alf_urunler.urun_kodu",
                        "alf_urunler.aciklama",
                        "alf_urunler.alis_fiyat",
                        "alf_urunler.satis_fiyat",
                        "alf_urunler.vitrin_resimid",
                        "alf_markalar.marka_adi",
                        "kategori.kategori_adi")->where("alf_urunler.aurun_id",$id)->first();
                return $veri->toJson();

            }*/
         }catch(\Exception $et)
         {
             return "<script>alert('hatadetay ayrin ti');</script>";
         }finally{
            return view("backend.urun-detay",$datas);
         }
     }//METHOD


     public function ResimSil(Request $request)
     {
         if($request->has("id"))
         {
             $resimid = $request->get("id");
             $resimadi =  $request->get("adi");
             $id = $request->get("gid");
             $durum = $request->get("durum");
             
             if($durum == "vitrin")
             {
                UrunlerModel::where("aurun_id",$id)->update(["vitrin_resimid"=>0]);
                File::delete("UrunResimler/".$resimadi);
                
            }else if($durum == "kategoriresim")
             {  
                KategorilerModel::where("akategori_id",$id)->update(["kresim_id"=>0]);
                File::delete($resimadi);     
             }else if($durum == "markaresim")
             {
                MarkalarModel::where("amarka_id",$id)->update(["mresim_id"=>0]);
                File::delete($resimadi);
             }else if($durum == "urunresim")
             {
                File::delete("UrunResimler/".$resimadi);
             }
           ResimlerModel::where("aresim_id",$resimid)->delete();
                     
           echo "Resim Başarıyla Silindi";
           
         }   

     }//METHOD ResimSil


     public function UrunSil(){

        echo "SILINDI SUROEE";
     }



}//class
