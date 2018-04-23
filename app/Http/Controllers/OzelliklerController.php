<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\OzellikTipModel;
use App\Model\OzellikDegerModel;
use App\Model\KategorilerModel;
class OzelliklerController extends Controller
{
    
    public function ozellikTipEkle()
    {
        $datas["anakategoriler"] = KategorilerModel::All();
        return view("backend.ozelliktipekle",$datas);
    }
    public function ozellikTipEkle_POST(Request $request)
    {
      
        if($request->has("adi") && $request->has("aciklama") && $request->has("anakategorid"))
        {
            OzellikTipModel::create(["ozellik_adi"=>$request->get("adi"),
                                     "ozellik_aciklama"=>$request->get("aciklama"),
                                     "anakategori_id"=>$request->get("anakategorid")
                                     ]);


        }else{
            return "<script> alert('eksik veya geçersiz veri'); </script>";
        }
        
        return redirect("admin/ozelliktipekle");
    }

    //////////////////////////////////////////////

    public function ozellikDegerEkle()
    {
        $datas["ozelliktipleri"] = OzellikTipModel::all();
        return view("backend.ozellikdegerekle",$datas);
    }

    public function ozellikDegerEkle_POST(Request $request)
    {
            if($request->has("adi") && $request->has("aciklama") && $request->has("oz   elliktipid"))
            {
                      OzellikDegerModel::create(["adi"=>$request->get("adi"),
                                                 "aciklama"=>$request->get("aciklama"),
                                                 "ozellik_tip"=>$request->get("ozelliktipid")
                                                 ]);

            }

        return redirect("admin/ozellikdegerekle");
    }
}
