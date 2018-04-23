<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Model\MarkalarModel;
use App\Model\ResimlerModel;
use Illuminate\Support\Facades\File;


class MarkalarController extends Controller
{


    public function MarkaShow(){
        try{
            $veriler["markalar"] = MarkalarModel::paginate(10);  
          }catch(\Exception $et)
          {
              $hata = $et->getMessage();
             return "<script> alert('$hata'); </script>";         
          }finally{
              return view("backend.marka_show",$veriler);
          }
    }

    public function MarkaEkle_GET($id = null){

        $veriler["marka"] = $id ? MarkalarModel::where("amarka_id",$id)->first() : new MarkalarModel;
        return view("backend/marka_ekle",$veriler);
    }
  /*  
    public function ResimEkle(Request $request)
    {
        $extension = $request->file('marka_resmi')->getClientOriginalExtension();
        $dir = 'resimler/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('marka_resmi')->move($dir, $filename);
    }//RESIM EKLE FUNC
*/
/*
public function MarkaResimEkle(Request $request)
{
    $markaResimID = 0;
    if($request->hasFile("marka_resmi"))
    {
            $madi = $request->get("adi");
            $isim = mt_rand()."$madi.".$request->file("marka_resmi")->getClientOriginalExtension();
            $request->file("marka_resmi")->move("MarkaResimler",$isim);   
        
            $resimSaveTablo = ResimlerModel::create(["yol"=>"MarkaResimler/$isim"]);
            $markaResimID = $resimSaveTablo->id ? $resimSaveTablo->id  : 0 ;  
    } 
    return $markaResimID;
}//MARKA RESIM EKLE FUNCTIION END
*/
    public function MarkaEkle(Request $request){       
        $resim_id = 0;
        try{
            $valid = Validator::make($request->all(),
            [
                "adi" =>"required|min:3",
                "aciklama"=>"required"
                //"kategori_resmi" => "mimes:jpg|png|jpeg"
            ]);
            if($valid->fails())
            {
              
                return response(["durum"=>"warning",
                                    "baslik"=>"Eksik Var",
                                     "icerik"=>"Eksik veri girişi yaptınız.lütfen kontrol ediniz."]);
            }else{
                $MarkaResimID = 0;
                if($request->hasFile("marka_resmi"))
                {  
                        $isim = mt_rand().".".$request->file("marka_resmi")->getClientOriginalExtension();
                        $request->file("marka_resmi")->move("MarkaResimler",$isim);   
                    
                        $resimSaveTablo = ResimlerModel::create(["yol"=>"MarkaResimler/$isim"]);
                        $MarkaResimID = $resimSaveTablo->id ? $resimSaveTablo->id  : 0 ;  
                } 

                if($request->hasFile("marka_resmi"))
                {
                     $resim_id = $MarkaResimID;       
                }else{
                    $resim_id = $request->get("resim_id");
                }
                  
                if($request->has("guncellenen_id") && $request->get("guncellenen_id") != 0)
                {
                    $guncelle = $request->get("guncellenen_id");
                   
                             MarkalarModel::where("amarka_id",$guncelle)
                                                 ->update(["marka_adi"=>$request->get("adi"),
                                                           "marka_aciklama"=>$request->get("aciklama"),
                                                           "mresim_id"=>$resim_id]);       
                                                           
                        return response(["durum"=>"success",
                                         "baslik"=>"Güncelleme İşlemi",
                                        "icerik"=>"Başarılı bir şekilde Güncelleme işlemini gerçekleştirdiniz."]);
                                                                                        
                }else{
                          MarkalarModel::create(["marka_adi"=>$request->get("adi"),
                                          "marka_aciklama"=>$request->get("aciklama"),
                                          "mresim_id"=>$resim_id]);  
                                          
                        return response(["durum"=>"success",
                                          "baslik"=>"Kayıt İşlemi",
                                          "icerik"=>"Başarılı bir şekilde kayıt işlemini gerçekleştirdiniz."]);
                                         
                }
            }        
          //  return redirect("admin/markashow");                                          
        }catch(\Exception $et)
        {
             //echo "Hatalandi ".$et;
             return response(["durum"=>"error",
                                "baslik"=>"Hata",
                                     "icerik"=>"Kayıt İşleminizde Hata meydana geldi.Daha sonra tekrar deneyiniz.".$et]);
        }/*finally{
            return response(["durum"=>"success",
                                         "baslik"=>"Kayıt İşlemi",
                                         "icerik"=>"Başarılı bir şekilde kayıt işlemini gerçekleştirdiniz."]);
        }
        */

    }//METHOD


    public function markasil($id)
    {
        $resimid =  MarkalarModel::where("amarka_id",$id)->first();

        if($resimid->mresim_id != null || $resimid->mresim_id != 0)
        {
            $resimadi = ResimlerModel::where("aresim_id",$resimid->mresim_id)->first();
            File::delete($resimadi->yol);
            ResimlerModel::where("aresim_id",$resimid->mresim_id)->delete();
        }
        MarkalarModel::where("amarka_id",$id)->delete();
            return redirect("/admin/markashow");
    }//FUNCTION markasil
}//CLASS
