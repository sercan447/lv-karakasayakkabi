<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UrunlerModel;
use App\Model\KategorilerModel;
use Cache;

class FrontKategoriListeController extends Controller
{
    public function __construct(){
       
    }
    public function KategoriyeGoreGetir($kat)
    {

        try{
        $veriler['kategoriyeGore'] = UrunlerModel::join("alf_resimler","alf_resimler.aresim_id","=","alf_urunler.vitrin_resimid")
                                    ->join("alf_kategoriler","alf_urunler.kategori_id","=","alf_kategoriler.akategori_id")
                                    ->select("alf_urunler.aurun_id",
                                    "alf_urunler.urun_ismi",
                                    "alf_urunler.urun_kodu",
                                    "alf_urunler.aciklama",
                                    "alf_urunler.vitrin_resimid",
                                    "alf_urunler.tiklanma",
                                    "alf_kategoriler.kategori_adi",
                                    "alf_resimler.yol")->where("alf_urunler.kategori_id",$kat)->paginate(8);
         
         $kategoriBilgisi = KategorilerModel::where("akategori_id",$kat)->first();  
         $veriler['kategoriAdi'] = $kategoriBilgisi->kategori_adi; 
         
         // burda WHERE kosulunda tiklanma ile iligli sayının belirli bir rakama bağlı olmasını istiyoruz
         //şimdilik 0 yaptık.daha sonra rakamı degiştireceğğiz
         $veriler["eniyiurun"] = UrunlerModel::join("alf_resimler","alf_resimler.aresim_id","=","alf_urunler.vitrin_resimid")
                                    ->join("alf_kategoriler","alf_urunler.kategori_id","=","alf_kategoriler.akategori_id")
                                    ->select("alf_urunler.aurun_id",
                                    "alf_urunler.urun_ismi",
                                    "alf_urunler.urun_kodu",
                                    "alf_urunler.aciklama",
                                    "alf_urunler.vitrin_resimid",
                                    "alf_urunler.tiklanma",
                                    "alf_urunler.kategori_id",
                                    "alf_kategoriler.kategori_adi",
                                   
                                    "alf_resimler.yol")
                                    ->where("alf_urunler.kategori_id",$kat)->where("alf_urunler.tiklanma",0)->first();

          $veriler["kategoriler"] = KategorilerModel::All();  
         // $veriler["cardsistemi"] = $gorunum;      
        }catch(\Exception $et)
        {
                    return "hata :".$et;
        }finally{
            return view("frontend.kategoriyegore",$veriler);
          
        }
            

    }//METHOD



}
