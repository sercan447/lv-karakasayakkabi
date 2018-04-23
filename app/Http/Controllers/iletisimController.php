<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\isletmeBilgiModel;
use App\Model\SosyalMedyaModel;
use App\Model\ResimlerModel;

use Illuminate\Support\Facades\Validator;

class iletisimController extends Controller
{
    
    public function front_iletisimShow()
    {
        $datalar["isletmebilgi"] = isletmeBilgiModel::first();

        return view("frontend.iletisim",$datalar);
    }
    public function front_iletisimShow_POST(Request $request)
    {

        return redirect("iletisim");
    }
    public function front_bizkimizShow()
    { 
        $datalar["isletmebilgi"] = isletmeBilgiModel::first();
        $datalar["sosyalmedya"] = SosyalMedyaModel::first();
        $datalar["sirketresim"] = isletmeBilgiModel::join("alf_resimler as res","res.aresim_id","=","alf_isletmebilgileri.resimid")->first();
        
        return view("frontend.hakkimizda",$datalar);
    }

    public function backend_iletisimBilgileri()
    {
        $datalar["isletmebilgi"] = isletmeBilgiModel::first();
        return view("backend.bizkimiz",$datalar);
    }
     public function backend_iletisimBilgileri_POST(Request $request)
    {   
        

        $kontrol = Validator::make($request->all(),[
                "adi"=>"required|min:7",
                "adres"=>"required|min:15",
                "aciklama"=>"min:30",
                "eposta1"=>"required",
                "telefon1"=>"required",
                "isletme_resmi"=>"mimes:jpg,jpeg,png"         
        ]);

        if($kontrol->fails())
        {
            return "<script>alert('HATA');</script>";
        }else{

            $adi = $request->has("adi") ? $request->get("adi")  :  "";
            $adres = $request->has("adres") ? $request->get("adres")  :  "";
            $aciklama = $request->has("aciklama") ? $request->get("aciklama")  :  "";
            $eposta1 = $request->has("eposta1") ? $request->get("eposta1")  :  "";
            $eposta2 = $request->has("eposta2") ? $request->get("eposta2")  :  "";
            $telefon1 = $request->has("telefon1") ? $request->get("telefon1")  :  "";
            $telefon2 = $request->has("telefon2") ? $request->get("telefon2")  :  "";
            
            $isletmeresmi  = 0;
            if($request->hasFile("isletme_resmi"))
            {
                $isim =  mt_rand()."sirketresim.".$request->file("isletme_resmi")->getClientOriginalExtension();
                $request->file("isletme_resmi")->move("resimler",$isim);

                $sirketResim = ResimlerModel::create(["yol"=>"resimler/".$isim]);
                $isletmeresmi = $sirketResim->id;
            }
            
            if($request->has("guncelleme_id"))
            {
                $id = $request->get("guncelleme_id");

                isletmeBilgiModel::where("numara",$id)->update([
                    "adi"=>$adi,
                    "adres"=>$adres,
                    "aciklama"=>$aciklama,
                    "eposta1"=>$eposta1,
                    "eposta2"=>$eposta2,
                    "telefon1"=>$telefon1,
                    "telefon2"=>$telefon2,
                    "resimid"=> $isletmeresmi]);
            }else{
                isletmeBilgiModel::create([
                "adi"=>$adi,
                "adres"=>$adres,
                "aciklama"=>$aciklama,
                "eposta1"=>$eposta1,
                "eposta2"=>$eposta2,
                "telefon1"=>$telefon1,
                "telefon2"=>$telefon2,
                "resimid"=> $isletmeresmi]);
            }

        }

        return redirect("admin/isletmebilgi");
    }

    public function backend_sosyalMedyaBilgileri()
    {   
        $datalar["sosyalmedya"] = SosyalMedyaModel::first();

        return view("backend.sosyalmedyaHesab",$datalar);
    }
    public function backend_sosyalMedyaBilgileri_POST(Request $request)
    {
        
                $facebook = $request->has("facebook") ? $request->get("facebook") : "";
                $instagram = $request->has("instagram") ? $request->get("instagram") : "";
                $twitter = $request->has("twitter") ? $request->get("twitter") : "";
                $pinterest = $request->has("pinterest") ? $request->get("pinterest") : "";
                $linkedin = $request->has("linkedin") ? $request->get("linkedin") : "";
                $googleplus = $request->has("googleplus") ? $request->get("googleplus") : "";
        
        if($request->has("guncelleme_id"))
         {
                $id = $request->get("guncelleme_id");
                      
                SosyalMedyaModel::where("numara",$id)->update([
                                            "facebook"=>$facebook,
                                            "instagram"=>$instagram,
                                            "twitter"=>$twitter,
                                            "pinterest"=>$pinterest,
                                            "googleplus"=>$googleplus,
                                            "linkedin"=>$linkedin]);

        }else{

                SosyalMedyaModel::create(["facebook"=>$facebook,
                                        "instagram"=>$instagram,
                                        "twitter"=>$twitter,
                                        "pinterest"=>$pinterest,
                                        "googleplus"=>$googleplus,
                                        "linkedin"=>$linkedin]);

        }                         
        return redirect("admin/sosyalmedyahesab");
    }
}
