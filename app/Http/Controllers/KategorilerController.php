<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\KategorilerModel;
use Illuminate\Support\Facades\Validator;
use App\Model\ResimlerModel;
use Illuminate\Support\Facades\File;


class KategorilerController extends Controller
{

    public function KategoriShow_GET(){

        try{
          $veriler["kategoriler"] = KategorilerModel::paginate(10);  
        }catch(\Exception $et)
        {
            $hata = $et->getMessage();
           return "<script> alert('$hata'); </script>";         
        }finally{
            return view("backend.kategori_show",$veriler);
        }
        
    }
    public function KategoriEkle_GET($id = null)
    {   
        $datalar["kategori"] = $id ? KategorilerModel::where("akategori_id",$id)->first() : new KategorilerModel;
        return view("backend.kategori_ekle",$datalar);
    }

 /* public $kategoriResimID = 0;
    public function KategoriResimEkle(Request $request)
    {
      
        if($request->hasFile("kategori_resmi"))
        {
                $isim = mt_rand().".".$request->file("kategori_resmi")->getClientOriginalExtension();
                $request->file("kategori_resmi")->move("KategoriResimler",$isim);   
            
                $resimSaveTablo = ResimlerModel::create(["yol"=>"KategoriResimler/$isim"]);
                $kategoriResimID = $resimSaveTablo->id ? $resimSaveTablo->id  : 0 ;  
        } 
     
    }//MARKA RESIM EKLE FUNCTIION END
*/
    public function KategoriEkle(Request $request)
    {
        try{
            $valid = Validator::make($request->all(),
            [
                "adi" =>"required|min:3",
                "aciklama"=>"required",
                "katkodu"=>"required"
                //"kategori_resmi" => "mimes:jpg|png|jpeg"
            ]);
            if($valid->fails())
            {
                return response(["durum"=>"warning",
                                         "baslik"=>"Kayıt İşlemi",
                                         "icerik"=>"Eksik veya Hatalı veri girdiniz.Lütfen baştan deneyiniz."]); 
            }else{
                $kategoriResimID = 0;
                if($request->hasFile("kategori_resmi"))
                {
                   
                        $isim = mt_rand().".".$request->file("kategori_resmi")->getClientOriginalExtension();
                        $request->file("kategori_resmi")->move("KategoriResimler",$isim);   
                    
                        $resimSaveTablo = ResimlerModel::create(["yol"=>"KategoriResimler/$isim"]);
                        $kategoriResimID = $resimSaveTablo->id ? $resimSaveTablo->id  : 0 ;  
                } 
                  
                if($request->has("guncellenen_id") && $request->get("guncellenen_id") != 0)
                {
                    $guncelle = $request->get("guncellenen_id");
                    if($request->hasFile("kategori_resmi"))
                    {
                         $resim_id = $kategoriResimID;       
                    }else{
                        $resim_id = $request->get("resim_id");
                    }
                         KategorilerModel::where("akategori_id",$guncelle)
                                            ->update(["kategori_adi"=>$request->get("adi"),
                                                 "kategori_aciklama"=>$request->get("aciklama"),
                                                 "kurun_kodu"=>$request->get("katkodu"),
                                                 "kresim_id"=>$resim_id]);

                        return response(["durum"=>"success",
                                         "baslik"=>"Güncelleme İşlemi",
                                        "icerik"=>"Başarılı bir şekilde Güncelleme işlemini gerçekleştirdiniz."]);
                }else{
                  
                    KategorilerModel::create(["kategori_adi"=>$request->get("adi"),
                                         "kategori_aciklama"=>$request->get("aciklama"),
                                         "kurun_kodu"=>$request->get("katkodu"),
                                         "kresim_id"=>$kategoriResimID]);

                        return response(["durum"=>"success",
                                         "baslik"=>"Kayıt İşlemi",
                                         "icerik"=>"Başarılı bir şekilde kayıt işlemini gerçekleştirdiniz."]);    
                                         
                }
            }                                                
        }catch(\Exception $et)
        {
            // echo "Hatalandi ".$et;
             return response(["durum"=>"error",
                                "baslik"=>"Hata",
                                 "icerik"=>"Kayıt İşleminizde Hata meydana geldi.Daha sonra tekrar deneyiniz.".$et]);
        }/*finally{
            return redirect("admin/kategorishow");     
        }
        */
    }//methodu KATEGORI EKLE

    public function kategorisil($id)
    {
        $kategorid =  KategorilerModel::where("akategori_id",$id)->first();

        if($kategorid->kresim_id != null || $kategorid->kresim_id != 0)
        {
            $resimadi = ResimlerModel::where("aresim_id",$kategorid->kresim_id)->first();
            File::delete($resimadi->yol);
            ResimlerModel::where("aresim_id",$kategorid->kresim_id)->delete();
        }
        KategorilerModel::where("akategori_id",$id)->delete();
            return redirect("/admin/kategorishow");
    }//FUNCTION markasil
}//CLASS
