<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UrunlerModel;
use App\Model\KategorilerModel;
use App\Model\ResimlerModel;
use App\Model\MarkalarModel;
use App\Model\KullaniciModel;
use Cache;
use Illuminate\Support\Facades\DB;

class AnasayfaController extends Controller
{
    
    public function __construct(){

        if(!Cache::has("anasayfaUrunler"))
        {
            $urunler = UrunlerModel::join("alf_resimler","alf_resimler.aresim_id","=","alf_urunler.vitrin_resimid")
            ->select("alf_urunler.aurun_id",
                     "alf_urunler.urun_ismi",
                     "alf_urunler.urun_kodu",
                     "alf_urunler.aciklama",
                     "alf_urunler.tiklanma",
                     "alf_urunler.vitrin_resimid",
                     "alf_resimler.yol")->limit(8)->orderBy("alf_urunler.aurun_id","ASC")->get();

            Cache::put("anasayfaUrunler",$urunler,6);
        }

        if(!Cache::has("yeniurunler"))
        {
            $yeniurunler =  UrunlerModel::join("alf_resimler","alf_resimler.aresim_id","=","alf_urunler.vitrin_resimid")
    ->select("alf_urunler.aurun_id",
            "alf_urunler.urun_ismi",
            "alf_urunler.urun_kodu",
            "alf_urunler.aciklama",
            "alf_urunler.alis_fiyat",
            "alf_urunler.satis_fiyat",
            "alf_urunler.vitrin_resimid",
            "alf_urunler.tiklanma",
            "alf_resimler.yol")
           // ->where("alf_urunler.tiklanma",">",0)
            ->limit(5)->orderBy("aurun_id","ASC")->get();

            Cache::put("yeniurunler",$yeniurunler,6);
        }
        if(!Cache::has("encokgoruntulenen"))
        {
            $encokgoruntulenen =  UrunlerModel::join("alf_resimler","alf_resimler.aresim_id","=","alf_urunler.vitrin_resimid")
     ->select("alf_urunler.aurun_id",
            "alf_urunler.urun_ismi",
            "alf_urunler.urun_kodu",
            "alf_urunler.aciklama",
            "alf_urunler.alis_fiyat",
            "alf_urunler.satis_fiyat",
            "alf_urunler.vitrin_resimid",
            "alf_urunler.tiklanma",
            "alf_resimler.yol")
            ->where("alf_urunler.tiklanma",">",1)
            ->limit(5)->orderBy("alf_urunler.tiklanma","ASC")->get();

            Cache::put("encokgoruntulenen",$encokgoruntulenen,6);
        }


        if(!Cache::has("farkliurunler"))
        {
            $farkliurun = UrunlerModel::join("alf_resimler as res","res.aresim_id","=","alf_urunler.vitrin_resimid")
            ->whereIn("aurun_id",[mt_rand(5,14),mt_rand(15,25),
                                  mt_rand(26,46),mt_rand(47,67),
                                  mt_rand(68,96)])->limit(5)->get();

                                  Cache::put("farkliurun",$farkliurun,10);
        }
    } //__construct
    public function Anasayfa()
    {
    
    try{
            $veriler["urunler"] = Cache::get("anasayfaUrunler");
            $veriler["enyeni"] = Cache::get("yeniurunler");
            $veriler["encokgoruntu"] = Cache::get("encokgoruntulenen");
            
            $veriler["eniyiurunler"] =  UrunlerModel::join("alf_resimler","alf_resimler.aresim_id","=","alf_urunler.vitrin_resimid")
                                    ->join("alf_kategoriler","alf_urunler.kategori_id","=","alf_kategoriler.akategori_id")
                                    ->select("alf_urunler.aurun_id",
                                    "alf_urunler.urun_ismi",
                                    "alf_urunler.urun_kodu",
                                    "alf_urunler.aciklama",
                                    "alf_urunler.alis_fiyat",
                                    "alf_urunler.satis_fiyat",
                                    "alf_urunler.vitrin_resimid",
                                    "alf_urunler.tiklanma",
                                    "alf_kategoriler.kategori_adi",
                                    "alf_resimler.yol")
                                   // ->where("alf_urunler.tiklanma",">",0)
                                    ->limit(8)->orderBy("aurun_id","ASC")->get();
    $veriler["kategoriler"] = DB::table("alf_kategoriler")->get();
   // $veriler["farklikategoriurun"] = UrunlerModel::distinct()->select("kategori_id")->limit(3)->get("aurun_id");
   $veriler["farklikategoriurun"] = Cache::get("farkliurun");
  
    }catch(\Exception $et)
    {
       return "hata ".$et;
    }finally{
         return view('frontend.index',$veriler);
                                                       
    }
}//METHOD

public function modalAyrinti($urunid)
{


    $urunayrinti = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
            ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
            ->select("alf_urunler.aurun_id",
                    "alf_urunler.urun_ismi",
                    "alf_urunler.urun_kodu",
                    "alf_urunler.aciklama",
                    "alf_urunler.ek_bilgi",
                    "alf_urunler.alis_fiyat",
                    "alf_urunler.satis_fiyat",
                    "alf_urunler.tiklanma",
                    "alf_urunler.stokvarmi",
                    "resim.yol",
                    "kategori.akategori_id",
                    "kategori.kategori_adi")->where("alf_urunler.aurun_id",$urunid)->first();
                    
                    echo $urunayrinti->toJson();

}//FUNC METHOD MODALAYRINTI

public function UrunAyrinti($urunid,$tipi="modal")
    {
        try{


            //girilen ürünün izlenme rakamını al ve ona gore yıldız sayısını arttır
            $dt = UrunlerModel::where("aurun_id",$urunid)->first();
            $tiklanmaSayisi = $dt->tiklanma;
            $arttir = ($tiklanmaSayisi + 1);

            DB::table("alf_urunler")->where("aurun_id",$urunid)->update(["tiklanma"=>$arttir]);

            $veriler["resimler"] = ResimlerModel::where("urun_id",$urunid)->get();

            $veriler['urunayrinti'] = UrunlerModel::join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
            ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")    
            ->select("alf_urunler.aurun_id",
                    "alf_urunler.urun_ismi",
                    "alf_urunler.urun_kodu",
                    "alf_urunler.aciklama",
                    "alf_urunler.ek_bilgi",
                    "alf_urunler.alis_fiyat",
                    "alf_urunler.satis_fiyat",
                    "alf_urunler.tiklanma",
                    "alf_urunler.stokvarmi",
                    "resim.yol",
                    "kategori.akategori_id",
                    "kategori.kategori_adi")->where("alf_urunler.aurun_id",$urunid)->first();

                $ilgiliNo = $veriler["urunayrinti"]->akategori_id;
                
                $veriler["ilgiliurunler"] = UrunlerModel::join("alf_resimler","aresim_id","=","alf_urunler.vitrin_resimid")
                                            ->where("alf_urunler.kategori_id",$ilgiliNo)
                                            ->limit(4)->orderBy("alf_urunler.aurun_id")->get();
                                            
        }catch(\Exception $et)
        {

        }finally{
            return view("frontend.urun_ayrinti",$veriler);
        } 
    }//METHOD


    public function backAnasayfa()
    {

        $datas["urunsayisi"] = UrunlerModel::All()->count();
        $datas["kategorisayisi"] = KategorilerModel::All()->count();
        $datas["markasayisi"] = MarkalarModel::All()->count();
        $datas["uyesayisi"] = KullaniciModel::All()->count();

        $datas["markalar"] = MarkalarModel::orderBy("amarka_id","DESC")->limit(4)->get();
        $datas["urunler"] = UrunlerModel::orderBy("aurun_id","DESC")->limit(4)->get();
        $datas["kategoriler"] = KategorilerModel::orderBy("akategori_id","DESC")->limit(4)->get();
       
        date_default_timezone_set('Europe/Istanbul');
        $datas["tarihler"] = date("d-m-Y h:i:s");  

        
    return view("backend.anasayfa",$datas);
    }

}//Controller Class
